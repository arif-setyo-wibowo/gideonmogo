@extends('template.home_layout')
@section('content')


<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Contact
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            <div class="row">
                                <div class="col mt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ $contact->link_facebook ?? 'https://www.facebook.com' }}"
                                           class="mr-3 btn btn-sm font-weight-bold text-white mr-5 border-radius-5 btn-shadow-brand hover-up">
                                            <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" width="35" alt="Facebook" />
                                        </a>
                                        <h4 class="mb-0 text-brand">Facebook</h4>
                                    </div>
                                </div>

                                <div class="col mt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ $contact->link_instagram ?? 'https://www.instagram.com' }}"
                                           class="mr-3 btn btn-sm font-weight-bold text-white mr-5 border-radius-5 btn-shadow-brand hover-up">
                                            <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" width="35" alt="Instagram" />
                                        </a>
                                        <h4 class="mb-0 text-brand">Instagram</h4>
                                    </div>
                                </div>

                                <div class="col mt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ $contact->link_discord ?? 'https://www.discord.com' }}"
                                           class="mr-3 btn btn-sm font-weight-bold text-white mr-5 border-radius-5 btn-shadow-brand hover-up">
                                            <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/discord.webp') }}" width="35" alt="Discord" />
                                        </a>
                                        <h4 class="mb-0 text-brand">Discord</h4>
                                    </div>
                                </div>

                                <div class="col mt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ $contact->link_wa ?? 'https://wa.me' }}"
                                           class="mr-3 btn btn-sm font-weight-bold text-white mr-5 border-radius-5 btn-shadow-brand hover-up">
                                            <img style="margin-top: 5px; height: 20px;" src="{{ asset('assets/imgs/theme/icons/wa.png') }}" width="35" alt="WhatsApp" />
                                        </a>
                                        <h4 class="mb-0 text-brand">WhatsApp</h4>
                                    </div>
                                </div>
                            </div>


                        <!-- Connect With Us Section -->
                        <div class="row">
                            <div class="col-12 text-center mt-50">
                                <h2 class="title style-3 mb-40 ">Connect with Us</h2>
                            </div>
                        </div>

                        <!-- Contact Form Section -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="contact-from-area padding-20-row-col">
                                    <h5 class="text-brand mb-10">Contact form</h5>
                                    <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>

                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form class="contact-form-style mt-30" action="{{ route('contact.send') }}" method="POST">
                                        @csrf<div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="name" placeholder="First Name" type="text" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="email" placeholder="Your Email" type="email" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="phone" placeholder="Your Phone" type="tel" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="subject" placeholder="Subject" type="text" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="textarea-style mb-30">
                                                    <textarea name="message" placeholder="Message" required></textarea>
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 pl-50 d-lg-block d-none">
                                <img class="border-radius-15 mt-50" src="assets/imgs/page/contact-2.png" alt="" />
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
