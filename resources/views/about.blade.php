@extends('template.home_layout')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> About us
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-center mb-50">
                        <div class="col-lg-6">
                            <img src="assets/imgs/About3.webp" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4 img-fluid " style="float:right; width: 500px; " />
                        </div>
                        <div class="col-lg-6">
                            <div class="pl-25">
                                <h3 class="mb-30">Welcome to GideonMogo Store: Elevating Your Gaming Experience</h3>
                                <p class="mb-25" style="font-size: 18px;">At GideonMogo Store, we are passionate about enhancing your gaming experience by providing top-quality virtual products and unparalleled services. As avid gamers ourselves, we understand the importance of having the right tools and resources to excel in your favorite games. That's why we've made it our mission to offer a diverse range of virtual products and services designed to take your gaming to the next level.</p>

                            </div>
                        </div>
                    </section>
                    <section class="row align-items-center mb-50">
                        <div class="row mb-50 align-items-center">
                            <div class="col-lg-6">
                                <h4 class="heading-1 mb-20">Our Specialization</h4>
                                <p class="mb-30" style="font-size: 17px;">We specialize in boosting dice and offering a wide array of star stickers to add an extra layer of excitement to your gaming adventures. Whether you're seeking 1-star stickers for a modest boost or 5-star stickers for the ultimate advantage, we have you covered. Additionally, our golden Blitz stickers are guaranteed to add a touch of prestige to your gaming arsenal.</p>

                                <h4 class="mb-20 ">Partnership Events</h4>
                                <p class="mb-30" style="font-size: 17px;">At GideonMogo Store, we believe in the power of collaboration. That's why we actively engage in partnership events with other gaming enthusiasts and industry leaders. These events provide us with the opportunity to connect with our community, share valuable insights, and explore new possibilities for enhancing the gaming experience.</p>

                            </div>
                            <div class="col-lg-6 pr-30">
                                <img src="assets/imgs/About2.webp" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" style="border-radius: 20px;" width="450"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Our Services</h3>
                                <p style="font-size: 17px;">We understand that every gamer has unique needs and preferences. That's why we offer a variety of services tailored to suit your individual requirements. From quick slots for those seeking immediate results to rapid slots for a fast-paced gaming experience, we have the perfect solution for you. And if you prefer a more traditional approach, our normal slots are always available to meet your needs.</p>
                            </div>
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Taking Your Game Global</h3>
                                <p style="font-size: 17px;">Are you ready to elevate your gaming experience to a global level? Look no further than GideonMogo Store. Our team of dedicated professionals is committed to helping you achieve your gaming goals and aspirations. Whether you're a casual gamer looking to improve your skills or a competitive player aiming for the top, we have the expertise and resources to support you every step of the way.</p>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="mb-30">Join Us Today</h3>
                                <p style="font-size: 17px;">Are you ready to unlock the full potential of your gaming experience? Join us at GideonMogo Store and discover a world of endless possibilities. With our premium virtual products, expert services, and passionate community, you'll have everything you need to dominate the gaming arena. Don't settle for mediocrity—choose GideonMogo Store and take your game to the next level!</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
