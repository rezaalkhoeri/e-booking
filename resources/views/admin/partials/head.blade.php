<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Stisla Laravel') &mdash; PDSI Seat Reservation</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<link rel="stylesheet" href="{{ asset('admin/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('admin/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">


<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

<div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        @if (Session::get('user_access'))
            <li class="nav-item @if (\Request::is('home')) active @endif"><a href="{{ route('home') }}"
                    class="nav-link">Beranda</a></li>
        @endif
        @if (Session::has('user_access'))
            <li class="nav-item @if (\Request::is('sign-out')) active @endif"><a href="{{ route('sign-out') }}"
                    class="nav-link"><i class="fas fa-sign-out-alt"></i></a></li>
        @else
            <li class="nav-item @if (\Request::is('login-page')) active @endif"><a href="{{ route('login-page') }}"
                    class="nav-link">Login</a></li>
        @endif
    </ul>
</div>
