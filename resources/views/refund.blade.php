@extends('template.home_layout')
@section('content')


<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Refund Policy
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
                                    <h2>Refund Policy</h2>
                                </div>
                                <figure class="border-radius-15 mb-30">
                                    <img class="border-radius-15" src="assets/imgs/page/guide-1.png" alt="" />
                                </figure>
                                <div class="single-content mb-50">
                                    <h3>Cancellation</h3>
                                    <p>If you cancel before the delivery after payment, we will give you a full refund. If your product has been delivered, we will not be able to cancel and refund you.</p>

                                    <h3>Refund</h3>
                                    <p>below are the situations that you can ask for a refund:</p>
                                    <p>The payment has been confirmed but the order has not been started yet, we will do a full refund immediately.</p>
                                    <p>The payment has been confirmed but the delivery is delayed due to the product being out of stock.</p>
                                    <h3>Refund Process</h3>
                                    <p>To submit a refund request, please email our customer service at <a href="https://m.me/gideon.sembiring.3 ">messenger</a> as soon as possible along with your order information. Or you can simply use our online live chat support to get an instant reply.</p>
                                    <p>After receiving your order information, we will look into your case and process the refund for you immediately as long as you meet our refund policy.
                                        You will get your refund instantly if the payment is through PayPal.</p>
                                    <p>However, please allow us at least 3-5 days to process your refund if you are using credit cards. We will notify you by email when your refund has been processed.</p>
                                    <h3>Questions</h3>
                                    <p>If you have any questions concerning our refund policy, please <a href="{{ route('contact.index')}}">contact us</a> at any time.</p>
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
