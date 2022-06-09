@extends('layouts.default')
@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('vendor/technext/vacation-rental/images/rig.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <h2 class="subheading">Selamat datang di E-Service Center</h2>
        <h1 class="mb-4">Booking ruangan Pertamina Drilling Services Indonesia</h1>
      </div>
    </div>
  </div>
</div>


<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Tata Cara Peminjaman</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12 wrap-about">
        <div class="text-center">
          <img src="{{ asset('vendor/vonso/FlowchartV1.jpg') }}" class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container-fluid px-md-0">
    <div class="row no-gutters justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Ruangan</h2>
        <p class="justify-content-center"><a href="">Lihat lebih banyak ruangan disini.</a></p>
      </div>
    </div>
    <div class="row no-gutters">
      @foreach($getRuangan as $row)
      <div class="col-lg-6">
        <div class="room-wrap d-md-flex">
          <a href="#" class="img" style="background-image: url('vendor/technext/vacation-rental/images/{{$row->image}}');"></a>
          <div class="half left-arrow d-flex align-items-center">
            <div class="text p-4 p-xl-5 text-center">
              <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
              <p class="mb-0"> {{$row->kode}} </p>
              <h3 class="mb-3"><a href="javascript:void(0)">{{$row->nama}}</a></h3>
              <ul class="list-accomodation">
                <li><span>Maks:</span> {{$row->kapasitas}} Orang</li>
                <li><span>Status: {{ $row->status === "1" ? "Tersedia" : "Tidak Tersedia" }} </span> </li>
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
</section>



@section('scripts')

@endsection
@endsection