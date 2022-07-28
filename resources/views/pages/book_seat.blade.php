@extends('layouts.default')
@section('content')
<?php if ($statusApproval == 'Not Exist') { ?>
    <div class="col-md-12">
        <div class="wrapper">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                    <div class="alert danger-alert">
                        <h3>Harap Melakukan Request WFO kepada Atasan atau menghubungi Admin Fungsi untuk mendaftarkan Status Pekerja WFO</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <div class="wrapper">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4">Reservasi Kursi</h3>
                        <!-- <form method="POST" id="contactForm" name="contactForm" class="contactForm"> -->
                        <div class="row contactForm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="namWWe">Direktorat</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select class="form-control" name="direktorat" id="direktorat">
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
                                            <select class="form-control" name="fungsi" id="fungsi">
                                                <option value=""> -- Harap pilih Direktorat terlebih dahulu -- </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="namWWe">Pilih Kursi</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select class="form-control" name="kursi" id="kursi">
                                                <option value="">-- Harap pilih Direktorat & Fungsi terlebih dahulu --</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div> -->

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="namWWe"></label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <button type="button" class="btn btn-success" id="lihatKursi"> Lihat Denah Kursi</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label" for="email">Pilih Kursi</label>
                                    <input type="text" class="form-control" name="kursi" id="selected_kursi" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="label" for="email"></label>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="lihatKursi"> Lihat Kursi</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label" for="name">Tanggal Start Pemakaian</label>
                                    <input type="date" class="form-control" name="tglStart" id="tglStart">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="label" for="name">Tanggal Finish Pemakaian</label>
                                    <input type="date" class="form-control" name="tglFinish" id="tglFinish">
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
                                    <button type="button" id="submitBooking" class="btn btn-primary">Submit Reservasi Kursi</button>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="tipe_form" name="tipe_form" value="<?php echo $tipeForm; ?>">

    <input type="hidden" id="box_kursi" name="box_kursi">
    <div class="modal fade" id="modalKursi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title">Denah Kursi</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe id="ifDokumen" class="if"></iframe>
                </div> -->
                <div class="modal-header">
                    <h3>Pilih Kursi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="kursi_template">

                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="selectKursi">Pilih</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
@endsection
@section('scripts')
<link rel="stylesheet" href="{{ url('/css/alert-div.css') }}">

<script src="{{ url('Scripts/sweetalert.min.js') }}"></script>
<script src="{{ url('Scripts/pages/Helpers.js')}}"></script>
<script src="{{ url('Scripts/pages/ReservasiKursi.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const url_get_fungsi = '{{ route("get-fungsi")}}';
    const url_get_kursi_fungsi = '{{ route("get-kursi-data")}}';
    const url_get_denah = '{{route("get-denah-kursi")}}';
    const url_post_reservasi_kursi = '{{route("booking-kursi")}}';
    let url_view_ticket = '{{route("view-ticket", "slug" )}}';

    const url_get_kursi_name = '{{ route("get-kursi")}}';
    const url_get_template_kursi = '{{ route("get-template")}}';
    window.kursi = "";
</script>


@endsection