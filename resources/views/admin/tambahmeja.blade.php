@extends('admin.maindashboard')

@section('title', 'Tambah Data Meja')

@section('content')
<div id="content-wrapper" class="tittle3">

    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item text-light">
                <a href="#">Meja</a>
            </li>
            <li class="breadcrumb-item active">Tambah Meja</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-tag-fill"></i> Tambah Data Meja</div>
            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlSelect">Pilih Waktu</label>
                <select class="form-control" id="exampleFormControlSelect" name="kategori" required>
                    <option value="" selected>Pilih</option>
                    <option ></option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">No Meja</label>
                <input type=text name="nama" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Product Name..." required>
                
                <label for="exampleInputEmail" class="mt-2">Price</label>
                <input type=text name="harga" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Price..." required>
                
                <label for="exampleFormControlFile" class="mt-2">Input File</label>
                <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile" required>
                
                <label for="exampleFormControlSelect" class="mt-2">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi Meja..." required></textarea>
                
                <label for="exampleInputEmail" class="mt-2">Stock</label>
                <input type=text name="stok" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Stock..." required>

                <label for="exampleFormControlSelect" class="mt-2">Status</label>
                <select class="form-control" id="exampleFormControlSelect" name="status" required>
                    <option value="" selected>Choose...</option>
                    <option value="1" >Tersedia</option>
                    <option value="0" >Kosong</option>
                </select>
                <button type="submit" name="submit" class="btn btn-success text-light mt-4"><i class="bi bi-plus"></i> Tambah</button>
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