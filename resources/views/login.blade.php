@extends('template.home_layout')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a><span></span> Login
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
                                <h1 class="mb-5">Login</h1>
                                <p class="mb-30">Don't have an account? <a href="{{ route('register.index')}}">Create here!</a></p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" required name="email" placeholder="Email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="password" placeholder="Password" class="form-control" />
                                </div>
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        </div>
                                    </div>
                                    <a class="text-muted" href="{{ route('forgot.index')}}">Forgot password?</a>
                                </div>
                                <div class="form-group mb-30 text-center">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
