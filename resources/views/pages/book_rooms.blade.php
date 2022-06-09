@extends('layouts.default')
@section('content')
<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Booking Ruangan</h3>
                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="name">Pilih Cost Center</label>
                                    <input type="text" class="form-control" name="selectCostCenter" id="selectCostCenter" placeholder="Pilih Cost Center">
                                </div>
                                <div class="mb-4">
                                    Fungsi : <span id="fungsi"> </span>
                                </div>
                                <div class="mb-4">
                                    Cost Center : <span id="costCenter"> </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="email">Acara Rapat</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Acara Rapat">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="subject">Tanggal Pemakaian</label>
                                    <input type="text" class="form-control tanggal_pemakaian" name="tanggal_pemakaian" id="tanggal_pemakaian" placeholder="Tanggal Pemakaian">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="#">Keterangan</label>
                                    <textarea name="Keterangan" class="form-control" id="message" cols="30" rows="4" placeholder="Keterangan"></textarea>
                                </div>
                                <div id="form-message-success" class="mb-4">
                                    Keterangan Package :
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="#">Meeting Package</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select name="" id="" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="">Halfday</option>
                                                <option value="">Fullday</option>
                                                <option value="">One Day</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label" for="subject">Jam Mulai</label>
                                    <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Jam Mulai">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label" for="subject">Jam Akhir</label>
                                    <input type="text" class="form-control" name="waktu_akhir" id="waktu_akhir" placeholder="Jam Mulai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="subject">Jumlah Peserta</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Jumlah Peserta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="subject">Tempat</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Tempat">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="subject">Permintaan Fasilitas IT </label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Permintaan fasilitas IT">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="subject">Permintaan Fasilitas ATK </label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Permintaan fasilitas ATK">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Booking Ruangan" class="btn btn-primary">
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_red.css">
<script>
    $(document).ready(function() {
        let availableTags = [];

        $("#selectCostCenter").autocomplete({
            source: availableTags
        });

        $("#selectCostCenter").change(function(e) {
            let value = e.target.value
            let fungsi

            getCostCenter.forEach(function(e) {
                if (value == e.CostCenter) fungsi = e.Nama;
            });

            $("#costCenter").text(value);
            $("#fungsi").text(fungsi);
        });

        $('.tanggal_pemakaian').flatpickr({
            mode: "multiple",
            dateFormat: "Y-m-d"
        });

        $('#waktu_mulai').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        $('#waktu_akhir').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });


    });
</script>
@endsection
@endsection