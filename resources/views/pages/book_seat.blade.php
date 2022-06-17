@extends('layouts.default')
@section('content')
<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Booking Kursi</h3>
                    <!-- <form method="POST" id="contactForm" name="contactForm" class="contactForm"> -->
                    <div class="row contactForm">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="namWWe">Direktorat</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select class="form-control direktorat" name="direktorat" id="direktorat">
                                            <option value=""> -- Pilih Direktorat -- </option>
                                            @foreach($getDirektorat as $row)
                                            <option value="{{$row->ID}}"> {{$row->nama}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="namWWe">Fungsi</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select class="form-control fungsi" name="fungsi" id="fungsi">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="namWWe">Pilih Kursi</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select class="form-control kursi" name="kursi" id="kursi">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label class="label" for="email">Pilih Kursi</label>
                                <input type="text" class="form-control" name="kursi" id="kursi" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="label" for="email"></label>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="lihatKursi"> Lihat Kursi</button>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Tanggal Pemakaian</label>
                                <input type="date" class="form-control" name="tglPakai" id="tglPakai">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="email">Tipe Pemakaian</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select name="tipe_pakai" id="tipe_pakai" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Half day</option>
                                            <option value="2">Full Day</option>
                                            <option value="3">Custom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label" for="subject">Jam Mulai</label>
                                <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label" for="subject">Jam Selesai</label>
                                <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="#">Keterangan</label>
                                <textarea name="Keterangan" class="form-control" id="keterangan" cols="30" rows="4" placeholder="Keterangan"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" id="submitBooking" class="btn btn-primary">Booking</button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="box_kursi" name="box_kursi">
<div class="modal fade" id="modalKursi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pilih Kursi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-5 d-flex align-items-stretch">
                    <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                        <div class="dbox w-100 d-flex align-items-start" id="kursi_template">

                        </div>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Pilih</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#lihatKursi").click(function(e) {
        var kursi = $('#box_kursi').val();
        if (kursi == '') {
            Swal.fire(
                'Get Kursi Failed!',
                'Data fungsi belum dipilih',
                'warning'
            )
        } else {
            $.ajax({
                url: "{{ route('get-template')}}",
                method: "POST",
                data: "datanya=" + JSON.stringify(kursi),
                dataType: 'json',
                beforeSend: function() {

                },
                success: function(data) {
                    $("#kursi_template").empty()
                    $("#kursi_template").append(data)
                    $("#modalKursi").modal('show')
                }
            });

        }
    })

    $('.direktorat').select2({
        placeholder: 'Select an option'
    });
    $('.fungsi').select2({
        placeholder: 'Select an option'
    });
    $('.kursi').select2({
        placeholder: 'Select an option'
    });

    $("#direktorat").change(function() {
        var direktorat = $('#direktorat').val();
        $.ajax({
            url: "{{ route('get-fungsi')}}",
            method: "POST",
            data: "datanya=" + JSON.stringify(direktorat),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                fungsi = {};
                for (let i = 0; i < data.length; i++) {
                    fungsi[data[i].ID] = data[i].nama
                }
                $('#fungsi').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Fungsi -- </option>')

                $.each(fungsi, function(val, text) {
                    $('#fungsi').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    });

    $("#fungsi").change(function() {
        var fungsi = $('#fungsi').val();
        $.ajax({
            url: "{{ route('get-kursi-data')}}",
            method: "POST",
            data: "datanya=" + JSON.stringify(fungsi),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                kursi = {};
                for (let i = 0; i < data.length; i++) {
                    kursi[data[i].ID] = data[i].kode + ' | ' + data[i].nama
                }
                $('#kursi').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Kursi -- </option>')

                $.each(kursi, function(val, text) {
                    $('#kursi').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    });

    // $("#fungsi").change(function() {
    //     var fungsi = $('#fungsi').val();
    //     $.ajax({
    //         url: "{{ route('get-kursi')}}",
    //         method: "POST",
    //         data: "datanya=" + JSON.stringify(fungsi),
    //         dataType: 'json',
    //         beforeSend: function() {

    //         },
    //         success: function(data) {
    //             let html = data[0].template;
    //             $("#box_kursi").val(html)
    //         }
    //     });
    // });

    $("#box_kursi").val("")

    $("#tipe_pakai").change(function() {
        var tipe_pakai = $('#tipe_pakai').val();
        if (tipe_pakai == '1') {
            $("#jam_mulai").val('07:00:00')
            $("#jam_selesai").val('12:00:00')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)
        } else if (tipe_pakai == '2') {
            $("#jam_mulai").val('07:00:00')
            $("#jam_selesai").val('17:00:00')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)
        } else if (tipe_pakai == '3') {
            $("#jam_mulai").val('')
            $("#jam_selesai").val('')
            $("#jam_mulai").removeAttr('readonly')
            $("#jam_selesai").removeAttr('readonly')
        } else {
            $("#jam_mulai").val('')
            $("#jam_selesai").val('')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)
        }
    });

    $("#submitBooking").click(function() {
        var direktorat = $('#direktorat').val()
        var fungsi = $('#fungsi').val()
        var kursi = $('#kursi').val()
        var tglPakai = $('#tglPakai').val()
        var tipe_pakai = $('#tipe_pakai').val()
        var jam_mulai = $('#jam_mulai').val()
        var jam_selesai = $('#jam_selesai').val()
        var keterangan = $('#keterangan').val()


        var data = {}
        data.direktorat = direktorat;
        data.fungsi = fungsi;
        data.kursi = kursi;
        data.tglPakai = tglPakai;
        data.tipe_pakai = tipe_pakai;
        data.jam_mulai = jam_mulai;
        data.jam_selesai = jam_selesai;
        data.keterangan = keterangan;


        route = "{{route('booking-kursi')}}";

        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    let url = "{{route('view-ticket', 'slug' )}}"
                    url = url.replace('slug', data.id);

                    console.log(url);
                    swal.fire("Success!", data.message, data.alert)
                        .then(function() {
                            location.href = url;
                        });
                } else {
                    swal.fire("Warning!", data.message, data.alert);
                }
            },
            error: function(data) {
                swal.fire("Error!", "Add data failed!", "error");
            }
        });
    })
</script>

@endsection
@endsection