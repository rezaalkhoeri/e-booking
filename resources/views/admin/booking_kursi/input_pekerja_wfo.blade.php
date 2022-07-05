@extends('admin.master')

@section('title')
Input Pekerja WFO
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Input Pekerja WFO</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Booking</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Direktorat</label>
                                <select class="form-control select2" id="direktorat">
                                    <option value=""> -- Pilih Direktorat -- </option>
                                    @foreach($getDirektorat as $row)
                                    <option value="{{$row->ID}}"> {{$row->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Fungsi</label>
                                <select class="form-control select2" id="fungsi">
                                    <option value=""> -- Pilih Fungsi -- </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Tanggal Mulai & Selesai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control daterange">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Tipe Pemakaian</label>
                                <select class="form-control" id="tipe_pakai">
                                    <option value="">-- Pilih Tipe Pemakaian -- </option>
                                    <option value="1">Half Day</option>
                                    <option value="2">Full Day</option>
                                    <option value="3">Custom</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Jam Mulai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="jam_mulai" class="form-control timepicker" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Jam Selesai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="jam_selesai" class="form-control timepicker" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Data Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Pilih Pekerja</label>
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">Tambah Pekerja</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Import Excel</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="table-2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="table-2_length"><label>Show <select name="table-2_length" aria-controls="table-2" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="table-2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-2"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-2" role="grid" aria-describedby="table-2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center sorting_asc" rowspan="1" colspan="1" aria-label="" style="width: 27.525px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 92.3px;">Nomor Pekerja</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Nama Pekerja</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 44.325px;">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>280004</td>
                                                    <td class="align-middle">
                                                        Reza Aji Alkhoeri
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="table-2_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="table-2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="table-2_previous"><a href="#" aria-controls="table-2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="table-2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="table-2_next"><a href="#" aria-controls="table-2" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
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
    </div>
    </div>
</section>
@section('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

    $("#tipe_pakai").change(function() {
        var tipe_pakai = $('#tipe_pakai').val();
        if (tipe_pakai == '1') {
            $("#jam_mulai").val('07:00 AM')
            $("#jam_selesai").val('12:00 AM')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)

        } else if (tipe_pakai == '2') {
            $("#jam_mulai").val('07:00 AM')
            $("#jam_selesai").val('17:00 AM')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)

        } else if (tipe_pakai == '3') {
            $("#jam_mulai").prop('readonly', false)
            $("#jam_selesai").prop('readonly', false)
        } else {
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)
        }
    });
</script>

@endsection
@endsection