@extends('template.home_layout')
@section('content')


<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a><span></span> Privacy Policy
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
                                    <h2>Privacy Policy</h2>
                                    <p>We collect information about you during the checkout process on our store.</p>
                                </div>
                                <div class="single-content mb-50">
                                    <h4>What we collect and store</h4>
                                    <ol >
                                        <li>
                                            We will use your personal information:
                                            <ol>
                                                <li class="has-dot">Products you’ve viewed: we’ll use this to, for example, show you products you’ve recently viewed</li>
                                                <li class="has-dot">
                                                    Location, IP address and browser type: we’ll use this for purposes like estimating taxes and shipping
                                                </li>
                                                <li class="has-dot">
                                                    Shipping address: we’ll ask you to enter this so we can, for instance, estimate shipping before you place an order, and send you the order!
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                    <ol start="2">
                                        <li>We’ll also use cookies to keep track of cart contents while you’re browsing our site.</li>
                                    </ol>
                                    <ol start="3">
                                        <li>When you purchase from us, we’ll ask you to provide information including your name, billing address, shipping address, email address, phone number, credit card/payment details and optional account information like username and password. We’ll use this information for purposes, such as, to:</li>
                                        <ol>
                                            <li class="has-dot">Send you information about your account and order</li>
                                            <li class="has-dot">
                                                Respond to your requests, including refunds and complaints
                                            </li>
                                            <li class="has-dot">
                                                Process payments and prevent fraud
                                            </li>
                                            <li class="has-dot">
                                                Set up your account for our store
                                            </li>
                                            <li class="has-dot">
                                                Comply with any legal obligations we have, such as calculating taxes
                                            </li>
                                            <li class="has-dot">
                                                Improve our store offerings
                                            </li>
                                        </ol>
                                    </ol>
                                    <ol start="4">
                                        <li>
                                            If you create an account, we will store your name, address, email and phone number, which will be used to populate the checkout for future orders.
                                        </li>
                                    </ol>
                                    <h4>Who on our team has access</h4>
                                    <ol start="5">
                                        <li>
                                            Members of our team have access to the information you provide us. For example, both Administrators and Shop Managers can access:
                                        </li>
                                        <ol>
                                            <li class="has-dot">Order information like what was purchased, when it was purchased and where it should be sent, and</li>
                                            <li class="has-dot">
                                                Customer information like your name, email address, and billing and shipping information.
                                            </li>
                                        </ol>
                                        <p>Our team members have access to this information to help fulfill orders, process refunds and support you.</p>
                                    </ol>
                                    <h4>What we share with others</h4>
                                    <ol start="6">
                                        <li>We share information with third parties who help us provide our orders and store services to you; for example --</li>
                                    </ol>
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
