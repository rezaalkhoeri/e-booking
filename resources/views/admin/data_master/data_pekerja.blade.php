@extends('admin.master')

@section('title')
Input Pekerja WFO
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>BIODATA PEKERJA</h1>
            </div>
            <div class="col-3">
                Tanggal Hari ini: <b class="" id="date"></b> 
            </div>
        </div>
        
    </div>
    
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
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table-2" class="table table-striped">
                                            <thead>
                                                <tr role="row">
                                                    <th>Nomor Pekerja</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Direktorat</th>
                                                    <th>Fungsi</th>
                                                    <th>Departemen</th>
                                                    <th>Status Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listPekerja">
                                                @foreach($getPekerja as $gp)
                                                <tr>
                                                    <td>{{$gp->nomorPekerja}}</td>
                                                    <td>{{$gp->namaLengkap}}</td>
                                                    <td>{{$gp->jabatan}}</td>
                                                    <td>{{$gp->direktorat}}</td>
                                                    <td>{{$gp->fungsi}}</td>
                                                    <td>{{$gp->departemen}}</td>
                                                    <td>
                                                        @if($gp->tgl == '')
                                                            Belum Absen
                                                        @else
                                                            Sudah Absen
                                                        @endif
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
        var tabel_pekerja = $("#table-2").DataTable();
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
                        if (value.tgl == null) {
                            $tgl = "Belum Absen";
                        }else{
                            $tgl = "Sudah Absen";
                        }
                        html += '<tr>'
                        html += '<td>'+ value.nomorPekerja +'</td>';
                        html += '<td>'+ value.namaLengkap +'</td>';
                        html += '<td>'+ value.jabatan +'</td>';
                        html += '<td>'+ value.direktorat +'</td>';
                        html += '<td>'+ value.fungsi +'</td>';
                        html += '<td>'+ value.departemen +'</td>';
                        html += '<td>'+ $tgl +'</td>';
                        html += '</tr>'
                    });
                    
                }else{
                    html += '<td colspan="7">NO RECORD FOUND</td>';
                }
                tabel_pekerja.clear().draw();
                tabel_pekerja.destroy()
                $('#listPekerja').html(html);
                $('#table-2').DataTable();
            }
        })
    })
    
</script>
@endsection
@endsection