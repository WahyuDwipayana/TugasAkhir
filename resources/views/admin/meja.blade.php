@extends('admin.maindashboard')

@section('title', 'Meja')
    
@section('header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Meja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/dashboard/meja">Meja</a></li>
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
                        <h3 class="card-title"><i class="nav-icon fas fa-tag"></i> Data Meja</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >No Meja</th>
                                <th >Gambar Meja</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($meja as $item)
                            <tr>
                                <td>{{ $loop-> iteration}}</td>
                                <td>{{ $item-> no_meja }}</td>
                                <td> <img src="{{ asset('storage/'.$item->gambar_meja) }}" alt="" style="width: 40x; height:40px"></td>
                                <td class="text-center">
                                    <a class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg{{$item->id}}" type="button"  href="#"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModalupdate{{$item->id}}" type="button"  href="#"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/meja/{{$item->id}}" method="POST" onsubmit="return confirm('Hapus Data Menu?')" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger text-light">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>

                            <!-- Modal Show Data -->
                            <div class="modal fade" id="exampleModalLg{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Data Meja</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Meja</label>
                                            <input type="text" name="nama" class="form-control" value="{{$item->no_meja}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <img class="image-preview img-fluid d-block" src="{{asset('storage/'.$item->gambar_meja)}}" alt="" style="width: 100x; height:100px">      
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
                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Meja</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/dashboard/meja/{{$item->id}}" method="post" enctype="multipart/form-data">
                                            @method('patch')
                                            @csrf

                                            <div class="form-group">
                                                <input name="no_meja"type=text class="form-control @error('no_meja') is-invalid @enderror"  value="{{ old('no_meja',$item->no_meja) }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Menu..." autofocus>
                                                @error('no_meja')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="image" class="mt-2">Ubah Gambar</label>
                                                <img class="image-preview img-fluid d-block" src="{{asset('storage/'.$item->gambar_meja)}}" alt="" style="width: 100x; height:100px"><br>
                                                <input type="hidden" name="oldImage" value="{{ $item->gambar_meja }}" id="">  
                                                <input type="file" name="gambar_meja" class="form-control-file @error('gambar_meja') is-invalid @enderror"  id="image" >
                                                @error('gambar_meja')
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
                                <th >No</th>
                                <th >No Meja</th>
                                <th >Waktu</th>
                                <th >Aksi</th>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/dashboard/meja" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Nama Meja</label>
                                        <input name="no_meja"type=text class="form-control @error('no_meja') is-invalid @enderror"  value="{{ old('no_meja') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Meja..." autofocus>
                                        @error('no_meja')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="mt-2">Tambah Gambar</label>
                                        <img class="image-preview img-fluid" alt=""><br>  
                                        <input type="file" name="gambar_meja" class="form-control-file @error('gambar_meja') is-invalid @enderror"  id="image" onchange="previewImage()">
                                        @error('gambar_meja')
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