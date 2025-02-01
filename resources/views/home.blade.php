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
    background: rgba(0, 0, 0, 0.5); /* Warna overlay */
    z-index: -1;
    border-radius: 10px; /* Opsional */
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
                            <button class="btn" type="submit"><i class="fi-rs-paper-plane"></i> &nbsp; Store</button>
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
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp"  data-wow-delay="0">
                        <img src="{{ asset('assets/')}}/imgs/banner/banner-1.png" width="378" height="223" alt="" />
                        <div class="banner-text">
                            <h4 class="text-white"  style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="{{ asset('assets/')}}/imgs/banner/banner-2.png" width="378" height="223" alt="" />
                        <div class="banner-text">
                            <h4 class="text-white"  style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{ asset('assets/')}}/imgs/About3.webp" width="378" height="223" alt="" />
                        <div class="banner-text">
                            <h4 class="text-white"  style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">The best Organic <br />Products Online</h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{ asset('assets/')}}/imgs/banner/banner-3.png" width="378" height="223"  alt="" />
                        <div class="banner-text">
                            <h4 class="text-white"  style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">The best Organic <br />Products Online</h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End banners-->
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Milks & Dairies</button>
                    </li>
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ asset('assets/')}}/imgs/shop/product-1-1.jpg" alt="" />
                                            <img class="hover-img" src="{{ asset('assets/')}}/imgs/shop/product-1-2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$28.85</span>
                                            <span class="old-price">$32.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ asset('assets/')}}/imgs/shop/product-10-1.jpg" alt="" />
                                            <img class="hover-img" src="{{ asset('assets/')}}/imgs/shop/product-10-2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$28.85</span>
                                            <span class="old-price">$32.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="container mb-50 d-none d-md-block text-center" >
        <section class="text-center mb-50">
            <h2 class="title style-3 mb-40">Why Choose Us?</h2>
            <p class="text-muted">
                At GideonMogo, we are committed to providing top-notch quality, cutting-edge innovation, and exceptional service to ensure your satisfaction.
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
