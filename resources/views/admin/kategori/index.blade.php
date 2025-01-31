@extends('template.admin_layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">GideonMogo /</span> Kategori</h4>

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
                     Kategori
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                      Tambah Data
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
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>P</td>
                            <td>
                                <a href="{{ route('kategori.edit','1')}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <form action="" method="POST" id="delete-form" style="display: inline;">
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm" id="confirm-text">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade " id="navs-top-profile" role="tabpanel">
                <form action="{{ route('kategori.store')}}" method="POST" >
                    @csrf
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_kategori" placeholder="Kategori" required/>
                        <label for="basic-default-fullname">Kategori</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
          </div>
        </div>
      </div>


</div>
  <!-- / Content -->
@endsection
@section('js')
<script>
    document.getElementById('confirm-text').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Yakin ingin menghapus data?',
            text: "Data yang dihapus akan hilang!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: {
            confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
            cancelButton: 'btn btn-outline-secondary waves-effect'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Hapus!',
                    text: 'Data telah dihapus.',
                    customClass: {
                    confirmButton: 'btn btn-success waves-effect'
                    }
                });
            }
        });
    });
</script>
@endsection
