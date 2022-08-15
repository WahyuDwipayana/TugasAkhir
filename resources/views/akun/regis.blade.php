<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Daftar Akun | Temusapa</title>

    <!-- Custom fonts for this template-->
    <link href="auth/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="auth/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      <!-- Nested Row within Card Body -->
                      <div class="row">
                        <div class="col-lg-12 d-none d-lg-block"></div>
                        <div class="col-lg-12">
                          <div class="p-5">
                            <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                            </div>

                            <form class="user" action="/register" method="POST" id="contactDorm">
                                @csrf
                                @if(session()->has('gagal'))
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('gagal') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                  </div>
                                @endif                                     
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail" name="email" placeholder="Email Address" autofocus/>
                                    <div class="invalid-feedback">Format email tidak benar</div>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" id="exampleInputTelepon" name="telepon" placeholder="No Telepon" autofocus/>
                                    <div class="invalid-feedback">No Telepon minimal 10 karakter</div>
                                    
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" value="{{ old('username') }}" id="exampleInputUsername" name="username" placeholder="Email Username" autofocus/>
                                    <div class="invalid-feedback">Username minimal 5 karakter</div>
                                </div>

                                <div class="input-group mb-3">
                                  <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Password">
                                  <div class="input-group-append">
                                    <div class="invalid-feedback">Password minimal 6 karakter</div>
                                    <div class="input-group-text form-control form-control-user bg-light">
                                      <span id="mybutton" onclick="change()" class="input-group bg-transparent">
                                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                              <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                          </svg>
                                      </span>
                                    </div>
                                  </div>
                                </div>

                                <div class="input-group mb-3">
                                  <input type="password" class="form-control form-control-user @error('konfirmasi') is-invalid @enderror" id="exampleInputPassword1" name="konfirmasi" placeholder=" Konfirmasi Password">
                                  <div class="input-group-append">
                                    <div class="input-group-text form-control form-control-user bg-light">
                                      <span id="mybutton1" onclick="change1()" class="input-group bg-transparent">
                                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                              <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                          </svg>
                                        </span>
                                    </div>
                                  </div>
                                </div>

                                <div style="display: none"><input type="text" value="user" name="level"></div>
                                    
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                      <button class="btn btn-primary btn-user btn-block" type="submit">Buat Akun</button>
                                    </div>
                                </div>
                                <hr>
                                <a href="index.html" class="btn btn-danger btn-user btn-block"> <i class="fab fa-google fa-fw"></i> Register with Google </a>
                            </form>

                            <hr />
                            <div class="text-center">
                              <div class="small"><a href="{{ url('login') }}">Punya akun? Login sekarang</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
            var x = document.getElementById('exampleInputPassword').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('exampleInputPassword').type = 'text';
                
                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="3em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            }
            else {

                //ubah form input password menjadi text
                document.getElementById('exampleInputPassword').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="3em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>`;
            }
        }
      </script>

    <script>
        // membuat fungsi change
        function change1() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
            var x = document.getElementById('exampleInputPassword1').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('exampleInputPassword1').type = 'text';
                
                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton1').innerHTML = `<svg width="1em" height="3em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            }
            else {

                //ubah form input password menjadi text
                document.getElementById('exampleInputPassword1').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton1').innerHTML = `<svg width="1em" height="3em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>`;
            }
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="auth/vendor/jquery/jquery.min.js"></script>
    <script src="auth/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="auth/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="auth/js/sb-admin-2.min.js"></script>
  </body>
</html>
















