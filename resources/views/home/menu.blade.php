@extends('home.mainhome')

@section('content')
<main id="main">

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container mt-5" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span> Menu</span></p>
      </div>
      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
      </ul>
      {{-- <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
        <div class="tab-pane fade active show" id="menu-starters">
          <div class="tab-header text-center">
      <div class="row gy-5">
        <div class="col-md-3">
          <div class="thumbnail">
            @foreach ($menu as $item)   
            <a href="{{ asset('storage/'.$item->gambar_menu) }}" class="glightbox"><img src="{{ asset('storage/'.$item->gambar_menu) }}" class="menu-img img-fluid" style="width: 160px; height: 160px;" alt=""></a>
            <div class="caption">
              <h4>{{ $item-> nama_menu}}</h4>
              <p class="ingredients">
                {{ $item-> desc_menu }}
              </p>
              <p class="price">
                Rp. {{number_format($item-> harga_menu)}}
              </p>
              <a href="/detail/{{$item->id}}" class="btn btn-danger">Add</a>
            </div>
            @endforeach
          </div>
        </div>
      </div> --}}

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
        <div class="tab-pane fade active show" id="menu-starters">
          <div class="tab-header text-center">
          <div class="row gy-5">   
            @foreach ($menu as $item)              
            <div class="col-lg-4 menu-item">
              <a href="{{ asset('storage/'.$item->gambar_menu) }}" class="glightbox"><img src="{{ asset('storage/'.$item->gambar_menu) }}" class="menu-img img-fluid" alt=""></a>
              <h4>{{ $item-> nama_menu}}</h4>
              <p class="ingredients mt-1">
                {{ $item-> desc_menu }}
              </p>
              <p class="price mt-1">
                Rp. {{number_format($item-> harga_menu)}}
              </p>
              <a data-bs-toggle="modal" data-bs-target="#exampleModalcreate" type="button"  href="#" class="btn btn-danger fs-6 fw-bolder mt-1">Add</a>
            </div><!-- Menu Item -->
            @endforeach
          </div>
          <br>
          <a href="/detail" class="btn btn-danger mt-5 fs-3 fw-bolder">CONFIRM</a>
          </div>
        </div>
          </div>
      </div>
    </div>
    <!-- Modal Create Data -->
    <div class="modal fade" id="exampleModalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pesan Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="/menu" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail" class="mt-2">Total Menu Dipesan</label>
                      <input type=number name="total" class="form-control @error('total') is-invalid @enderror"  value="{{ old('total') }}"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Total...">
                      @error('total')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger fs-6 fw-bolder" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="submit" class="btn btn-primary fs-6 fw-bolder">Tambah</button>
              </div>
          </form>
          </div>
      </div>
  </div>
    <!-- /Modal Create Data -->   
  </section><!-- End Menu Section -->  
@endsection