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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>
          @endif
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>150</h3>
  
                  <p>Meja</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-pricetag"></i>
                </div>
                <a href="/dashboard/meja" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>53</h3>
  
                  <p>Menu</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pizza"></i>
                </div>
                <a href="/dashboard/menu" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>44</h3>
  
                  <p>Reservasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
    </section>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fas fa-edit"></i> Reservasi Masuk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                        <td>$320,800</td>
                        <td>123.jpg</td>
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
                            <th >Aksi</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
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