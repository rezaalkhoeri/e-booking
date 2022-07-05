<div class="wrap" style="background-color: #ed1b2f;">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col d-flex align-items-center">
        <p class="mb-0 phone">
          <span class="mailus">T:</span> <a href="#">021 2995 5400 /5300 </a> |
          <span class="mailus">F:</span> <a href="#">021 29563148 </a> |
          <span class="mailus">Website</span> <a href="https://pdsi.pertamina.com/" target="_blank">www.pdsi.pertamina.com</a>
        </p>
      </div>
      <!-- <div class="col d-flex justify-content-end">
        <div class="social-media">
          <p class="mb-0 d-flex">
            {{-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a> --}}
            <a href="https://twitter.com/PolibatamPirung" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
            <a href="https://www.instagram.com/polibatam.pinjamruang" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
            {{-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a> --}}
          </p>
        </div>
      </div> -->
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <img src="{{ asset('vendor/technext/vacation-rental/images/pdsi-hd.png') }}" alt="" width="200">
    <div style="border-left: 3px solid #ed1b2f;height: 70px; margin-right: 10px;"></div>
    <a class="navbar-brand" href="index.html">Booking<span>Ruang</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @if(\Request::is('home')) active @endif"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>
        @if(Session::get('role') == 'Pekerja')
        <li class="nav-item @if(\Request::is('request-wfo')) active @endif"><a href="{{ route('request-wfo') }}" class="nav-link">Request WFO</a></li>
        <li class="nav-item @if(\Request::is('list-approval')) active @endif"><a href="{{ route('list-approval') }}" class="nav-link">Monitoring Approval</a></li>
        @endif
        <li class="nav-item @if(\Request::is('book-seat')) active @endif"><a href="{{ route('book-seat') }}" class="nav-link">Reservasi Kursi</a></li>
        <li class="nav-item @if(\Request::is('book-rooms')) active @endif"><a href="{{ route('book-rooms') }}" class="nav-link">Reservasi R.Meeting</a></li>
        <!-- <li class="nav-item @if(\Request::is('rooms')) active @endif"><a href="{{ route('rooms') }}" class="nav-link">Daftar Ruang Meeting</a></li> -->
        @if(Session::get('role') == 'Pekerja')
        <li class="nav-item @if(\Request::is('history-reservasi')) active @endif"><a href="{{ route('history-reservasi') }}" class="nav-link">History Reservasi</a></li>
        @endif
        @if(Session::has('user_access'))
        <li class="nav-item @if(\Request::is('my-account')) active @endif"><a href="{{ route('my-account') }}" class="nav-link">My Account</a></li>
        <li class="nav-item @if(\Request::is('sign-out')) active @endif"><a href="{{ route('sign-out') }}" class="nav-link"><i class="fa fa-sign-out"></i></a></li>
        @else
        <li class="nav-item @if(\Request::is('login-page')) active @endif"><a href="{{ route('login-page') }}" class="nav-link">Login</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->