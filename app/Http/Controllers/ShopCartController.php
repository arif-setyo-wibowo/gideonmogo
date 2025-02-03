<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopCartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getCartItems();
        $total = Cart::calculateTotal();

        return view('shop-cart', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'quantity' => 'sometimes|integer|min:1'
        ]);

        $produkId = $request->input('produk_id');
        $quantity = $request->input('quantity', 1);

        try {
            $result = Cart::addToCart($produkId, $quantity);

            if ($request->ajax() || $request->wantsJson()) {
                // For AJAX requests, return JSON
                return response()->json([
                    'success' => $result, 
                    'message' => $result 
                        ? 'Product added to cart successfully' 
                        : 'Failed to add product to cart'
                ]);
            }
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Error: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity' => 'sometimes|integer|min:1'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        try {
            $result = Cart::addToCart($productId, $quantity);

            if ($result) {
                // Get updated cart count
                $cartCount = Cart::getCartCount();

                return response()->json([
                    'success' => true, 
                    'message' => 'Product added to cart successfully',
                    'cart_count' => $cartCount
                ]);
            } else {
                return response()->json([
                    'success' => false, 
                    'message' => 'Insufficient stock or maximum quantity reached'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Failed to add product to cart: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            // Find the cart item for the current user or session
            $cartItem = Cart::where(function($query) use ($cartId) {
                $query->where('id', $cartId);
                
                // Add user or session condition
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('session_id', Session::getId());
                }
            })->firstOrFail();

            // Get the associated product
            $produk = $cartItem->produk;

            // Validate stock availability
            $newQuantity = $request->input('quantity');
            if ($newQuantity > $produk->stok) {
                return response()->json([
                    'success' => false, 
                    'message' => "Stok tidak mencukupi. Maksimal: {$produk->stok}"
                ], 400);
            }

            // Update cart item quantity
            $cartItem->update([
                'quantity' => $newQuantity
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kuantitas berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui kuantitas: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($cartId)
    {
        try {
            // Find the cart item for the current user or session
            $cartItem = Cart::where(function($query) use ($cartId) {
                $query->where('id', $cartId);
                
                // Add user or session condition
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('session_id', Session::getId());
                }
            })->firstOrFail();
            
            // Delete the cart item
            $cartItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus dari keranjang'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus produk dari keranjang: ' . $e->getMessage()
            ], 500);
        }
    }

    public function clear()
    {
        try {
            // Clear all cart items for the current user or session
            $query = Cart::where(function($query) {
                // Add user or session condition
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('session_id', Session::getId());
                }
            });

            // Delete the cart items
            $deletedCount = $query->delete();

            return response()->json([
                'success' => true,
                'message' => 'Keranjang berhasil dikosongkan',
                'deleted_count' => $deletedCount
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengosongkan keranjang: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getDropdownData(Request $request)
    {
        // Get cart items with related product details
        $cartItems = Cart::with('produk')
            ->when(Auth::check(), function($query) {
                return $query->where('user_id', Auth::id());
            })
            ->when(!Auth::check(), function($query) {
                return $query->where('session_id', Session::getId());
            })
            ->get();

        // Calculate cart total
        $cartTotal = $cartItems->sum(function($item) {
            return $item->produk->harga * $item->quantity;
        });

        // Calculate unique product count
        $cartItemCount = $cartItems->unique('produk_id')->count();

        // Return JSON response
        return response()->json([
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
            'cartItemCount' => $cartItemCount
        ]);
    }
}
