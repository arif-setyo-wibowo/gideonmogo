@extends('template.home_layout')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{ $cartItems->unique('produk_id')->count() }}</span> products in your cart</h6>
                    <h6 class="text-body"><a href="#" class="text-muted clear-cart-btn"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading text-center">
                                <th scope="col" colspan="2" class="pl-30">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($cartItems as $item)
                            <tr class="pt-30" data-cart-id="{{ $item->id }}">
                                <td class="image product-thumbnail pl-30">
                                    <img src="{{ asset('storage/' . $item->produk->foto) }}" alt="{{ $item->produk->nama_produk }}">
                                </td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5">
                                        <a class="product-name mb-10 text-heading" >
                                            {{ $item->produk->nama_produk }}
                                        </a>
                                    </h6>
                                </td>
                                <td class="price unit-price" data-title="Price">
                                    <h4 class="text-body">${{ number_format($item->produk->harga, 0) }}</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="number" name="quantity"
                                                   class="qty-val"
                                                   value="{{ $item->quantity }}"
                                                   min="1"
                                                   max="{{ $item->produk->stok }}"
                                                   readonly
                                            >
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="price subtotal" data-title="Subtotal">
                                    <h4 class="text-brand">${{ number_format($item->produk->harga * $item->quantity, 0) }}</h4>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body remove-cart-item" onclick="event.preventDefault(); removeCartItem(this);">
                                        <i class="fi-rs-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p class="my-5">Your cart is empty</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="{{ route('shop.index')}}" class="btn"><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="cart-total text-brand text-end">
                                            ${{ number_format($cartItems->sum(function($item) { return $item->produk->harga * $item->quantity; }), 0) }}
                                        </h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if($cartItems->count() > 0)
                    <a href="{{ route('shop-checkout.index')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
