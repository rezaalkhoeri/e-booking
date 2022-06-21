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
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#confirm").click(function() {
        var kodeBooking = $('#kodeBooking').val()

        var data = {}
        data.kodeBooking = kodeBooking;

        route = "{{route('confirm-ticket')}}";

        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.status == 'success') {
                    let url = "{{route('my-account')}}"
                    swal.fire("Success!", data.message, data.alert)
                        .then(function() {
                            location.href = url;
                        });
                } else {
                    swal.fire("Warning!", data.message, data.alert);
                }
            },
            error: function(data) {
                swal.fire("Error!", "Scan data failed!", "error");
            }
        });
    })
</script>
@endsection
@endsection