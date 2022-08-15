@extends('admin.maindashboard')

@section('title', 'Tambah Data Menu')

@section('header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/dashboard/menu">Menu</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if (session('gagal'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('gagal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-egg-fill"></i> Tambah Data Menu</div>
                            <div class="card-body">
                            <form action="/dashboard/menu" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail">Nama Menu</label>
                                    <input name="nama_menu"type=text class="form-control @error('nama_menu') is-invalid @enderror"  value="{{ old('nama_menu') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Menu..." autofocus>
                                    @error('nama_menu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect">Pilih Kategori</label>
                                    <select class="form-select @error('kategori') is-invalid @enderror"  id="exampleFormControlSelect" aria-label="Default select example" name="kategori" placeholder="Pilih...">
                                        <option selected></option>
                                        <option value="Makanan" >Makanan</option>
                                        <option value="Minuman" >Minuman</option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="mt-2">Harga</label>
                                    <input type=number name="harga_menu" class="form-control @error('harga_menu') is-invalid @enderror"  value="{{ old('harga_menu') }}"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Harga...">
                                    @error('harga_menu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    {{-- <label for="exampleInputEmail" class="mt-2">Gambar</label>
                                    <input type=text name="gambar" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Gambar...">
                             --}}
                                    <label for="exampleFormControlFile" class="mt-2">Tambah Gambar</label>
                                    <input type="file" name="gambar_menu" class="form-control-file @error('gambar_menu') is-invalid @enderror"  id="exampleFormControlFile">
                                    @error('gambar_menu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlSelect" class="mt-2">Deskripsi</label>
                                    <textarea name="desc_menu" id="" cols="30" rows="10" class="form-control @error('desc_menu') is-invalid @enderror"  placeholder="Deskripsi Menu...">{{ old('desc_menu') }}</textarea>
                                    @error('desc_menu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlSelect" class="mt-2">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror"  value="{{ old('status') }}" id="exampleFormControlSelect" name="status">
                                        <option selected></option>
                                        <option value="Tersedia" >Tersedia</option>
                                        <option value="Kosong" >Kosong</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <a href="/dashboard/menu" class="btn btn-danger text-light mt-2">Batal</a>
                                <button type="submit" name="submit" class="btn btn-primary text-light mt-2">Tambah</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        <!-- /.content -->          
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    


@endsection