@extends('template.admin_layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">GideonMogo /</span> Produk Vendo Update</h4>

    <div class="card mb-4">
        <div class="card-header p-0">
          <div class="nav-align-top">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                <button type="button" class="nav-link waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="true">
                    Edit Data
                </button>
                </li>
            <span class="tab-slider" style="left: 91.1528px; width: 107.111px; bottom: 0px;"></span></ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel">
                <form action="{{ route('kategori.update','1')}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="basic-default-fullname" name="nama_produk" placeholder="produk" required/>
                        <label for="basic-default-fullname">Nama Produk</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="number" class="form-control" id="basic-default-fullname" name="nama_produk" placeholder="produk" required/>
                        <label for="basic-default-fullname">Stok</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="number" class="form-control" id="basic-default-fullname" name="nama_produk" placeholder="produk" required/>
                        <label for="basic-default-fullname">Harga</label>
                    </div>
                    <div class="mb-4">
                        <label for="basic-default-fullname">Foto Produk</label>
                        <input type="file" class="form-control" id="basic-default-fullname" name="foto" placeholder="Judul Latihan" />

                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="hidden" id="snow-editor-content" name="isi">


                        <div id="snow-editor">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('produk.index')}}"><button type="button" class="btn btn-danger">Batal</button></a>
                </form>
            </div>
          </div>
        </div>
      </div>


</div>
  <!-- / Content -->
@endsection

