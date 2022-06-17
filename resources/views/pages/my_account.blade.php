@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('vendor/myticket_list.css') }}">

<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Riwayat Booking</h3>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-box">
                                    <div class="widget-header bordered-bottom bordered-themesecondary">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <h5 class="widget-caption themesecondary">Ticket List</h5>
                                    </div>
                                    <!--Widget Header-->
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="tickets-container">
                                                <ul class="tickets-list">
                                                    @foreach($getBooking as $row)
                                                    <li class="ticket-item">
                                                        <div class="row">
                                                            <div class="ticket-user col-md-6 col-sm-12">
                                                                <div class="avatar">
                                                                    <div class="avatar__letters">
                                                                        {{$row->kodeKursi}}
                                                                    </div>
                                                                </div>
                                                                <span class="user-name">{{$row->nama}}</span>
                                                                <span class="user-at">at</span>
                                                                <span class="user-company">{{$row->fungsi}}</span>
                                                            </div>
                                                            <div class="ticket-time  col-md-4 col-sm-6 col-xs-12">
                                                                <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                <i class="fa fa-clock-o"></i>
                                                                <span class="time">{{$row->tglPemakaian}}</span>
                                                            </div>
                                                            @if($row->status == 1)
                                                            <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                                                <span class="divider hidden-xs"></span>
                                                                <span class="type"> Confirmed </span>
                                                            </div>
                                                            <div class="ticket-state bg-palegreen">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            @elseif($row->status == 0)
                                                            <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                                                <span class="divider hidden-xs"></span>
                                                                <span class="type"> Unconfirmed </span>
                                                            </div>
                                                            <div class="ticket-state bg-warning">
                                                                <i class="fa fa-exclamation-triangle"></i>
                                                            </div>
                                                            @else
                                                            <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                                                <span class="divider hidden-xs"></span>
                                                                <span class="type"> Expired </span>
                                                            </div>
                                                            <div class="ticket-state bg-danger">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                    @php
                    $user = Session::get('user_access');
                    @endphp
                    <h3>{{Session::get('user_access')['user_nama']}}</h3>
                    <p class="mb-4">{{Session::get('user_access')['user_id']}}</p>
                    <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-id-card"></span>
                        </div>
                        <div class="text pl-3">
                            <p><span>Nomor Pekerja :</span> <a href="#"> {{Session::get('user_access')['user_nopek']}}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-envelope "></span>
                        </div>
                        <div class="text pl-3">
                            <p><span>Email :</span> <a href="#">{{Session::get('user_access')['email']}}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-id-badge"></span>
                        </div>
                        <div class="text pl-3">
                            <p><span>Fungsi :</span> <a href="#">{{Session::get('user_access')['fungsi']}}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <div class="text pl-3">
                            <p><span>Jabatan :</span> <a href="#">{{Session::get('user_access')['user_jabatan']}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
@endsection