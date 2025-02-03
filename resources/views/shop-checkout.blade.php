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
                    <h6 class="text-body">There are <span
                            class="text-brand">{{ $cartItems->unique('produk_id')->count() }}</span> products in your
                        cart</h6>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('checkout.process') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="row mb-50">
                        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                            @guest
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an
                                        account?</span> <a href="#loginform" data-bs-toggle="collapse"
                                        class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                            </div>
                            @endguest
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="mb-30">Informasi Akun</h4>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="username" placeholder="In Game username *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="facebook" placeholder="Facebook Name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="link" placeholder="Link *">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="first_name" placeholder="First Name *"
                                    value="{{ Auth::check() ? Auth::user()->first_name : '' }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="last_name" placeholder="Last Name *"
                                    value="{{ Auth::check() ? Auth::user()->last_name : '' }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email *"
                                    value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="No Telp/ WA *"
                                    value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="note" placeholder="Catatan permintaan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Your Order</h4>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('storage/' . $item->produk->foto) }}"
                                                alt="{{ $item->produk->nama_produk }}">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5">
                                                <a href="{{ route('shop-detail.index', $item->produk->id) }}"
                                                    class="text-heading">
                                                    {{ $item->produk->nama_produk }}
                                                </a>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->quantity }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">
                                                ${{ number_format($item->produk->harga * $item->quantity, 0) }}
                                            </h4>
                                        </td>
                                        @php
                                        $total += $item->produk->harga * $item->quantity;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">
                                                ${{ number_format($total, 0) }}
                                            </h4>
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
                                <label for="payment_method" class="form-label fs-5 fw-bold">Select Payment
                                    Method</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="" selected disabled>Choose Payment Method</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="CashApp">Venmo</option>
                                    <option value="Venmo">CashApp</option>
                                </select>
                            </div>

                            <div id="payment-details" class="mt-3" style="display: none;">
                                <div id="PayPal-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p class="form-label fs-6 fw-bold">Send payment to: <span
                                                class="text-success">josephex13@gmail.com</span></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiPaypal" class="form-label fs-7 fw-bold">Upload PayPal
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_paypal" class="custom-file-input"
                                                id="uploadBuktiPaypal" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiPaypal">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="Venmo-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p>Send payment via Venmo</p>
                                        <a href="https://venmo.com/u/mogogs" target="_blank"
                                            class="btn btn-outline-primary btn-sm">Venmo Link</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiVenmo" class="form-label fs-7 fw-bold">Upload Venmo
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_venmo" class="custom-file-input"
                                                id="uploadBuktiVenmo" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiVenmo">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="CashApp-details" class="payment-detail" style="display: none;">
                                    <div class="alert alert-info">
                                        <p>Send payment to: <span class="text-success">mogogs</span></p>
                                        <a href="https://cash.app/$mogogs" target="_blank"
                                            class="btn btn-outline-primary btn-sm">CashApp Link</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadBuktiCashApp" class="form-label fs-7 fw-bold">Upload CashApp
                                            Payment Proof</label>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_pembayaran_cashapp" class="custom-file-input"
                                                id="uploadBuktiCashApp" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="uploadBuktiCashApp">Choose
                                                file...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="checkout-submit-btn"
                            class="btn btn-fill-out btn-block mt-30 ml-30 w-100 justify-content-center align-items-center"
                            style="display: none;"><img class="me-2" src="{{ asset('assets/imgs/theme/icons/wa.png') }}"
                                alt="WhatsApp Icon" style="width: 20px; height: 20px;"> Proses Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethodSelect = document.querySelector('#payment_method');
        const paymentDetailsContainer = document.querySelector('#payment-details');
        const paymentDetails = document.querySelectorAll('.payment-detail');
        const checkoutForm = document.querySelector('form');
        const submitButton = document.querySelector('#checkout-submit-btn');

        // Initially hide submit button and payment details
        submitButton.style.display = 'none';
        paymentDetailsContainer.style.display = 'none';
        paymentDetails.forEach(detail => {
            detail.style.display = 'none';
        });

        // File input name and validation handling
        document.querySelectorAll('.custom-file-input').forEach(input => {
            input.addEventListener('change', function (event) {
                const file = event.target.files[0];
                let fileName = file ? file.name : "Choose file...";
                this.nextElementSibling.innerText = fileName;

                // Validate file
                if (file) {
                    // Check file type (must be an image)
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Please upload a valid image (JPEG, PNG, JPG)');
                        this.value = ''; // Clear the file input
                        this.nextElementSibling.innerText = "Choose file...";
                        return;
                    }

                    // Check file size (max 5MB)
                    const maxSize = 5 * 1024 * 1024; // 5MB
                    if (file.size > maxSize) {
                        alert('File size must not exceed 5MB');
                        this.value = ''; // Clear the file input
                        this.nextElementSibling.innerText = "Choose file...";
                        return;
                    }
                }

                // Validate payment method and file
                validatePaymentAndFile();
            });
        });

        // Add event listener to payment method select
        paymentMethodSelect.addEventListener('change', function () {
            const selectedPaymentMethod = paymentMethodSelect.value;

            // Hide all payment details and submit button
            paymentDetails.forEach(detail => {
                detail.style.display = 'none';
            });
            submitButton.style.display = 'none';

            // Show/hide payment details container
            if (selectedPaymentMethod) {
                paymentDetailsContainer.style.display = 'block';

                // Show selected payment details
                const selectedPaymentDetail = document.querySelector(
                    `#${selectedPaymentMethod}-details`);
                if (selectedPaymentDetail) {
                    selectedPaymentDetail.style.display = 'block';
                }

                // Enable corresponding file input
                const correspondingFileInput = document.querySelector(
                    `#${selectedPaymentMethod}-details input[name="bukti_pembayaran_${selectedPaymentMethod.toLowerCase()}"]`
                    );
                if (correspondingFileInput) {
                    correspondingFileInput.disabled = false;
                }
            } else {
                paymentDetailsContainer.style.display = 'none';
            }
        });

        // Function to validate payment method and file
        function validatePaymentAndFile() {
            const selectedPaymentMethod = paymentMethodSelect.value;

            if (!selectedPaymentMethod) {
                submitButton.style.display = 'none';
                return;
            }

            const correspondingFileInput = document.querySelector(
                `#${selectedPaymentMethod}-details input[name="bukti_pembayaran_${selectedPaymentMethod.toLowerCase()}"]`
                );

            if (correspondingFileInput && correspondingFileInput.files.length > 0) {
                submitButton.style.display = 'block';
            } else {
                submitButton.style.display = 'none';
            }
        }
    });

</script>
@endsection
