@extends('admin.master')

@section('title')
Input Pekerja WFO
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>BIODATA PEKERJA</h1>
    </div>
    Tanggal Hari ini:<b class="" id="date"></b> 
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Filter Data</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-8">
                                <label>Direktorat</label>
                                <select class="form-control select2" id="direktorat">
                                    <option value=""> -- Pilih Direktorat -- </option>
                                    @foreach($getDirektorat as $a)
                                    <option value="{{$a->ID}}"> {{$a->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <label>Fungsi</label>
                                <select class="form-control select2" id="fungsi">
                                    <option value=""> -- Pilih Fungsi -- </option>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <label>Departemen</label>
                                <select class="form-control select2" id="departemen">
                                    <option value=""> -- Pilih Departemen -- </option>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <button type="button" id="filterButton" class="btn btn-primary"> Tampilkan </button>
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
                                                    <th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 92.3px;">Nomor Pekerja</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Nama</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Jabatan</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Direktorat</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Fungsi</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Departemen</th>
                                                    <th class="sorting" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 44.325px;">Status Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listPekerja">
                                                
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
    })

    var dt = new Date();
    document.getElementById("date").innerHTML = dt.toLocaleDateString('en-UK');

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
            url: "{{ route('get-departemen')}}",
            method: "POST",
            data: "datanya=" + JSON.stringify(fungsi),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                departemen = {};
                for (let i = 0; i < data.length; i++) {
                    departemen[data[i].ID] = data[i].nama
                }
                $('#departemen').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Departemen -- </option>')

                $.each(departemen, function(val, text) {
                    $('#departemen').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    });
    $(document).on('click', '#filterButton', function(e){
        var direktorat = $('#direktorat').val();
        var fungsi = $('#fungsi').val();
        var departemen = $('#departemen').val();

        var data = {}
        data.direktorat = direktorat;
        data.fungsi = fungsi;
        data.departemen = departemen;

        route = "{{route('filter-pekerja')}}";

        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            beforeSend: function() {

            },
            success: function(data){
                response = JSON.parse(JSON.stringify(data));
                console.log(response);

                var html = "";
                if (data.length) {
                    
                    $.each(data, function(key, value){
                        html += '<tr>'
                        html += '<td>'+ value.nomorPekerja +'</td>';
                        html += '<td>'+ value.namaLengkap +'</td>';
                        html += '<td>'+ value.jabatan +'</td>';
                        html += '<td>'+ value.direktorat +'</td>';
                        html += '<td>'+ value.fungsi +'</td>';
                        html += '<td>'+ value.departemen +'</td>';
                        html += '<td>'+ value.departemen +'</td>';
                        html += '</tr>'
                    });
                    
                }else{
                    html += '<td colspan="7">NO RECORD FOUND</td>';
                }

                $('#listPekerja').html(html);
            }
        })
    })
    
</script>
@endsection
@endsection