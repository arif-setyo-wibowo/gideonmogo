@extends('template.admin_layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">GideonMogo /</span> Produk</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
          <!-- Success Alert -->
            @if (session()->has('msg'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('msg') }}',
                        icon: 'success',
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
            @endif

            <!-- Error Alert -->
            @if (session()->has('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ session('error') }}',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
            @endif

            <!-- Validation Errors Alert -->
            @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        html: '{!! implode("<br>", $errors->all()) !!}',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                });
            </script>
            @endif

          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="false" tabindex="-1">
                     Produk
                    </button>
                  </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomer Order</th>
                            <th>Email</th>
                            <th>Tanggal Order</th>
                            <th>Total Harga</th>
                            <th>Bukti Transfer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order Pertama dengan 2 Produk -->
                        <tr>
                            <td >1</td>
                            <td>YE6SU9</td>
                            <td>arif@gmail</td>
                            <td>12-12-2024</td>
                            <td>Rp 2.000.000</td>
                            <td>
                                <img src="{{ asset('assets/imgs/banner/banner-menu.png') }}"
                                     style="cursor: pointer;"
                                     data-bs-toggle="modal"
                                     data-bs-target="#modalCenter"
                                     alt="Produk Image"
                                     width="125">
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm open-modal"
                                data-order='[
                                    {"produk": "Handphone", "jumlah": 2, "harga": "Rp 2.000.000"},
                                    {"produk": "Laptop", "jumlah": 1, "harga": "Rp 5.000.000"}
                                ]'
                                data-bs-toggle="modal"
                                data-bs-target="#modalProduk"

                                alt="Produk">
                                    <i class="mdi mdi-information"></i> Detail Produk
                                </button>
                                <button type="button" class="btn btn-info btn-sm" id="confirm-text">
                                    <i class="mdi mdi-thumb-up"></i> konfirmasi
                                </button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
          </div>
        </div>
      </div>


</div>
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="modalCenterTitle">Gambar</h4>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-4 mt-2">
                <div class="form-floating form-floating-outline">
                    <img src="{{ asset('assets/imgs/banner/banner-menu.png') }}"
                        alt="Produk Image"
                        width="100%">
                </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal Produk -->
    <div class="modal fade" id="modalProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Tambahkan modal-lg agar modal lebih besar di layar besar -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Produk Dibeli</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Nomer Order: <span id="nomerOrder">sad6876</span></h3>
                    <div class="table-responsive"> <!-- Pastikan tabel dibungkus dengan div ini -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody id="modalProdukBody">
                                <!-- Data produk akan dimasukkan melalui JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKonfirmasiLabel">Konfirmasi Aksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin melanjutkan aksi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tolak</button>
                    <button type="button" class="btn btn-success" id="setujuBtn">Setuju</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalElement = document.getElementById("modalProduk");

        modalElement.addEventListener("hidden.bs.modal", function () {
            // Pastikan modal benar-benar tersembunyi
            document.body.classList.remove("modal-open");
            document.querySelectorAll(".modal-backdrop").forEach(el => el.remove());
        });

        document.querySelectorAll(".open-modal").forEach(function(img) {
            img.addEventListener("click", function() {
                let orderData = JSON.parse(this.getAttribute("data-order"));
                let modalBody = document.getElementById("modalProdukBody");
                modalBody.innerHTML = "";

                orderData.forEach((item, index) => {
                    let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.produk}</td>
                            <td>${item.jumlah}</td>
                            <td>${item.harga}</td>
                        </tr>
                    `;
                    modalBody.innerHTML += row;
                });

                // Tampilkan modal
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            });
        });
    });

    document.getElementById("confirm-text").addEventListener("click", function() {
        var modal = new bootstrap.Modal(document.getElementById('modalKonfirmasi'));
        modal.show();
    });

    // Tambahkan aksi untuk tombol Setuju
    document.getElementById("setujuBtn").addEventListener("click", function() {
        modal.hide();
    });

</script>

@endsection
