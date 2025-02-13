@extends('template.home_layout')
@section('content')
<main class="main">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span
                            class="text-brand">{{ $cartItems->unique('produk_id')->count() }}</span> products in your
                        cart</h6>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('checkout.process') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <form method="post">
                    </form>
                    <div class="row mb-50">
                        @guest
                        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                            
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an
                                        account?</span> <a href="{{ route('login.index')}}"
                                        class=" font-lg" aria-expanded="false">Click here to login</a></span>
                            </div>
                           
                        </div>
                        @endguest

                        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                            <div class="apply-coupon">
                                <input type="text" id="coupon-code" name="coupon_code" placeholder="Enter Coupon Code...">
                                <div id="coupon-message" class="mt-2"></div>
                                <button type="button" id="apply-coupon-btn" class="btn btn-md">Apply Coupon</button>
                                <input type="hidden" name="total_purchase" id="total-purchase-input" value="{{ $total ?? 0 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="mb-30">Account Information</h4>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="username" placeholder="In Game username *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="facebook" placeholder="Facebook Name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="link" placeholder="Link *">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="name" placeholder="Full Name *"
                                    value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email *"
                                    value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="note" placeholder="Request Note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Your Order</h4>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('storage/' . $item->produk->foto) }}"
                                                alt="{{ $item->produk->nama_produk }}">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5">
                                                <a href="{{ route('shop-detail.index', $item->produk->id) }}"
                                                    class="text-heading">
                                                    {{ $item->produk->nama_produk }}
                                                </a>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->quantity }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">
                                                ${{ number_format($item->produk->harga * $item->quantity, 2) }}
                                            </h4>
                                        </td>
                                        @php
                                        $total += $item->produk->harga * $item->quantity;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand" id="subtotal">
                                                ${{ number_format($total, 2 ) }}
                                            </h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="text-end">
                                            <h6 class="text-muted">Discount</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand" id="discount">
                                                $0
                                            </h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="text-end">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand" id="total">
                                                ${{ number_format($total, 2) }}
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="payment ml-30">
                        <h4 class="mb-30">Payment</h4>
                        <div class="payment_option">
                            <div class="form-group">
                                <label for="payment_method" class="form-label fs-5 fw-bold">Select Payment
                                    Method</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="" selected disabled>Choose Payment Method</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Venmo">Venmo</option>
                                    <option value="CashApp">CashApp</option>
                                    <option value="Usdt">Usdt</option>
                                </select>
                            </div>

                            <div id="payment-details" class="mt-3" style="display: none;">
                                <div id="PayPal-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p class="form-label fs-6 fw-bold">Send payment to: <span
                                                class="text-success">josephex13@gmail.com</span></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiPaypal" class="form-label fs-7 fw-bold">Upload PayPal
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_paypal" class="custom-file-input"
                                                id="uploadBuktiPaypal" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiPaypal">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="Venmo-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p>Send payment via Venmo</p>
                                        <a href="https://venmo.com/u/mogogs" target="_blank"
                                            class="btn btn-outline-primary btn-sm">Venmo Link</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiVenmo" class="form-label fs-7 fw-bold">Upload Venmo
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_venmo" class="custom-file-input"
                                                id="uploadBuktiVenmo" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiVenmo">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="CashApp-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p>Send payment to: <span class="text-success">mogogs</span></p>
                                        <a href="https://cash.app/$mogogs" target="_blank"
                                            class="btn btn-outline-primary btn-sm">CashApp Link</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiCashApp" class="form-label fs-7 fw-bold">Upload CashApp
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_cashapp" class="custom-file-input"
                                                id="uploadBuktiCashApp" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiCashApp">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="Usdt-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p>Send payment to: <span class="text-success">
                                            Addres : 0xE608eFB646547fa0A2a4dB56aeE978670c7254C4
                                        </span></p>
                                        Network : BEP20
                                        <p></p>
                                        <a href="  https://link.trustwallet.com/send?coin=20000714&address=0xE608eFB646547fa0A2a4dB56aeE978670c7254C4&token_id=0x55d398326f99059fF775485246999027B3197955 " target="_blank"
                                            class="btn btn-outline-primary btn-sm">Trust Wallet Link</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiUsdt" class="form-label fs-7 fw-bold">Upload Trust Wallet
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_usdt" class="custom-file-input"
                                                id="uploadBuktiUsdt" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiUsdt">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="checkout-submit-btn"
                            class="btn btn-fill-out btn-block mt-30 ml-30 w-100 justify-content-center align-items-center"
                            style="display: none;"><img class="me-2" src="{{ asset('assets/imgs/theme/icons/wa.png') }}"
                                alt="WhatsApp Icon" style="width: 20px; height: 20px;"> Proses Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('js')
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('assets/js/checkout.js') }}"></script>
@endsection
