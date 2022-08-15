@extends('home.mainhome')
    
@section('content')
<section id="menu" class="menu">
  <div class="container mt-5" data-aos="fade-up">
    <div class="section-header">
      <h2>Check Out</h2>
      <p>Reservation <span>Detail</span></p>
    </div>
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    </ul>
    <div class="row g-5 bck">
      <div class="col-md col-lg-12 form">
        <form class="needs-validation" novalidate action="transaksi.php" method="POST">
          <div class="row">
            <div class="col-12 mb-1 mt-1">
              <label for="nama" class="form-label">Name</label>
              <input type="text" class="form-control" name="nama" id="nama" value="" readonly>
            </div>
            <div class="col-12 mb-1 mt-1">
              <label for="meja" class="form-label">No Meja</label>
              <input type="text" class="form-control" name="meja" id="meja" value="" readonly>
            </div>  
            <div class="col-12 mb-1 mt-1">
              <label for="hari" class="form-label">Hari</label>
              <input type="text" class="form-control" name="hari" id="hari" value="" readonly>
            </div>
            <div class="col-12 mb-1 mt-1">
              <label for="jam" class="form-label">Jam</label>
              <input type="time" class="form-control" name="jam" id="jam" value="" readonly>
            </div>
            <div class="mb-1 mt-2">
              <div id="list_schedule" class="border rounded p-3">
                <div class="col-12 mb-1 mt-1">
                  <label for="menu" class="form-label">Menu</label>
                  <input class="form-control text-center me-3" id="inputQuantity" name="menu" type="text" value="" readonly/>
                </div>    
                <div class="col-12 mb-1 mt-1">
                  <label for="qty" class="form-label">Qty</label>
                  <input class="form-control text-center me-3" id="inputQuantity" name="qty" type="number" value="" style="max-width: 4rem" readonly/>
                </div>    
              </div>
            </div>
            <div class="col-12 mb-1 mt-1">
              <label for="telp" class="form-label">Tgl Pesan</label>
              <input type="date" class="form-control" name="date" id="date" value="">
            </div>      
          </div>
          <div class="d-flex">
            <input type="hidden" name="qty" value="">
            <input type="hidden" name="id" value="">
            <input type="submit" name="buy" value="Buy Now" class="btn btn-danger btn-block text-light tittle">
          </div>
        </form>
      </div> 
    </div>  
  </div>
</section><!-- End Menu Section -->
@endsection
