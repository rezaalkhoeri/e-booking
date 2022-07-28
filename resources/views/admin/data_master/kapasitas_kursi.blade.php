@extends('admin.master')

@section('title')
Master Data Kursi
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>MASTER DATA KURSI</h1>
            </div>
            <div class="col-3">
                Tanggal Hari ini: <b class="" id="date"></b>
            </div>
        </div>

    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Kursi</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Direktorat</label>
                                <select class="form-control select2" id="kursi_direktorat">
                                    <option value=""> -- Pilih Direktorat -- </option>
                                    @foreach($getDirektorat as $a)
                                    <option value="{{$a->ID}}"> {{$a->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label>Fungsi</label>
                                <select class="form-control select2" id="kursi_fungsi">
                                    <option value=""> -- Pilih Fungsi -- </option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label>Kapasitas</label>
                                <input type="number" class="form-control" id="kapasitas_kursi">
                            </div>
                            <div class="form-group col-12">
                                <label>Label Kursi</label>
                                <input type="trxt" class="form-control" id="label_kursi">
                            </div>
                            <div class="form-group col-12">
                                <button type="button" id="saveButton" class="btn btn-primary"> Simpan </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Filter Data</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Direktorat</label>
                                <select class="form-control select2" id="direktorat">
                                    <option value=""> -- Pilih Direktorat -- </option>
                                    @foreach($getDirektorat as $a)
                                    <option value="{{$a->ID}}"> {{$a->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label>Fungsi</label>
                                <select class="form-control select2" id="fungsi">
                                    <option value=""> -- Pilih Fungsi -- </option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <button type="button" id="filterButton" class="btn btn-primary"> Tampilkan </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-9 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kursi</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table-2" class="table table-striped">
                                    <thead>
                                        <tr role="row">
                                            <th>Nomor</th>
                                            <th>Direktorat</th>
                                            <th>Fungsi</th>
                                            <th>Kuota</th>
                                            <th>Terisi</th>
                                            <th>Kosong</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="filterKursi">

                                        @foreach($getKursi as $gk)
                                        <tr>
                                            <td>{{$loop->iteration }}</td>
                                            <td>{{$gk->direktorat}}</td>
                                            <td>{{$gk->nama_fungsi}}</td>
                                            <td>{{$gk->jumlah}}</td>
                                            <td>{{$gk->terisi}}</td>
                                            <td>{{$gk->tersedia}}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary mdlDetail" data-toggle="modal" onclick="detail_kursi({{$gk->id_fungsi}}, {{$gk->jumlah}})">
                                                    Detail
                                                </button>


                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Modal DETAIL-->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Kursi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="idFungsi"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table" border="0" class="table table-striped">
                            <thead>
                                <tr role="row">
                                    <th width="40">Direktorat</th>
                                    <th width="5">:</th>
                                    <th>
                                        <div class="" id="detailDirektorat"></div>
                                    </th>
                                </tr>
                                <tr role="row">
                                    <th width="40">Fungsi</th>
                                    <th width="5">:</th>
                                    <th>
                                        <div class="" id="detailFungsi"></div>
                                    </th>
                                </tr>
                                <tr role="row">
                                    <th width="40">Kapasitas</th>
                                    <th width="5">:</th>
                                    <th>
                                        <div class="" id="detailKapasitas"></div>
                                    </th>
                                </tr>

                            </thead>

                        </table>
                    </div>
                </div>
                <h5>KURSI TERSEDIA</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-3" class="table table-striped">
                            <thead>
                                <tr role="row">
                                    <th>Nomor</th>
                                    <th>Kode Kursi</th>
                                    <th>Nama Kursi</th>
                                </tr>
                            </thead>
                            <tbody id="availableKursi">

                            </tbody>
                        </table>
                    </div>
                </div>
                <h5>KURSI TERISI</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-4" class="table table-striped">
                            <thead>
                                <tr role="row">
                                    <th>Nomor</th>
                                    <th>Kode Kursi</th>
                                    <th>Nama Kursi</th>
                                    <th>Nomor Pekerja</th>
                                    <th>Nama Pekerja</th>
                                </tr>
                            </thead>
                            <tbody id="detailBook">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $("#table-2").DataTable();

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

    $("#kursi_direktorat").change(function() {
        var direktorat = $('#kursi_direktorat').val();
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
                $('#kursi_fungsi').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Fungsi -- </option>')

                $.each(fungsi, function(val, text) {
                    $('#kursi_fungsi').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    });

    $(document).on('click', '#filterButton', function(e) {
        var direktorat = $('#direktorat').val();
        var fungsi = $('#fungsi').val();

        var data = {}
        data.direktorat = direktorat;
        data.fungsi = fungsi;

        route = "{{route('filter-kursi')}}";
        var tabel_pekerja = $("#table-2").DataTable();
        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            beforeSend: function() {

            },
            success: function(data) {
                response = JSON.parse(JSON.stringify(data));
                console.log(response);

                var html = "";
                if (data.length) {
                    $.each(data, function(key, value) {
                        html += '<tr>'
                        html += '<td>' + (key + 1) + '</td>';
                        html += '<td>' + value.direktorat + '</td>';
                        html += '<td>' + value.nama_fungsi + '</td>';
                        html += '<td>' + value.jumlah + '</td>';
                        html += '<td>' + value.terisi + '</td>';
                        html += '<td>' + value.tersedia + '</td>';
                        html += '<td><button type="button" class="btn btn-primary mdlDetail" data-toggle="modal" onclick="detail_kursi(' + value.id_fungsi + ')">Detail</button></td>';
                        html += '</tr>'
                    });

                } else {
                    html += '<td colspan="7">NO RECORD FOUND</td>';
                }
                tabel_pekerja.clear().draw();
                tabel_pekerja.destroy()
                $('#filterKursi').html(html);
                $('#table-2').DataTable();
            }
        })
    })

    $(document).on('click', '#saveButton', function(e) {
        var direktorat = $('#kursi_direktorat').val();
        var fungsi = $('#kursi_fungsi').val();
        var kapasitas = $('#kapasitas_kursi').val();
        var label = $('#label_kursi').val();

        var data = {}
        data.direktorat = direktorat;
        data.fungsi = fungsi;
        data.kapasitas = kapasitas;
        data.label = label;

        route = "{{route('tambah-kursi')}}";
        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            beforeSend: function() {

            },
            success: function(data) {
                if (data.status == 'success') {
                    swal.fire("Success!", data.message, data.alert)
                        .then(function() {
                            location.reload();
                        });
                } else {
                    swal.fire("Warning!", data.message, data.alert);
                }
            }
        })

    })

    function detail_kursi(fungsi, jumlah) {
        $('#modalDetail').modal('show');
        var idFung = fungsi;
        var data = {}
        data.idFungsi = fungsi;
        $('#detailKapasitas').text(jumlah);

        route = "{{route('detail-kursi')}}";
        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            beforeSend: function() {

            },
            success: function(data) {
                response = JSON.parse(JSON.stringify(data));
                console.log(response);
                $('#detailDirektorat').text(data[0].direktorat);
                $('#detailFungsi').text(data[0].fungsi);
                var html = "";
                if (data.length) {
                    $.each(data, function(key, value) {
                        html += '<tr>'
                        html += '<td>' + (key + 1) + '</td>';
                        html += '<td>' + value.kodeKursi + '</td>';
                        html += '<td>' + value.namaKursi + '</td>';
                        html += '</tr>'
                    });

                } else {
                    html += '<tr>';
                    html += '<td colspan="7">NO RECORD FOUND</td>';
                    html += '</tr>';
                }
                $('#availableKursi').html(html);

            }
        })
        detail_booking(idFung);
    }

    function detail_booking(params) {
        var data = {}
        data.idFungsi = params;

        route = "{{route('detail-booking')}}";
        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            beforeSend: function() {

            },
            success: function(data) {
                response = JSON.parse(JSON.stringify(data));
                console.log(response);

                var html = "";
                if (data.length) {
                    $.each(data, function(key, value) {
                        html += '<tr>'
                        html += '<td>' + (key + 1) + '</td>';
                        html += '<td>' + value.kodeKursi + '</td>';
                        html += '<td>' + value.namaKursi + '</td>';
                        html += '<td>' + value.nomorPekerja + '</td>';
                        html += '<td>' + '' + '</td>';
                        html += '</tr>'
                    });

                } else {
                    html += '<tr>';
                    html += '<td colspan="7">NO RECORD FOUND</td>';
                    html += '</tr>';
                }
                $('#detailBook').html(html);

            }
        })
    }
</script>
@endsection
@endsection