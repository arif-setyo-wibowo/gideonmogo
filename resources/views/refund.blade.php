@extends('template.home_layout')
@section('content')


<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Refund Guide
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                <div class="single-header style-2">
                                    <h2>Refund Guide</h2>
                                </div>
                                <figure class="border-radius-15 mb-30">
                                    <img class="border-radius-15" src="assets/imgs/page/guide-1.png" alt="" />
                                </figure>
                                <div class="single-content mb-50">
                                    <h3>1. Account Registering</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>
                                    <ul class="mb-30">
                                        <li>Name (required)</li>
                                        <li>Age (required)</li>
                                        <li>Date of birth (required)</li>
                                        <li>Passport/ ID no. (required)</li>
                                        <li>Current career (required)</li>
                                        <li>Mobile phone numbers (required)</li>
                                        <li>Email address (required)</li>
                                        <li>Hobbies &amp; interests (optional)</li>
                                        <li>Social profiles (optional)</li>
                                    </ul>
                                    <h3>2. Select Product</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>
                                    <h3>3. Confirm Order Content</h3>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>
                                    <h3>4.Transaction Completed</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>
                                    <h3>5. Accepted Credit Cards</h3>
                                    <ul>
                                        <li>Visa</li>
                                        <li>Mastercards</li>
                                        <li>American Express</li>
                                        <li>Discover</li>
                                    </ul>
                                    <span>*Taxes are calculated by your local bank and location.</span>
                                    <h3 class="mt-30">6. Download and Setup</h3>
                                    <ul>
                                        <li>Updated content on a regular basis</li>
                                        <li>Secure &amp; hassle-free payment</li>
                                        <li>1-click checkout</li>
                                        <li>Easy access &amp; smart user dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
