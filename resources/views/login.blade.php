@extends('template.home_layout')

@section('content')
<main class="main pages d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="login_wrap widget-taber-content background-white">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h1 class="mb-3">Login</h1>
                            <p class="mb-4">Don't have an account? <a href="{{ route('register.index')}}">Create here</a></p>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" required name="email" placeholder="Username or Email *" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input required type="password" name="password" placeholder="Your password *" class="form-control"/>
                            </div>

                            <div class="login_footer form-group d-flex justify-content-between align-items-center">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" id="exampleCheckbox1"/>
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                </div>
                                <a class="text-muted" href="{{ route('forgot.index')}}">Forgot password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-heading btn-block hover-up w-100">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
