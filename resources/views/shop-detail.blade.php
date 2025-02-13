@extends('template.home_layout')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="shop-grid-right.html">kategori </a> <span></span> product
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('storage/' . $product->foto) }}"
                                                     alt="{{ $product->nama_produk }}"
                                                     style="width: 100%; height: 500px; object-fit: cover; aspect-ratio: 1/1;" />
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h2 class="title-detail">{{ $product->nama_produk }}</h2>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand">$ {{ fmod($product->harga, 1) == 0 ? number_format($product->harga, 0, '.', '.') : number_format($product->harga, 2, '.', '.') }}</span>
                                                @if($product->harga_diskon > 0)
                                                <span>
                                                    <span class="old-price font-md ml-15">$ {{ fmod($product->harga_diskon, 1) == 0 ? number_format($product->harga_diskon, 0, '.', '.') : number_format($product->harga_diskon, 2, '.', '.') }}</span>
                                                </span>
                                                @endIf
                                            </div>
                                        </div>
                                        <div class="detail-extralink mb-50">
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart add-to-cart-link" data-produk_id="{{ $product->id }}"
                                                data-quantity="1"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul class="mr-50 float-start">
                                                <li class="mb-5 fs-5">Stok: <span class="text-brand fs-5">{{ $product->stok }}</span></li>
                                                <li class="mb-5 fs-5">Kategori: <span class="text-brand fs-5">{{ $product->kategori->kategori }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Deskripsi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                {!! html_entity_decode($product->deskripsi) ?? 'Tidak ada deskripsi detail produk.' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Related Products Section -->
                            @if($relatedProducts->count() > 0)
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Produk Terkait</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($relatedProducts as $relatedProduct)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('shop-detail.index', $relatedProduct->slug) }}" tabindex="0">
                                                            <img class="default-img"
                                                                 src="{{ asset('storage/' . $relatedProduct->foto) }}"
                                                                 style="width: 100%; height: 250px; object-fit: cover;"
                                                                 alt="{{ $relatedProduct->nama_produk }}" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{ route('shop-detail.index', $relatedProduct->slug) }}">{{ $relatedProduct->nama_produk }}</a></h2>
                                                    <div class="product-price">
                                                        <span>$ {{ fmod($relatedProduct->harga, 1) == 0 ? number_format($relatedProduct->harga, 0, '.', '.') : number_format($relatedProduct->harga, 2, '.', '.') }}</span>
                                                        @if($relatedProduct->harga_diskon > 0)
                                                            <span class="old-price">$ {{ fmod($relatedProduct->harga_diskon, 1) == 0 ? number_format($relatedProduct->harga_diskon, 0, '.', '.') : number_format($relatedProduct->harga_diskon, 2, '.', '.') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Related Products Section -->
                        </div>
                    </div>
                    <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Kategori</h5>
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->kategori }}</a>
                                    <span class="count">{{ $category->produks_count }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
