@extends('admin.dashboard')

@section('title', 'Ubah Data Menu')

@section('content')
{{-- @dd($menu) --}}
<div id="content-wrapper" class="tittle3">

    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item text-light">
                <a href="#">Menu</a>
            </li>
            <li class="breadcrumb-item active">Tambah Menu</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-egg-fill"></i> Tambah Data Menu</div>
            <div class="card-body">
            <form action="/dashboard/menu/{{$menu->id}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail">Nama Menu</label>
                <input type=text name="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" value="{{ old('nama', $menu->nama_menu) }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Menu..." required>
                @error('nama_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
                <label for="exampleFormControlSelect">Pilih Kategori</label>
                <select class="form-control @error('kategori') is-invalid @enderror" id="exampleFormControlSelect" name="kategori" required>
                    <option selected>{{ old('kategori', $menu->kategori) }}</option>
                    <option value="Makanan" >Makanan</option>
                    <option value="Minuman" >Minuman</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="exampleInputEmail" class="mt-2">Harga</label>
                <input type=text name="harga_menu" class="form-control @error('harga_menu') is-invalid @enderror" value="{{ old('harga_menu', $menu->harga_menu) }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Harga..." required>
                @error('harga_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
                <label for="exampleInputEmail" class="mt-2">Gambar</label>
                <input type=text name="gambar_menu" class="form-control @error('gambar_menu') is-invalid @enderror" value="{{ old('gambar_menu', $menu->gambar_menu) }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Gambar..." required>
                @error('gambar_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                {{-- <label for="exampleFormControlFile" class="mt-2">Tambah Gambar</label>
                <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile" required> --}}
                
                <label for="exampleFormControlSelect" class="mt-2">Deskripsi</label>
                <textarea name="desc_menu" id="" cols="30" rows="10" class="form-control @error('desc_menu') is-invalid @enderror" placeholder="Deskripsi Menu..." required>{{ old('desc_menu', $menu->desc_menu) }}</textarea>
                @error('desc_menu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="exampleFormControlSelect" class="mt-2">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="exampleFormControlSelect" name="status" required>
                    <option selected>{{ old('status', $menu->status) }}</option>
                    <option value="Tersedia" >Tersedia</option>
                    <option value="Kosong" >Kosong</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" name="submit" class="btn btn-success text-light mt-5"><i class="bi bi-plus"></i> Tambah</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

@endsection