@extends('template.home_layout')
@section('content')
<style>
    /* Pastikan kontainer slider memiliki ukuran tetap */
    .home-slide-cover {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Pastikan video mengisi seluruh area slider */
    .video-background {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .overlay-text {
        position: relative;
        display: block;
        padding: 20px;
        color: white;
        z-index: 2;
    }

    .overlay-text::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Warna overlay */
        z-index: -1;
        border-radius: 10px;
        /* Opsional */
    }

</style>
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <!-- Slide dengan Video -->
                    <div class="single-hero-slider single-animation-wrap">
                        <video autoplay loop muted playsinline class="video-background" style="border-radius: 10px;">
                            <source src="{{ asset('assets/video/homeBanner_enus.mp4') }}" type="video/mp4">
                        </video>

                        <div class="overlay" style="border-radius: 10px;"></div>
                        <div class="slider-content">
                            <h1 class="display-2 mb-40 overlay-text ">
                                Monopoly GO!<br />
                                Store
                            </h1>
                            <a href="{{ route('shop.index') }}" class="btn" type="submit"><i
                                    class="fi-rs-paper-plane"></i> &nbsp; Store</a>
                        </div>
                    </div>
                    <!-- Slide dengan Gambar -->
                    {{-- <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('assets/imgs/slider/slider-2.png') }})">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40">
                            Fresh Vegetables<br />
                            Big discount
                        </h1>
                        <p class="mb-65">Save up to 50% off on your first order</p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your email address" />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
        </div>
    </section>

    <!--End hero slider-->

    <!-- Start Banner -->
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0.0s">
                        <img src="{{ asset('storage/' . $category->foto) }}" alt="{{ $category->kategori }}"
                            style="width: 400px; height: 250px; object-fit: cover; aspect-ratio: 1/1; filter: brightness(0.5);">
                        <div class="banner-text" >
                            <h4 class="text-white category-title"> {{ $category->kategori }}</h4>
                            <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                class="btn btn-sm btn-primary text-white" style="
                                      text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
                                      margin-top: 10px;">
                                Shop Now <i class="fi-rs-arrow-right"></i>

                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End banners-->

    <!-- Start Product -->
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">
                            All
                        </button>
                    </li>
                    @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="{{ $category->slug }}-tab" data-bs-toggle="tab"
                            data-bs-target="#{{ $category->slug }}" type="button" role="tab"
                            aria-controls="{{ $category->slug }}" aria-selected="false">
                            {{ $category->kategori }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content wow fadeIn" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @foreach($categories as $category)
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>{{ $category->kategori }}</h3>
                    </div>
                    <div class="row product-grid-4">
                        @php
                        $categoryProducts = $products->where('id_kategori', $category->id)->take(5);
                        @endphp
                        @forelse($categoryProducts as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('shop-detail.index', ['slug' => $product->slug]) }}">
                                            <img class="default-img" src="{{ asset('storage/' . $product->foto) }}"
                                                alt="{{ $product->nama_produk }}"
                                                style="width: 100%; height: 250px; object-fit: cover; aspect-ratio: 1/1;">
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                            {{ $category->kategori }}
                                        </a>
                                    </div>
                                    <h2>
                                        <a href="{{ route('shop-detail.index', ['slug' => $product->slug]) }}">
                                            {{ $product->nama_produk }}
                                        </a>
                                    </h2>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$ {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            <span class="old-price">$55.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add add-to-cart-link" href="javascript:void(0);"
                                                data-produk_id="{{ $product->id }}" data-quantity="1"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p>No products in this category.</p>
                        </div>
                        @endforelse
                    </div>
                    @endforeach
                </div>
                @foreach($categories as $category)
                <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"
                    aria-labelledby="{{ $category->slug }}-tab">
                    <div class="row product-grid-4">
                        @php
                        $categoryProducts = $products->where('id_kategori', $category->id);
                        @endphp
                        @forelse($categoryProducts as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('shop-detail.index', ['slug' => $product->slug]) }}">
                                            <img class="default-img" src="{{ asset('storage/' . $product->foto) }}"
                                                alt="{{ $product->nama_produk }}"
                                                style="width: 100%; height: 250px; object-fit: cover; aspect-ratio: 1/1;">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                            {{ $category->kategori }}
                                        </a>
                                    </div>
                                    <h2>
                                        <a href="{{ route('shop-detail.index', ['slug' => $product->slug]) }}">
                                            {{ $product->nama_produk }}
                                        </a>
                                    </h2>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$ {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            <span class="old-price">$55.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add add-to-cart-link" href="javascript:void(0);"
                                                data-produk_id="{{ $product->id }}" data-quantity="1"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p>No products in this category.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Product-->

    <section class="container mb-50 mt-50 d-none d-md-block text-center">
        <section class="text-center mb-50">
            <h2 class="title style-3 mb-40">Why Choose Us?</h2>
            <p class="text-muted">
                At GideonMogo, we are committed to providing top-notch quality, cutting-edge innovation, and exceptional
                service to ensure your satisfaction.
                Here's why we're the best choice for you:
            </p>
        </section>

        <div class="row about-count position-relative justify-content-center">
            <!-- Video Background -->
            <video autoplay loop muted playsinline class="video-background">
                <source src="{{ asset('assets/video/homeBanner_enus.mp4') }}" type="video/mp4">
            </video>

            <div class="overlay"></div> <!-- Overlay untuk efek gelap -->

            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><i class="fi-rs-thumbs-up"></i></h1>
                <h4>Quality Service</h4>
                <p class="text-muted">Our commitment to excellence has earned us the trust of clients worldwide.</p>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><i class="fi-rs-shield-check"></i></h1>
                <h4>100% Safe</h4>
                <p class="text-muted">We prioritize your security and ensure every transaction is protected.</p>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><i class="fi-rs-dollar"></i></h1>
                <h4>Best Price</h4>
                <p class="text-muted">We offer competitive pricing without compromising on quality.</p>
            </div>
            <div class="col-lg-1-5 text-center d-none d-lg-block">
                <h1 class="heading-1"><i class="fi-rs-refresh"></i></h1>
                <h4>Fast Refunds</h4>
                <p class="text-muted ">We provide hassle-free refunds for a seamless customer experience.</p>
            </div>
        </div>
    </section>


    <!--End 4 columns-->
</main>
@endsection

@section('scripts')
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
