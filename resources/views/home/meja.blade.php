@extends('home.mainhome')
    
@section('content')
<main id="main">

<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table mt-5">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <p>Book <span>Your Stay</span> With Us</p>
      </div>

      <div class="row g-0">

        <div class="col-lg-6 reservation-img" data-aos="zoom-out" data-aos-delay="200">
            <div class="col-lg-4 menu-item" style=" 
                padding: 25%; 
                width: 75%; 
                height: 75%; 
                background-image: url('../storage/{{$meja->gambar_meja}}'); 
                background-attachment: local ; b
                background-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: center">
            </div><!-- Menu Item -->
        </div>

        <div class="col-lg-6">
            {{-- <form action="/menu" method="GET" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"> --}}
            <div class="row gy-4 form-group">
              {{-- <div class="col-lg-4 col-md-6">
                <input type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div> --}}
              <form action="/menu/{{$meja->id}}" method="POST">
                @csrf
                @method('PUT')
              <div class="col-lg-12">
                <label for="">Hari</label>
                <select class="form-control mt-2 @error('nama_hari') is-invalid @enderror" data-rule="minlen:4" data-msg="Please enter at least 4 chars" name="nama_hari" placeholder="# of people"
                  style="
                        border: 1px solid #ced4da;
                        border-radius:0px;
                        width:100%;
                        background-color:white;
                        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;"> 
                  <option selected>--Choose--</option>
                  @foreach ($hari as $haris)
                    <option value="{{ $haris ->nama_hari }}" {{ old('nama_hari') == $haris->nama_hari ? 'selected' : null }} >{{ $haris->nama_hari }}</option>
                  @endforeach
                </select>
                <div class="validate"></div>
              </div>

              <div class="col-lg-12 mt-3">
                <label for="">Jam</label>
                <select class="form-control mt-2 @error('jam') is-invalid @enderror" data-rule="minlen:4" data-msg="Please enter at least 4 chars" name="jam" placeholder="# of people"
                  style="
                        border: 1px solid #ced4da;
                        border-radius:0px;
                        width:100%;
                        background-color:white;
                        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;"> 
                  <option selected>--Choose--</option>
                  @foreach ($jam as $jams)
                    <option value="{{ $jams->jam }}" {{ old('jam') == $jams->jam? 'selected' : null }} >{{ $jams->jam }}</option>
                  @endforeach
                </select>
                <div class="validate"></div>
            </div>
                <div class="text-center mt-5">             
                    <button type="submit" class="btn btn-danger fs-5 fw-bolder">Book Now</button>              
                    {{-- <a href="/menu/{{ $meja->id }}/{{$haris->nama_hari}}/{{$jams->jam}}" class="btn btn-danger">Book Now</a> --}}
                </div>
            </form>
            </div>
            </div>
        </div><!-- End Reservation Form -->
      </div>
    </div>
  </section><!-- End Book A Table Section -->

{{-- <table id="example1" class="table table-bordered table-striped col-3 mt-5 pt-5">
    <thead class="mt-5">
        <tr>
            <th >No</th>
            <th colspan="12">Jam</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($hari as $item)
        <tr>
            
                <td>{{ $item->nama_hari }}</td>
                @foreach ($jam as $item1)
                    <td><a href="{{ url('tambah/'.$item->id.'/'.$item1->id ) }}">{{ $item1->jam }}</a></td>
                @endforeach
            
        </tr>
        @endforeach
    </tbody>
</table> --}}
@endsection
