@extends('layouts.default')
@section('content')

<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Verifikasi Kursi</h3>
                    <div id="form-message-warning" class="mb-4"></div>
                    <div id="form-message-success" class="mb-4">
                        Masukan kode booking anda!
                    </div>
                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="name">Masukan Kode Booking</label>
                                    <input type="text" class="form-control" name="kodeBooking" id="kodeBooking" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" id="confirm" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </form>
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