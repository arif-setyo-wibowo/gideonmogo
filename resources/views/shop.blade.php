@extends('template.home_layout')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header-3 mt-30 mb-80 ">
                <div class="archive-header-3-inner" style="border-radius: 20px;">
                    <video autoplay loop muted playsinline class="video-background" style="border-radius: 20px;">
                        <source src="{{ asset('assets/video/homeBanner_enus.mp4') }}" type="video/mp4">
                    </video>

                    <div class="overlay" style="border-radius:20px;"></div>

                    <div class="vendor-logo mr-50">
                        <img src="{{ asset('assets/')}}/imgs/logo/logo.png" alt="">
                    </div>
                    <div class="vendor-content">
                        <div class="product-category">
                            <span class="text-muted">Since 2025</span>
                        </div>
                        <h3 class="mb-5 text-white"><a href="{{ route('home.index')}}" class="text-white">GideonMogo</a>
                        </h3>
                        {{-- <div class="product-rate-cover mb-15">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="vendor-des mb-15">
                                    <p class="font-sm text-white">GideonMogo: Unlock Your Game with Premium Items, Boost
                                        Your Power, and Dominate the Leaderboard!</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="vendor-info text-white mb-15">
                                    <ul class="font-sm">
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-location.svg"
                                                alt=""><strong>Address: </strong> <span>Jakarta, Indonesia</span></li>
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-contact.svg"
                                                alt=""><strong>Call Us:</strong><span>(+62) - 898 - 5288 - 600</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="follow-social">
                                    <h6 class="mb-15 text-white">Follow Us</h6>
                                    <ul class="social-network">
                                        <li class="hover-up">
                                            <a href="{{ $contact_view->link_facebook ?? '#' }}">
                                                <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="Facebook" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="{{ $contact_view->link_instagram ?? '#' }}">
                                                <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="Instagram" />
                                            </a>
                                        </li>

                                        <li class="hover-up">
                                            <a href="{{ $contact_view->link_wa ?? '#' }}">
                                                <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/wa.png') }}" alt="WhatsApp" />
                                            </a>
                                        </li>

                                        <li class="hover-up">
                                            <a href="{{ $contact_view->link_discord ?? '#' }}">
                                                <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/discord.webp') }}" alt="Discord" />
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        @if(request('search'))
                        <p>
                            @if($products->total() > 0)
                            We found <strong class="text-brand">{{ $products->total() }}</strong> items matching
                            "{{ request('search') }}"
                            @else
                            <strong class="text-danger">No results found for "{{ request('search') }}"</strong>
                            @endif
                        </p>
                        @else
                        <p>We found <strong class="text-brand">{{ $products->total() }}</strong> items for you!</p>
                        @endif
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> {{ request('show', 'all') }} <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="{{ request('show') == 25 ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('show'), ['show' => 25])) }}">25</a>
                                    </li>
                                    <li><a class="{{ request('show') == 50 ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('show'), ['show' => 50])) }}">50</a>
                                    </li>
                                    <li><a class="{{ request('show') == 75 ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('show'), ['show' => 75])) }}">75</a>
                                    </li>
                                    <li><a class="{{ request('show') == 'all' ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('show'), ['show' => 'all'])) }}">All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span>
                                        @switch(request('sort'))
                                        @case('price_asc')
                                        Price: Low to High
                                        @break
                                        @case('price_desc')
                                        Price: High to Low
                                        @break
                                        @case('newest')
                                        Newest
                                        @break
                                        @default
                                        Featured
                                        @endswitch
                                    </span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="{{ !request('sort') ? 'active' : '' }}"
                                            href="{{ route('shop.index', request()->except('sort')) }}">Featured</a>
                                    </li>
                                    <li><a class="{{ request('sort') == 'price_asc' ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('sort'), ['sort' => 'price_asc'])) }}">Price:
                                            Low to High</a></li>
                                    <li><a class="{{ request('sort') == 'price_desc' ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('sort'), ['sort' => 'price_desc'])) }}">Price:
                                            High to Low</a></li>
                                    <li><a class="{{ request('sort') == 'newest' ? 'active' : '' }}"
                                            href="{{ route('shop.index', array_merge(request()->except('sort'), ['sort' => 'newest'])) }}">Newest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('shop-detail.index', $product->slug) }}">
                                        <img class="default-img" src="{{ asset('storage/' . $product->foto) }}"
                                            alt="{{ $product->nama_produk }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="">{{ $product->kategori->kategori }}</a>
                                </div>
                                <h2><a
                                        href="{{ route('shop-detail.index', $product->slug) }}">{{ $product->nama_produk }}</a>
                                </h2>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$ {{ $product->harga }}</span>
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
                    @endforeach
                    <!--end product card-->
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        {{ $products->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                        <li>
                            <a href="{{ route('shop.index',
                                array_merge(
                                    request()->except('category'),
                                    ['category' => 'all']
                                )
                            ) }}"
                                class="category-filter {{ request('category') == 'all' || !request('category') ? 'active' : '' }}">
                                All Categories
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('shop.index',
                                array_merge(
                                    request()->except('category'),
                                    ['category' => $category->slug]
                                )
                            ) }}" class="category-filter {{ request('category') == $category->slug ? 'active' : '' }}">
                                {{ $category->kategori }}
                                <span class="count">{{ $category->produks_count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" data-min="0" data-max="10000" data-actual-min="0"
                                data-actual-max="10000" class="mb-20"></div>
                            <div class="d-flex justify-content-between">
                                <div class="caption">From:
                                    <strong id="slider-range-value1" class="text-brand">
                                        ${{ number_format($minPrice, 0, ',', '.') }}
                                    </strong>
                                </div>
                                <div class="caption">To:
                                    <strong id="slider-range-value2" class="text-brand">
                                        ${{ number_format($maxPrice, 0, ',', '.') }}
                                    </strong>
                                </div>
                            </div>
                            <a href="{{ route('shop.index',
                                array_merge(
                                    request()->except(['min_price', 'max_price']),
                                    [
                                        'min_price' => $minPrice,
                                        'max_price' => $maxPrice
                                    ]
                                )
                            ) }}" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
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
