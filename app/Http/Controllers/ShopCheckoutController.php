<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotificationMail;
use Illuminate\Support\Facades\Log;

class ShopCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('home.index')->with('error', 'Keranjang Anda kosong. Silakan tambahkan produk terlebih dahulu.');
        }
        $total = Cart::calculateTotal();

        return view('shop-checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'username' => 'required|string|max:255',
                'facebook' => 'required|string|max:255',
                'link' => 'required|string',
                'payment_method' => 'required|in:PayPal,CashApp,Venmo',
                'bukti_pembayaran_paypal' => $request->input('payment_method') === 'PayPal' ? 'required|file|image|max:5120' : '',
                'bukti_pembayaran_venmo' => $request->input('payment_method') === 'Venmo' ? 'required|file|image|max:5120' : '',
                'bukti_pembayaran_cashapp' => $request->input('payment_method') === 'CashApp' ? 'required|file|image|max:5120' : ''
            ], [
                'first_name.required' => 'First name is required',
                'last_name.required' => 'Last name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid email format',
                'phone.required' => 'Phone number is required',
                'username.required' => 'Username is required',
                'facebook.required' => 'Facebook is required',
                'link.required' => 'Link is required',
                'payment_method.required' => 'Please select a payment method',
                'bukti_pembayaran_paypal.required' => 'Please upload PayPal payment proof',
                'bukti_pembayaran_venmo.required' => 'Please upload Venmo payment proof',
                'bukti_pembayaran_cashapp.required' => 'Please upload CashApp payment proof',
                'bukti_pembayaran_paypal.image' => 'PayPal payment proof must be an image',
                'bukti_pembayaran_venmo.image' => 'Venmo payment proof must be an image',
                'bukti_pembayaran_cashapp.image' => 'CashApp payment proof must be an image',
                'bukti_pembayaran_paypal.max' => 'PayPal payment proof must not exceed 5MB',
                'bukti_pembayaran_venmo.max' => 'Venmo payment proof must not exceed 5MB',
                'bukti_pembayaran_cashapp.max' => 'CashApp payment proof must not exceed 5MB'
            ]);

            $buktiPath = null;
            $paymentMethod = $request->input('payment_method');
            
            switch ($paymentMethod) {
                case 'PayPal':
                    $file = $request->file('bukti_pembayaran_paypal');
                    break;
                case 'Venmo':
                    $file = $request->file('bukti_pembayaran_venmo');
                    break;
                case 'CashApp':
                    $file = $request->file('bukti_pembayaran_cashapp');
                    break;
                default:
                    throw new \Exception('Invalid payment method');
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $buktiPath = $file->storeAs('payment_proofs', $fileName, 'public');

            $cartItems = Cart::where('user_id', Auth::id())
                ->with(['produk' => function($query) {
                    $query->select('id', 'nama_produk', 'harga', 'id_kategori');
                }])
                ->get();

            if ($cartItems->isEmpty()) {
                return redirect(route('home.index'));
            }

            $totalPrice = $cartItems->sum(function($item) {
                return $item->quantity * $item->produk->harga;
            });

            do {
                $nomerOrder = mt_rand(10000000, 99999999);
            } while (Pembelian::where('nomer_order', $nomerOrder)->exists());

            $pembelianData = [
                'nomer_order' => $nomerOrder,
                'tanggal_order' => now(),
                'total_harga' => $totalPrice,
                'metode_pembayaran' => $paymentMethod,
                'status' => 'pending',
                
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'note' => $request->input('note'),
                
                'username' => $request->input('username', ''),
                'facebook' => $request->input('facebook', ''),
                'link' => $request->input('link', '')
            ];

            if (Auth::check()) {
                $pembelianData['user_id'] = Auth::id();
            }

            if ($buktiPath) {
                $pembelianData['bukti_pembayaran'] = $buktiPath;
            }

            $pembelian = Pembelian::create($pembelianData);

            $productDetails = [];
            foreach ($cartItems as $cartItem) {
                PembelianDetail::create([
                    'pembelian_id' => $pembelian->id,
                    'produk_id' => $cartItem->produk_id,
                    'jumlah' => $cartItem->quantity,
                    'harga' => $cartItem->produk->harga
                ]);
                
                $productDetails[] = "{$cartItem->quantity}x {$cartItem->produk->nama_produk}";
            }

            try {
                // Send email notification
                Mail::to($validatedData['email'])->send(new OrderNotificationMail($pembelian));
                
                // Optional: Send a copy to admin
                Mail::to(config('mail.admin_email'))->send(new OrderNotificationMail($pembelian));
            } catch (\Exception $e) {
                // Log the email sending error
                Log::error('Order Email Notification Failed: ' . $e->getMessage());
                
                // Optionally, you can choose to continue the process or throw the exception
                // Uncomment the next line if you want to stop the process on email failure
                // throw $e;
            }
            
            Cart::where('user_id', Auth::id())->delete();

            $message = "*Order from GideonMogo*\n\n";
            $message .= "Order Number: " . $nomerOrder . "\n";
            $message .= "Date: " . now()->format('d F Y') . "\n";
            $message .= "Name: " . $validatedData['first_name'] . " " . $validatedData['last_name'] . "\n";
            $message .= "IGN: " . $validatedData['username'] . "\n";
            $message .= "Facebook: " . $validatedData['facebook'] . "\n";
            $message .= "Link: " . $validatedData['link'] . "\n\n";
            $message .= "Notes: " . ($request->input('note') ?? '-') . "\n\n";
            $message .= "*Products:*\n";
            foreach ($productDetails as $product) {
                $message .= "• " . $product . "\n";
            }
            $message .= "\nPayment Method: " . $paymentMethod . "\n";
            $message .= "Total: $" . number_format($totalPrice, 2);

            $encodedMessage = urlencode($message);
            
            $whatsappUrl = "https://wa.me/6287863353906?text=" . $encodedMessage;

            return redirect($whatsappUrl);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect(route('home.index'));
        } catch (\Exception $e) {
            return redirect(route('home.index'));
        }
    }
}
