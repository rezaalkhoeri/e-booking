@extends('layouts.default')
@section('content')
<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Request Permintaan WFO</h3>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Tanggal Start WFO</label>
                                <input type="date" class="form-control" name="tglStart" id="tglStart">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Tanggal Finish WFO</label>
                                <input type="date" class="form-control" name="tglFinish" id="tglFinish">
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
                                <label class="label" for="namWWe">Atasan</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <select class="form-control" name="atasan" id="atasan">
                                            <option value=""> -- Harap pilih Atasan -- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" id="submitRequestWFO" class="btn btn-primary">Submit Permintaan WFO</button>
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
@endsection
@section('scripts')
<script src="{{ url('Scripts/sweetalert.min.js') }}"></script>
<script src="{{ url('Scripts/pages/Helpers.js')}}"></script>
<script src="{{ url('Scripts/pages/RequestWFO.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const url_get_fungsi = '{{ route('get-fungsi') }}';
    const url_post_request_wfo = '{{ route('submit-wfo') }}';
    const url_get_atasan_fungsi = '{{ route('get-atasan-fungsi') }}';
    const url_get_listapproval = '{{ route('list-approval') }}';
</script>


@endsection