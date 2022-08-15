@extends('home.mainhome')
    
@section('content')

<section id="menu" class="menu">
  <div class="container mt-5" data-aos="fade-up">
    <div class="section-header">
      <p>Reservation</p>
    </div>
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    </ul>
    <div class="card-body">
      <table id="example1" class="table table-bordered">
          <thead>
              <tr>
                  <th >ID Reservasi</th>
                  <th >Tanggal Pesan</th>
                  <th >Status</th>
                  <th >Aksi</th>
              </tr>
          </thead>

          <tbody>
              {{-- @foreach ($menu as $item) --}}
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center">
                      <a class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg" type="button"  href="#"><i class="fas fa-eye"></i></a>
                      <a class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg" type="button"  href="#"><i class="fas fa-calendar-alt"></i></a>
                      <a class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModalupdate" type="button"  href="#"><i class="fas fa-edit"></i></a>
                      <form action="/reservasi" method="POST" onsubmit="return confirm('Hapus Data Menu?')" class="d-inline">
                          {{-- @method('delete')
                          @csrf --}}
                          <button class="btn btn-danger text-light">
                              <i class="fas fa-trash"></i>
                          </button>
                      </form> 
                  </td>
              </tr>
              {{-- <!-- Modal Show Data -->
              <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Lihat Data Menu</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Nama Menu</label>
                              <input type="text" name="nama" class="form-control" value="" readonly>
                          </div>
                          <div class="form-group">
                              <label>Kategori</label>
                              <select class="form-control" name="kategori" readonly>
                                  <option selected></option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Harga</label>
                              <input type="text" name="harga" class="form-control" value="harga_menu}}" readonly> 
                          </div>
                          <div class="form-group">
                              <label>Gambar</label>
                              <img class="image-preview img-fluid d-block" alt="" style="width: 100x; height:100px">      
                          </div>
                          <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea type="text" name="deskripsi" class="form-control" readonly></textarea>
                          </div>
                          <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name="status" readonly>
                                  <option selected></option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                      </div>
                  </div>
                  </div>
              </div>
              <!-- /Modal Show Data --> --}}

              {{-- <!-- Modal Update Data -->
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
              <!-- /Modal Update Data -->    --}}
              {{-- @endforeach --}}
          </tbody>
          <tfoot>
              <tr>
                <th >ID Reservasi</th>
                <th >Tanggal Pesan</th>
                <th >Status</th>
                <th >Aksi</th>
              </tr>
          </tfoot>
      </table>
      {{-- <a class="btn btn-primary text-light mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalcreate" type="button"  href="#">Tambah</a> --}}
      </div>
  </div>
</section><!-- End Menu Section -->
@endsection
