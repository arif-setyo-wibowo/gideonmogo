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
                                <h2 class="mb-30">Welcome to Nest</h2>
                                <p class="mb-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.</p>
                                <p class="mb-50">Ius ferri velit sanctus cu, sed at soleat accusata. Dictas prompta et Ut placerat legendos interpre.Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante Etiam sit amet orci eget. Quis commodo odio aenean sed adipiscing. Turpis massa tincidunt dui ut ornare lectus. Auctor elit sed vulputate mi sit amet. Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.</p>

                            </div>
                        </div>
                    </section>
                    <section class="row align-items-center mb-50">
                        <div class="row mb-50 align-items-center">
                            <div class="col-lg-5">
                                <h4 class="mb-20 text-muted">Our performance</h4>
                                <h1 class="heading-1 mb-40">Your Partner for e-commerce grocery solution</h1>
                                <p class="mb-30">Ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                <p>Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</p>
                            </div>
                            <div class="col-lg-7 pr-30">
                                <img src="assets/imgs/About2.webp" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" style="border-radius: 20px;" width="450"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Who we are</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Our history</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="mb-30">Our mission</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
