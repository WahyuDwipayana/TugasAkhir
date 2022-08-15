@extends('home.mainhome')
    
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center section-bg">
  <div class="container">
    <div class="row justify-content-between gy-5">
      <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
        <h2 data-aos="fade-up">Welcome To<br>Temusapa</h2>
        <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="#meja" class="btn btn-danger fw-bolder fs-5">Book Now</a>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
        <img src="{{ url('landing/assets/img/hero-img.png') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
      </div>
    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Our Menu</h2>
      <p>Check Our <span> Menu</span></p>
    </div>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
      <div class="tab-pane fade active show" id="menu-starters">
        <div class="tab-header text-center">
        <div class="row gy-5">              
            @foreach ($menu as $item1)      
              <div class="col-lg-4 menu-item">
                <div class="background">
                  <a href="{{ asset('storage/'.$item1->gambar_menu) }}" class="glightbox"><img src="{{ asset('storage/'.$item1->gambar_menu) }}" class="menu-img img-fluid" alt=""></a>
                </div>
                <h4>{{ $item1-> nama_menu}}</h4>
                <p class="ingredients">
                  {{ $item1-> desc_menu }}
                </p>
                <p class="price">
                  Rp. {{number_format($item1-> harga_menu)}}
                </p>
              </div><!-- Menu Item -->
            @endforeach
        </div>
        </div>
      </div>
  </div>
</section><!-- End Menu Section -->  

<!-- ======= Menu Section ======= -->
<section id="meja" class="menu mt-5">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
        <p>Our <span> Table</span></p>
    </div>
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    </ul>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

    <div class="tab-pane fade active show" id="menu-starters1">
      <div class="tab-header text-center">
        <div class="row gy-5">
          @foreach ($meja as $item)              
          <div class="col-lg-4 menu-item">
            <a href="{{ asset('storage/'.$item->gambar_meja) }}" class="glightbox"><img src="{{ asset('storage/'.$item->gambar_meja) }}" class="menu-img img-fluid" alt=""></a>
            <a href="/meja/{{$item->id}}" class="btn btn-danger fw-bolder fs-5">Book Now</a>
          </div><!-- Menu Item -->
          @endforeach
        </div>
    </div>
  </div>

</section><!-- End Menu Section --> 
@endsection
