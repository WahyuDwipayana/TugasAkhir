@extends('admin.maindashboard')

@section('title', 'Hari')
    
@section('header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hari</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/dashboard/hari">Hari</a></li>
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
            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div>
            @endif

            @if (session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div>
            @endif

            @if (session('delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="nav-icon fas fa-calendar-alt"></i> Data Hari</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($haris as $item)
                            <tr>
                                <td>{{ $loop-> iteration}}</td>
                                <td>{{ $item-> nama_hari }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg{{$item->id}}" type="button"  href="#"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModalupdate{{$item->id}}" type="button"  href="#"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/hari/{{$item->id}}" method="POST" onsubmit="return confirm('Hapus Data Menu?')" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger text-light">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                                </td>
                            </tr>
                            <!-- Modal Show Data -->
                            <div class="modal fade" id="exampleModalLg{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Data Hari</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input type="text" name="nama_hari" class="form-control" value="{{$item->nama_hari}}" readonly>
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
                            <div class="modal fade" id="exampleModalupdate{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Hari</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/dashboard/hari/{{$item->id}}" method="post" enctype="multipart/form-data">
                                            @method('patch')
                                            @csrf

                                            <div class="form-group">
                                                <input name="nama_hari"type=text class="form-control @error('nama_hari') is-invalid @enderror"  value="{{ old('nama_hari',$item->nama_hari) }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Hari..." autofocus>
                                                @error('nama_hari')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Update Data -->  
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a class="btn btn-primary text-light mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalcreate" type="button"  href="#">Tambah</a>
                    </div>
                    <!-- /.card-body -->
                    <!-- Modal Create Data -->
                    <div class="modal fade" id="exampleModalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hari</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/dashboard/hari" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Nama Hari</label>
                                        <input name="nama_hari"type=text class="form-control @error('nama_hari') is-invalid @enderror"  value="{{ old('nama_hari') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Tambah Nama Hari..." autofocus>
                                        @error('nama_hari')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Create Data -->   
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