@extends('layouts.default')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/meet-room 2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Ruangan <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Daftar Ruangan</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            @foreach($getRuangan as $row)
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex">
                    <a href="#" class="img" style="background-image: url('vendor/technext/vacation-rental/images/room.webp');"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">
                            <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                            <p class="mb-0"> {{$row->NamaKlasifikasi}} </p>
                            <h3 class="mb-3"><a href="javascript:void(0)">{{$row->NamaRuangan}}</a></h3>
                            <ul class="list-accomodation">
                                <li><span>Maks:</span> {{$row->Kapasitas}} Orang</li>
                                <li><span>Status: {{ $row->Status === "1" ? "Tersedia" : "Tidak Tersedia" }} </span> </li>
                                <li><span>Lokasi: {{ $row->Lokasi }} </span> </li>
                                <li>{{ $row->Fasilitas }}</li>
                            </ul>
                            <!-- Button trigger modal -->
                            <p class="pt-1"><a href="javascript:void(0)" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2" data-toggle="modal" data-target="#borrowRoomModal" data-room-id="1" data-room-name="ground">Pinjam Ruang Ini <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 80px;">
        {{$getRuangan->links("pagination::bootstrap-4")}}
    </div>
</section>


@section('scripts')

@endsection
@endsection