@extends('template.home_layout')

@section('content')
<main class="main pages">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a><span></span>
                Login
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h1 class="mb-3">Login</h1>
                                <p class="mb-4">Don't have an account? <a href="{{ route('register.index')}}">Create
                                        here</a></p>
                            </div>
                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" required name="email" placeholder="Email *" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="password" placeholder="Your password *" 
                                           class="form-control @error('password') is-invalid @enderror" />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="login_footer form-group d-flex justify-content-between align-items-center">
                                    <div class="custome-checkbox">
                                        
                                    </div>
                                    <a class="text-muted" href="{{ route('password.request')}}">Forgot password?</a>
                                </div>
                                <div class="form-group mb-30 text-center">
                                    <button type="submit" class="btn btn-fill-out hover-up w-100">Log in</button>
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

@section('scripts')
<script>
    if ({{ Session::has('status') }}) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get('status') }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>
@endsection