@extends('template.home_layout')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home.index')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <div class="row">
                    <h4 class="mb-30">Informasi Akun</h4>
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="fname" placeholder="In Game username *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="Facebook Name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="Link *">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="fname" placeholder="Nama Awal *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="nama Akhir *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address" required="" placeholder="Alamat *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="No Telp/ WA *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email *">
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Catatan permintaan"></textarea>
                        </div>


                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">Yidarton Women Summer Blue</a></h6></span>
                                        <div class="product-rate-cover">

                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x 1</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">$13.3</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-2-1.jpg" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">Seeds of Change Organic Quinoa</a></h6></span>
                                        <div class="product-rate-cover">

                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x 1</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">$15.0</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-3-1.jpg" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">Angie’s Boomchickapop Sweet </a></h6></span>
                                        <div class="product-rate-cover">

                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x 1</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">$17.2</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount" data-target="#collapsePassword">
                                    <label class="form-check-label fs-5 fw-bold" data-bs-toggle="collapse" href="#collapsePassword" aria-controls="collapsePassword" for="createaccount">Pay Pal</label>
                                    <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" width="90" height="25" alt="">
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword" class="form-group create-account collapse">
                            <div>
                                <label for="uploadBukti" class="form-label fs-4 fw-bold">Upload Bukti Pembayaran</label>
                            </div>
                            <label for="nomer" class="form-label fs-4 fw-bold text-success">
                                Paypal : josephex13@gmail.com
                            </label>
                            <div class="custom-file">
                                <input type="file" name="bukti" class="custom-file-input" id="uploadBukti" required>
                                <label class="custom-file-label" for="uploadBukti">Pilih file...</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount1" data-target="#collapsePassword1">
                                    <label class="form-check-label fs-5 fw-bold" data-bs-toggle="collapse" href="#collapsePassword1" aria-controls="collapsePassword1" for="createaccount1">CashApp</label>
                                    <img class="mr-15" src="assets/imgs/theme/cashapp.png" width="90" height="25" alt="">
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword1" class="form-group create-account collapse in">
                            <div>
                                <label for="uploadBukti" class="form-label fs-4 fw-bold">Upload Bukti Pembayaran</label>
                            </div>
                            <label for="nomer" class="form-label fs-4 fw-bold text-success">
                                CashApp : $mogogs or &nbsp; <a href="https://cash.app/$mogogs">Link CashApp</a>
                            </label>
                            <div class="custom-file">
                                <input type="file" name="bukti" class="custom-file-input" id="uploadBukti" required>
                                <label class="custom-file-label" for="uploadBukti">Pilih file...</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount2" data-target="#collapsePassword2">
                                    <label class="form-check-label fs-5 fw-bold" data-bs-toggle="collapse" href="#collapsePassword2" aria-controls="collapsePassword2" for="createaccount2">Venmo</label>
                                    <img class="mr-15" src="assets/imgs/theme/venmo-logo.webp" width="90" height="25" alt="">
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword2" class="form-group create-account collapse in">
                            <div>
                                <label for="uploadBukti" class="form-label fs-4 fw-bold">Upload Bukti Pembayaran</label>
                            </div>
                            <label for="nomer" class="form-label fs-4 fw-bold text-success">
                                Venmo : <a href="https://venmo.com/u/mogogs">Link Venmo</a>
                            </label>
                            <div class="custom-file">
                                <input type="file" name="bukti" class="custom-file-input" id="uploadBukti" required>
                                <label class="custom-file-label" for="uploadBukti">Pilih file...</label>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30 d-flex align-items-center justify-content-center">
                        <img class="me-2" src="{{ asset('assets/imgs/theme/icons/wa.png') }}" alt="WhatsApp Icon" style="width: 20px; height: 20px;">
                            Checkout Ke WhatsApp
                        <i class="fi-rs-sign-out ms-2"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    document.querySelector(".custom-file-input").addEventListener("change", function () {
        let fileName = this.files[0] ? this.files[0].name : "Pilih file...";
        this.nextElementSibling.innerText = fileName;
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkboxes = document.querySelectorAll('.payment_option .form-check-input');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                            document.querySelector(otherCheckbox.getAttribute("data-target")).classList.remove("show");
                        }
                    });
                }
            });
        });
    });
</script>

@endsection
