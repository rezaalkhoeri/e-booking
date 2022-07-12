@extends('layouts.default')
@section('content')

<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 d-flex">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4" align="center">Login</h3>
                    <div id="form-message-warning" align="center" class="mb-4"></div>
                    <div id="form-message-success" align="center" class="mb-4">
                        E-Service Pertamina Drilling Services Indonesia
                    </div>
                    <div id="login-admin" class="contactForm">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label" for="name">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="loginButton" class="btn btn-primary"> Login </button>
                                &nbsp;
                                <button type="button" id="kembaliButton" class="btn btn-success"> Kembali </button>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div id="login-pekerja" class="contactForm">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label" for="name">Nomor Pekerja</label>
                                    <input type="text" class="form-control" name="nopek" id="nopek" placeholder="Nomor Pekerja">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="loginPekerjaButton" class="btn btn-primary"> Login </button>
                                &nbsp;
                                <button type="button" id="kembaliButton" class="btn btn-success"> Kembali </button>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div id="login-index" style="margin-top:50px;margin-bottom:150px">
                        <div class="row">
                            <div class="col-md-6" align="right">
                                <button type="button" id="btnDirectAdmin" class="btn btn-primary"> Login sebagai Admin / Atasan Pekerja</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" id="btnDirectPekerja" class="btn btn-success"> Login sebagai Pekerja </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $("#login-admin").hide();
        $("#login-pekerja").hide();

        $(document).on('click', '#loginButton', function(e) {
            loginAdmin();
        })

        $(document).on('keyup', '#password', function(e) {
            if (event.keyCode === 13) {
                loginAdmin();
            }
        })

        $(document).on('click', '#loginPekerjaButton', function(e) {
            loginPekerja();
        })

        $(document).on('keyup', '#nopek', function(e) {
            if (event.keyCode === 13) {
                loginPekerja();
            }
        })

        $(document).on('click', '#btnDirectAdmin', function(e) {
            $("#login-admin").show();
            $("#login-pekerja").hide();
            $("#login-index").hide();
        })

        $(document).on('click', '#btnDirectPekerja', function(e) {
            $("#login-admin").hide();
            $("#login-pekerja").show();
            $("#login-index").hide();
        })

        $(document).on('click', '#kembaliButton', function(e) {
            $("#login-admin").hide();
            $("#login-pekerja").hide();
            $("#login-index").show();
        })

        function loginAdmin() {
            var email = $('#email').val()
            var password = $('#password').val()

            var data = {}
            data.email = email;
            data.password = password;

            route = "{{route('auth-login')}}";

            $.ajax({
                url: route,
                type: "POST",
                data: "datanya=" + JSON.stringify(data),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {
                    if (data.status == 'success') {
                        swal.fire("Success!", data.message, data.alert)
                            .then(function() {
                                if (data.role == "Administrator") {
                                    location.href = "{{route('admin-index')}}"
                                } else {
                                    location.href = "{{route('my-account')}}"
                                }
                                
                            });
                    } else {
                        swal.fire("Warning!", data.message, data.alert);
                    }
                },
                error: function(data) {
                    swal.fire("Error!", "Login failed!", "error");
                }
            });
        }

        function loginPekerja() {
            var nopek = $('#nopek').val();

            var data = {}
            data.nopek = nopek;

            route = "{{route('auth-login-pekerja')}}";

            $.ajax({
                url: route,
                type: "POST",
                data: "datanya=" + JSON.stringify(data),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {
                    if (data.status == 'success') {
                        swal.fire("Success!", data.message, data.alert)
                            .then(function() {
                                location.href = "{{route('my-account')}}"
                            });
                    } else {
                        swal.fire("Warning!", data.message, data.alert);
                    }
                },
                error: function(data) {
                    swal.fire("Error!", "Login failed!", "error");
                }
            });
        }
    });
</script>
@endsection
@endsection