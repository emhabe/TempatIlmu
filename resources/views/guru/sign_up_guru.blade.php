<!--
=========================================================
* Soft UI Dashboard - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/home.png">
  <title>
    Ruang Belajar
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="">
              Ruang Belajar
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="/index">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="/about">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    About
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                  <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-tabs nav-fill p-1" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link  mb-0 px-0 py-1 " href="/sign_up_siswa" role="tab" aria-controls="Siswa" aria-selected="false">
                          Siswa
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active mb-0 px-0 py-1" href="/sign_up_guru" role="tab" aria-controls="Guru" aria-selected="false">
                          Guru
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  mb-0 px-0 py-1" href="/sign_up_admin" role="tab" aria-controls="Admin" aria-selected="true">
                          Admin
                        </a>
                      </li>
                    </ul>
                  </div>
                  <h6>Silahkan Daftar Sebagai Guru</h6>
                </div>
                <div class="card-body">
                  <form action="/sign_up_prosesguru" method="post">
                    @csrf
                    <label>NIP</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="NIP" name="nip" id="nip">
                    </div>
                    <label>Id Sekolah</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Id Sekolah" name="id_sekolah">
                    </div>
                    <label>Nama</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Nama" name="name">
                    </div>
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" name="email">

                    </div>
                    <label>Jenis Kelamin</label>
                    <div>

                      <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki">
                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                      </div>

                    </div>
                    <div><label>Kelas</label></div>
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($data['kelas'] as $kls)
                        <button class="nav-link <?php if ($kls->id == 1) {
                                                  echo 'active';
                                                } ?>" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home{{$kls->id}} " type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$kls->nama}}</button>
                        @endforeach

                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      @foreach($data['kelas'] as $kls)
                      <div class="tab-pane fade <?php if ($kls->id == 1) {
                                                  echo 'show active';
                                                } ?>" id="nav-home{{$kls->id}}" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="{{$kls->id}}">
                        @foreach($data['jurusan'] as $jurusan)

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="jurusan{{$kls->id}}[]" id="jurusan" value="{{$jurusan->id}}">
                          <label class="form-check-label" for="{{$jurusan->nama}}">{{$jurusan->nama}}</label>
                        </div>
                        @endforeach
                      </div>
                      @endforeach
                    </div>

                    <!-- <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                  @foreach($data['jurusan'] as $jurusan)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jurusan[]" id="jurusan" value="{{$jurusan->nama}}">
                    <label class="form-check-label" for="{{$jurusan->nama}}">{{$jurusan->nama}}</label>
                  </div>
                  @endforeach
                </div>
              </div> --}}
              {{-- @endforeach --}} -->






                    <div class="mb-3">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password" id="myInput">
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" onclick="myFunction()">Show Password
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Alredy have an account?
                    <a href="/sign_in_guru" class="text-info text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-7 h-100 d-md-block d-none me-n8" style="margin-left:20;">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/theme/background2.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright ©
            <script>
              document.write(new Date().getFullYear())
            </script> Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>

</html>