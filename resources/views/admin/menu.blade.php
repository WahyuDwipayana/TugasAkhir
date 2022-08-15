@extends('admin.maindashboard')

@section('title', 'Menu')

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
                        <h3 class="card-title"><i class="nav-icon fas fa-pizza-slice"></i> Data Menu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >Nama Menu</th>
                                <th >Kategori</th>
                                <th >Gambar</th>
                                <th >Harga</th>
                                <th >Status</th>
                                <th >Dibuat</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menu as $item)
                            <tr>
                                <td>{{ $loop-> iteration }}</td>
                                <td>{{ $item-> nama_menu}}</td>
                                <td>{{ $item-> categories-> nama_kategori }}</td>
                                <td> <img src="{{ asset('storage/'.$item->gambar_menu) }}" alt="" style="width: 40x; height:40px"></td>
                                <td> Rp. {{number_format($item-> harga_menu)}}</td>
                                <td>{{ $item-> status }}</td>
                                <td>{{ $item-> created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg{{$item->id}}" type="button"  href="#"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModalupdate{{$item->id}}" type="button"  href="#"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/menu/{{$item->id}}" method="POST" onsubmit="return confirm('Hapus Data Menu?')" class="d-inline">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Data Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input type="text" name="nama" class="form-control" value="{{$item->nama_menu}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" readonly>
                                                <option selected>{{$item-> categories-> nama_kategori}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" name="harga" class="form-control" value="{{$item->harga_menu}}" readonly> 
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <img class="image-preview img-fluid d-block" src="{{asset('storage/'.$item->gambar_menu)}}" alt="" style="width: 100x; height:100px">      
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea type="text" name="deskripsi" class="form-control" readonly>{{$item->desc_menu}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" readonly>
                                                <option selected>{{$item->status}}</option>
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
                            <div class="modal fade" id="exampleModalupdate{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Menu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/dashboard/menu/{{$item->id}}" method="post" enctype="multipart/form-data">
                                            @method('patch')
                                            @csrf

                                            <div class="form-group">
                                                <input name="nama_menu"type=text class="form-control @error('nama_menu') is-invalid @enderror"  value="{{ old('nama_menu',$item->nama_menu) }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Menu..." autofocus>
                                                @error('nama_menu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect">Pilih Kategori</label>
                                                <select class="form-select @error('id_kategori') is-invalid @enderror" id="exampleFormControlSelect" aria-label="Default select example" name="id_kategori" placeholder="Pilih...">
                                                    @foreach ($category as $item1)
                                                        <option value="{{ $item1->id }}">{{ $item1->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail" class="mt-2">Harga</label>
                                                <input type=number name="harga_menu" class="form-control @error('harga_menu') is-invalid @enderror"  value="{{ old('harga_menu', $item->harga_menu) }}"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Harga...">
                                                @error('harga_menu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="image" class="mt-2">Ubah Gambar</label>
                                                <img class="image-preview img-fluid d-block" src="{{asset('storage/'.$item->gambar_menu)}}" alt="" style="width: 100x; height:100px"><br>
                                                <input type="hidden" name="oldImage" value="{{ $item->gambar_menu }}" id="">  
                                                <input type="file" name="gambar_menu" class="form-control-file @error('gambar_menu') is-invalid @enderror"  id="image" >
                                                @error('gambar_menu')
                                                    <div class="invalid-feedback">  
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail" class="mt-2">Deskripsi</label>
                                                <textarea name="desc_menu" id="" cols="30" rows="10" class="form-control @error('desc_menu') is-invalid @enderror"  placeholder="Deskripsi Menu...">{{ old('desc_menu',$item->desc_menu) }}</textarea>
                                                @error('desc_menu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect" class="mt-2">Status</label>
                                                <select class="form-select @error('status') is-invalid @enderror"  value="{{ old('status') }}" id="image" name="status">
                                                    <option selected>{{ old('status',$item->status) }}</option>
                                                    <option value="Tersedia">Tersedia</option>
                                                    <option value="Kosong">Kosong</option>
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
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th >No</th>
                                <th >Nama Menu</th>
                                <th >Kategori</th>
                                <th >Gambar</th>
                                <th >Harga</th>
                                <th >Status</th>
                                <th >Dibuat</th>
                                <th >Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a class="btn btn-primary text-light mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalcreate" type="button"  href="#">Tambah</a>
                    </div>
                    <!-- Modal Create Data -->
                    <div class="modal fade" id="exampleModalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/dashboard/menu" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Nama Menu</label>
                                        <input name="nama_menu"type=text class="form-control @error('nama_menu') is-invalid @enderror"  value="{{ old('nama_menu') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Menu..." autofocus>
                                        @error('nama_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                        {{-- <div class="form-group">
                                            <label for="time" class="mt-2">Jam</label>
                                            <input name="nama_menu"type=time class="form-control @error('nama_menu') is-invalid @enderror"  value="{{ old('nama_menu') }}" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Nama Menu..." autofocus>
                                            @error('nama_menu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect">Pilih Kategori</label>
                                        <select class="form-select @error('id_kategori') is-invalid @enderror"  id="exampleFormControlSelect" aria-label="Default select example" name="id_kategori" placeholder="Pilih...">
                                            <option selected></option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Harga</label>
                                        <input type=number name="harga_menu" class="form-control @error('harga_menu') is-invalid @enderror"  value="{{ old('harga_menu') }}"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Harga...">
                                        @error('harga_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="mt-2">Tambah Gambar</label>
                                        <img class="image-preview img-fluid" alt=""><br>  
                                        <input type="file" name="gambar_menu" class="form-control-file @error('gambar_menu') is-invalid @enderror"  id="image" onchange="previewImage()">
                                        @error('gambar_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail" class="mt-2">Deskripsi</label>
                                        <textarea name="desc_menu" id="" cols="30" rows="10" class="form-control @error('desc_menu') is-invalid @enderror"  placeholder="Deskripsi Menu...">{{ old('desc_menu') }}</textarea>
                                        @error('desc_menu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect" class="mt-2">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror"  id="exampleFormControlSelect" name="status">
                                            <option selected></option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Kosong">Kosong</option>
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
                                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Create Data -->                    
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
    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvenet){
                imgPreview.src = oFREvenet.target.result;
            }
        }
    </script>
@endsection