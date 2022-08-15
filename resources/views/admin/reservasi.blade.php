@extends('admin.maindashboard')

@section('title', 'Reservasi')

@section('header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reservasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/dashboard/reservasi">Reservasi</a></li>
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="nav-icon fas fa-edit"></i> Data Reservasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >No Meja </th>
                                <th >Hari</th>
                                <th >Jam</th>
                                <th >Menu</th>
                                <th >Jumlah Menu</th>
                                <th >Total</th>
                                <th >Bukti Pembayaran</th>
                                <th >Status</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Meja-1</td>
                                <td>Selasa</td>
                                <td>11:00 AM</td>
                                <td>Breakfast</td>
                                <td>2</td>
                                <td>Rp 150,000</td>
                                <td>123.jpg</td>
                                <td class="badge bg-warning" >Belum Terkonfirmasi</td>
                                <td class="text-center">
                                    <a class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg" type="button"  href="#"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModalupdate" type="button"  href="#"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/reservasi" method="POST" onsubmit="return confirm('Hapus Data Menu?')" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger text-light">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th >No</th>
                                <th >No Meja </th>
                                <th >Hari</th>
                                <th >Jam</th>
                                <th >Menu</th>
                                <th >Jumlah Menu</th>
                                <th >Total</th>
                                <th >Bukti Pembayaran</th>
                                <th >Status</th>
                                <th >Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a class="btn btn-primary text-light" type="button" href="{{ url('menu/tambahmenu') }}">Tambah</a>
                    </div>
                    <!-- Modal Show Data -->
                    <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lihat Data Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail" class="mt-2">ID Reservasi</label>
                                    <input name="nama_menu"type=text class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="ID Reservasi..." readonly autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail" class="mt-2">Nama Pelanggan</label>
                                    <input type=number name="harga_menu" class="form-control"   id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Pelanggan..." readonly>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="mt-2">Bukti Transfer</label>
                                    <img class="image-preview img-fluid d-block" alt="" style="width: 100x; height:100px"><br>
                                    <input type="hidden" name="oldImage" value="" id="">  
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect" class="mt-2">Status</label>
                                    <select class="form-select" id="image" name="status" readonly>
                                        <option selected readonly></option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /Modal Show Data -->

                    <!-- Modal Update Data -->
                    <div class="modal fade" id="exampleModalupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Data Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/dashboard/menu/" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">ID Reservasi</label>
                                        <input name="nama_menu"type=text class="form-control @error('nama_menu') is-invalid @enderror"  value="{{ old('nama_menu') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="ID Reservasi..." readonly autofocus>
                                        @error('nama_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Nama Pelanggan</label>
                                        <input type=number name="harga_menu" class="form-control @error('harga_menu') is-invalid @enderror"   id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Pelanggan..." readonly>
                                        @error('harga_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="mt-2">Bukti Transfer</label>
                                        <img class="image-preview img-fluid d-block" alt="" style="width: 100x; height:100px"><br>
                                        <input type="hidden" name="oldImage" value="" id="">  
                                        
                                        @error('gambar_menu')
                                            <div class="invalid-feedback">  
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect" class="mt-2">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="image" name="status">
                                            <option selected></option>
                                            <option value="Tersedia">Konfirmasi</option>
                                            <option value="Kosong">Belum Terkonfirmasi</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Update Data -->   
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
          
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection