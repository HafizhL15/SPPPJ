<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.0.0-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
</head>
<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark main-bg">
        <div class="container-fluid fs-2 me-2">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse fw-bolder" id="navbarSupportedContent">
            <a class="navbar-brand me-auto fw-bold" href="/">Raka Computer</a>
            <ul class="navbar-nav me-auto mb-1 mb-lg-0 fw-bold" style="color: black; font-size:17px;">
              <li class="nav-item me-3">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item me-3">
                <a class="nav-link active" href="/produk-list">Produk</a>
              </li>
              
              <li class="nav-item me-3">
                <a class="nav-link active" href="/booking-service">Service</a>
              </li>
              
              @guest
              <li class="nav-item me-3 dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Lainnya
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/kuesioner">Kuesioner</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/rekrutmen">Rekrutmen</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/feedback">Kritik & Saran</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/helpdesk">Bantuan</a></li>
                </ul>
              </li>    
              @endguest


              @if (Auth::check() && Auth::user()->role_id === 3)
              <li class="nav-item me-3 dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Lainnya
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/kuesioner">Kuesioner</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/rekrutmen">Rekrutmen</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/feedback">Kritik & Saran</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/helpdesk">Bantuan</a></li>
                </ul>
              </li>
              @elseif(Auth::check() && (Auth::user()->role_id === 2 || Auth::user()->role_id === 1))
                @if (Auth::check() && Auth::user()->role_id === 1)
                <li class="nav-item me-4">
                    <a class="nav-link active" href="/dashboard">Admin</a>
                </li>
                @elseif(Auth::check() && Auth::user()->role_id === 2)
                <li class="nav-item me-4">
                  <a class="nav-link active" href="/dashboard">Dashboard</a>
                </li> 
                @endif
              @endif
              
              @if (Auth::check())

              @if (Auth::check() && Auth::user()->role_id === 3)
              <li class="nav-item me-3 dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->fullname }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                  <li><a class="dropdown-item" href="/riwayat-pesanan">Riwayat Pemesanan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/riwayat-service">Riwayat Service</a></li>
                  <li><hr class="dropdown-divider"></li>
                  
                  <li><a class="dropdown-item" href="/profile">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="nav-item me-4">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
                </ul>
              </li>
              @endif
                  
              @else
                  <li class="nav-item me-4">
                      <a class="nav-link active" href="{{ route('login') }}">Login       <i class="bi bi-person-circle"></i></a>
                  </li>
              @endif
              @if (Auth::check() && Auth::user()->role_id === 3)
              <li class="nav-item me-3">
                  <a class="nav-link" href="{{ url('checkout') }}">
                  <i class="bi bi-cart4" style="font-size:19px; "></i>
                  </a>
              </li>
              @endif
              

              @if (Auth::check() && Auth::user()->role_id !== 3)
              <li class="nav-item me-4">
                <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @endif
              
            </ul>
            <form class="d-flex" action="/search" method="GET" style="justify-content: center">
              <input class="form-control me-2 rounded-pill fw-bold" name="search" type="search" placeholder="Cari Produk" aria-label="Search">
              <button class="btn btn-success fw-bold text-white" type="submit">Cari</button>
            </form>
          </div>
        </div>
    </nav>

    @yield('content')

    <!-- footer 1 -->

    <div class="blockcode footer-content text-white">
      <div class="header text-white"></div>
      <footer class="page-footer shadow">
        <div class="d-flex flex-column mx-auto py-5" style="width: 80%">
          <div class="d-flex flex-wrap justify-content-between">
            <div>
              <a class="d-flex align-items-center p-0 text-white">
                <!-- <img alt="logo" src="../img/logo.png" width="30px" /> -->
                <h5 class="md-3 fw-bold" style="text-decoration:none">Tentang Kami</h5>
              </a>
              <p class="my-3" style="width: 250px; text-align:justify">
                Kami adalah pilihan terbaik Anda untuk kebutuhan teknologi. Sebagai toko komputer yang berdedikasi, kami tidak hanya menawarkan produk-produk terkini dan berkualitas tinggi, tetapi juga menyediakan layanan jasa teknis yang unggul.
              </p>
              
            </div>
            <div >
              <p class="h5 mb-4" style="font-weight: 600">Bantuan</p>
              <ul class="p-0 fw-bold" style="list-style: none; cursor: pointer;">
                <a class="text-white" style="text-decoration:none" href="/helpdesk">Helpdesk</a><br><br>
                <a class="text-white" style="text-decoration:none" href="/login">Login</a><br><br>
                <a class="text-white" style="text-decoration:none" href="/register">Register</a>
              </ul>
            </div>
            <div>
              <p class="h5 mb-4" style="font-weight: 600">Contact</p>
              <ul class="p-0 fw-bold" >
                <a class="text-white" style="text-decoration:none">Nomor</a><br>
                <a class="text-white" style="text-decoration:none">+6285269755652</a><br><br>
                <a class="text-white" style="text-decoration:none">Email</a><br>
                <a class="text-white" style="text-decoration:none">rakakomofficial@gmail.com</a>
              </ul>
            </div>
            <div>
              <p class="h5 mb-4" style="font-weight: 600">Alamat</p>
              <ul class="p-0 fw-bold" style="list-style: none; cursor: pointer">
                <li><a class="text-white" style="text-decoration:none">Jalan KH. Ghalib No. 21 </a><br></li>
                <li><a class="text-white" style="text-decoration:none">Pringsewu Lampung</a></li><br>
                <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.2762854265579!2d104.97651083958263!3d-5.35260994229451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e47325d75591075%3A0x2e3d2ae8267c028a!2sRaka%20Computer!5e0!3m2!1sid!2sid!4v1700238488133!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>
              </ul>
            </div>
            
          </div>
        </div>
      </footer>
    </div>

    <!-- footer 2 -->
    <div class="container-fluid py-5 footer-content text-light">
      <div class="container d-flex justify-content-center">
        <label>&copy; 2023 Raka Computer</label>
        <!-- <label >Created By Anonymous</label> -->
      </div>
    </div>
    <script src="{{ asset('css/bootstrap-5.0.0-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function tampilkanKonten(sumberKonten) {
          var tampilanKonten = document.getElementById('tampilanKonten');
  
          if (sumberKonten.endsWith('.png')) {
              // Jika sumberKonten berakhir dengan '.jpg', tampilkan gambar
              tampilanKonten.innerHTML = '<img src="' + sumberKonten + '" alt="Gambar" />';
          } else {
              // Jika sumberKonten bukan gambar, tampilkan tulisan
              tampilanKonten.innerHTML = '<p>Silahkan Untuk Melakukan Pembayaran Melalui Rekening <strong>Bank BRI Nomor Rekening : 035801076974501</strong> Dengan Nominal : <strong>Rp. ' + sumberKonten + '</strong></p>';
          }
      }
  </script>
    @include('sweetalert::alert')
</body>
</html>