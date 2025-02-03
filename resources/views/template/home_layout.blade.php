<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>GideonMogo - Home</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/')}}/imgs/logo/logo-2.png" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/')}}/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/')}}/css/plugins/slider-range.css" />
    <link rel="stylesheet" href="{{ asset('assets/')}}/css/main.css?v=6.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home.index')}}"><img src="{{ asset('assets/')}}/imgs/logo/logo-2.png" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{ route('shop.index') }}" method="GET" class="d-flex align-items-center search-form" id="desktop-search-form" onsubmit="return validateSearch(event)">
                                <input type="text" name="search" placeholder="Search for items..." value="{{ request('search') }}" class="form-control search-input" style="background-image: none;" id="desktop-search-input">
                                <button type="submit" class="btn btn-search">
                                    <i class="fi-rs-search" style="font-size: 16px; margin-right: 8px;"></i> <span style="font-size: 16px;">Search</span>
                                </button>
                            </form>
                            <style>
                                .search-form {
                                    position: relative;
                                    max-width: 400px;
                                    width: 100%;
                                }
                                .search-input {
                                    border-right: none;
                                    padding-right: 120px;
                                    background-image: none !important;
                                }
                                .btn-search {
                                    position: absolute;
                                    right: 0;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    background-color: #3BB77E;
                                    color: white;
                                    border: none;
                                    padding: 6px 15px;
                                    border-radius: 0 4px 4px 0;
                                    display: flex;
                                    align-items: center;
                                    transition: all 0.3s ease;
                                }
                                .btn-search:hover {
                                    background-color: #2a9d64;
                                    transform: translateY(-50%) scale(1.05);
                                }
                            </style>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index')}}">Home</a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('about.index') ? 'active' : '' }}" href="{{ route('about.index')}}">About</a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('shop.index') || request()->routeIs('shop-detail.index') ? 'active' : '' }}" href="{{ route('shop.index')}}">Shop </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index')}}">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-action-icon-2">
                                    @php
                                        $cartItemCount = \App\Models\Cart::when(Auth::check(), function($query) {
                                            return $query->where('user_id', Auth::id());
                                        })
                                        ->when(!Auth::check(), function($query) {
                                            return $query->where('session_id', Session::getId());
                                        })
                                        ->distinct('produk_id')
                                        ->count('produk_id');
                                    @endphp
                                    <a class="mini-cart-icon" href="{{ route('shop-cart.index') }}">
                                        <img alt="cart" src="{{ asset('assets/')}}/imgs/theme/icons/icon-cart.svg" />
                                        <span class="pro-count blue">{{ $cartItemCount }}</span>
                                    </a>
                                    <a href="{{ route('shop-cart.index') }}"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 cartku">
                                        @php
                                            $cartItems = \App\Models\Cart::with('produk')
                                                ->when(Auth::check(), function($query) {
                                                    return $query->where('user_id', Auth::id());
                                                })
                                                ->when(!Auth::check(), function($query) {
                                                    return $query->where('session_id', Session::getId());
                                                })
                                                ->get();
                                            
                                            $cartTotal = $cartItems->sum(function($item) {
                                                return $item->produk->harga * $item->quantity;
                                            });
                                        @endphp

                                        @if($cartItems->count() > 0)
                                            <ul>
                                                @foreach($cartItems as $item)
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <a href="{{ route('shop-detail.index', $item->produk->id) }}">
                                                                 <img alt="{{ $item->produk->nama_produk }}" 
                                                                      src="{{ asset('storage/' . $item->produk->foto) }}" />
                                                            </a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4>
                                                                <a href="{{ route('shop-detail.index', $item->produk->id) }}">
                                                                    {{ Str::limit($item->produk->nama_produk, 18) }}
                                                                </a>
                                                            </h4>
                                                            <h4>
                                                                <span>{{ $item->quantity }} × </span>
                                                                ${{ number_format($item->produk->harga, 0) }}
                                                            </h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="#" class="remove-cart-item-dropdown" 
                                                               data-cart-id="{{ $item->id }}"
                                                               onclick="event.preventDefault(); removeCartItemDropdown(this);">
                                                                <i class="fi-rs-cross-small"></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>${{ number_format($cartTotal, 0) }}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{ route('shop-cart.index') }}" class="outline">View cart</a>
                                                    <a href="{{ route('shop-checkout.index') }}">Checkout</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center p-3">
                                                <p>Your cart is empty</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @auth
                                    <div class="header-action-icon-2">
                                        <a href="{{ route('my-account.index')}}">
                                            <img class="svgInject" alt="Nest" src="{{ asset('assets/')}}/imgs/theme/icons/icon-user.svg" />
                                        </a>
                                        <a href="{{ route('my-account.index')}}"><span class="lable ml-0">{{ Auth::user()->display_name ?? 'Account' }}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('my-account.index')}}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <i class="fi fi-rs-sign-out mr-10"></i>Sign out
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="header-action-icon-2">
                                        <a href="{{ route('login.index')}}">
                                            <img class="svgInject" alt="Nest" src="{{ asset('assets/')}}/imgs/theme/icons/icon-user.svg" />
                                        </a>
                                        <a href="{{ route('login.index')}}"><span class="lable ml-0">Login</span></a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ route('home.index')}}"><img src="{{ asset('assets/')}}/imgs/logo/logo-1.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                    </div>
                    <div class="hotline d-none d-lg-flex">

                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                @php
                                    $cartItemCount = \App\Models\Cart::when(Auth::check(), function($query) {
                                        return $query->where('user_id', Auth::id());
                                    })
                                    ->when(!Auth::check(), function($query) {
                                        return $query->where('session_id', Session::getId());
                                    })
                                    ->distinct('produk_id')
                                    ->count('produk_id');
                                @endphp
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Nest" src="{{ asset('assets/')}}/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white">{{ $cartItemCount }}</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    @php
                                        $cartItems = \App\Models\Cart::with('produk')
                                            ->when(Auth::check(), function($query) {
                                                return $query->where('user_id', Auth::id());
                                            })
                                            ->when(!Auth::check(), function($query) {
                                                return $query->where('session_id', Session::getId());
                                            })
                                            ->get();
                                        
                                        $cartTotal = $cartItems->sum(function($item) {
                                            return $item->produk->harga * $item->quantity;
                                        });
                                    @endphp

                                    @if($cartItems->count() > 0)
                                        <ul>
                                            @foreach($cartItems as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{ route('shop-detail.index', $item->produk->id) }}">
                                                            <img alt="{{ $item->produk->nama_produk }}" 
                                                                 src="{{ asset('storage/' . $item->produk->foto) }}" />
                                                        </a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4>
                                                            <a href="{{ route('shop-detail.index', $item->produk->id) }}">
                                                                {{ Str::limit($item->produk->nama_produk, 18) }}
                                                            </a>
                                                        </h4>
                                                        <h4>
                                                            <span>{{ $item->quantity }} × </span>
                                                            ${{ number_format($item->produk->harga, 0) }}
                                                        </h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#" class="remove-cart-item-dropdown" 
                                                           data-cart-id="{{ $item->id }}"
                                                           onclick="event.preventDefault(); removeCartItemDropdown(this);">
                                                            <i class="fi-rs-cross-small"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>${{ number_format($cartTotal, 0) }}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('shop-cart.index') }}" class="outline">View cart</a>
                                                <a href="{{ route('shop-checkout.index') }}">Checkout</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center p-3">
                                            <p>Your cart is empty</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('assets/')}}/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ route('shop.index') }}" method="GET" id="mobile-search-form" onsubmit="return validateSearch(event)">
                        <input type="text" name="search" placeholder="Search for items..." value="{{ request('search') }}">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                    <style>
                        .mobile-search .search-style-3 button {
                            background-color: transparent;
                            border: none;
                            color: #253D4E;
                            transition: all 0.3s ease;
                        }
                        .mobile-search .search-style-3 button:hover {
                            color: white;
                        }
                    </style>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="{{ route('home.index')}}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('about.index')}}">About</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('shop.index')}}">Shop</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('contact.index')}}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login.index')}}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2024 Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->
    @yield('content')
    <footer class="main">
        <section class="container mb-50">
            <section class="text-center mb-50">
                <h2 class="title style-3 mt-100 mb-40">Frequently Asked Questions</h2>
            </section>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                                    What is Nest eCommerce?
                                </button>
                            </h2>
                            <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light p-3 text-dark rounded">
                                    Nest eCommerce is a modern template for building online stores with responsive design and complete features.
                                </div>
                            </div>
                        </div>
                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                    Does Nest eCommerce support online payments?
                                </button>
                            </h2>
                            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light p-3 text-dark p-3 rounded">
                                    Yes, this template can be integrated with various payment gateways such as PayPal, Stripe, and more.
                                </div>
                            </div>
                        </div>
                        <!-- Question 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                    How can I customize this template's appearance?
                                </button>
                            </h2>
                            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light p-3 text-dark p-3 rounded">
                                    You can edit the HTML, CSS, and JavaScript files of this template or use a backend framework like Laravel.
                                </div>
                            </div>
                        </div>
                        <!-- Question 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                    Is this template SEO friendly?
                                </button>
                            </h2>
                            <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light  text-dark p-3 rounded">
                                    Yes, Nest eCommerce is optimized for SEO with a clean HTML structure and compatibility with Google Search Console.
                                </div>
                            </div>
                        </div>
                        <!-- Question 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                                    Does Nest eCommerce support multiple languages?
                                </button>
                            </h2>
                            <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light p-3 text-dark p-3 rounded">
                                    Yes, this template supports multiple languages easily using translation files or additional plugins.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="index.html" class="mb-15"><img src="{{ asset('assets/')}}/imgs/logo/logo-2.png" width="120" alt="logo" /></a>
                                <p class="font-lg text-heading">Empower Your Journey with GideonMogo!</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>Jakarta, Indonesia</span></li>
                                <li><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+62) - 540-025-124553</span></li>
                                <li><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('about.index')}}">About Us</a></li>
                            <li>FAQ</li>
                            <li><a href="{{ route('contact.index')}}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Policy</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('privacy.index')}}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms.index')}}">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('refund.index')}}">Refund Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('login.index')}}">Sign In</a></li>
                            <li><a href="{{ route('shop-cart.index')}}">View Cart</a></li>
                        </ul>
                    </div>
                </div>
        </section>

        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2025, <strong class="text-brand">Itboy</strong> <br />All rights reserved</p>
                </div>

                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                    </div>
                    <div class="hotline d-lg-inline-flex">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/')}}/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/')}}/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('assets/')}}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/')}}/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('assets/')}}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/slick.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/waypoints.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/wow.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/slider-range.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/magnific-popup.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/select2.min.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/counterup.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/images-loaded.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/isotope.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/scrollup.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ asset('assets/')}}/js/plugins/jquery.elevatezoom.js"></script>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    @yield('scripts')
    <!-- Template  JS -->
    <script src="{{ asset('assets/')}}/js/main.js?v=6.0"></script>
    <script src="{{ asset('assets/')}}/js/shop.js?v=6.0"></script>
</body>

</html>
