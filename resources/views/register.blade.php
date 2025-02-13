@extends('template.home_layout')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a><span></span> Register
            </div>
        </div>
    </div>
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="login_wrap widget-taber-content background-white p-4 rounded">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h1 class="mb-5">Create an Account</h1>
                                <p class="mb-30">Already have an account? <a href="{{ route('login.index')}}">Login</a></p>
                            </div>
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <div class="form-group mb-30">
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name') }}" 
                                        placeholder="Full Name"
                                        required />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-30">
                                    <input type="email" 
                                           name="email" 
                                           placeholder="Email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" 
                                           required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-30">
                                    <input type="password" 
                                           name="password" 
                                           placeholder="Password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-30">
                                    <input type="password" 
                                           name="password_confirmation" 
                                           placeholder="Confirm Password" 
                                           class="form-control" 
                                           required />
                                </div>
                                <div class="form-group mb-30 text-center">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Register</button>
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
