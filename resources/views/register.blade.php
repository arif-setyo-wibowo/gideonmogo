@extends('template.home_layout')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="login_wrap widget-taber-content background-white p-4 rounded">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h1 class="mb-5">Create an Account</h1>
                                <p class="mb-30">Already have an account? <a href="{{ route('login.index')}}">Login</a></p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" required name="username" placeholder="Username" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="email" required name="email" placeholder="Email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="password" placeholder="Password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="confirm_password" placeholder="Confirm password" class="form-control" />
                                </div>
                                <div class="form-group mb-30 text-center">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit &amp; Register</button>
                                </div>
                                <p class="font-xs text-muted text-center"><strong>Note:</strong> Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
