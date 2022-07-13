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
                <div class="card card-primary">
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
                                    <input type="text" class="form-control daterange" id="tanggalPakai">
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
            <div class="col-8 col-md-8 col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Input Data Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Pilih Pekerja</label>
                                <div class="input-group">
                                    <select class="custom-select select2" id="pekerja">
                                        <option value="">-- Pilih Pekerja -- </option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="tambah_button" type="button">Tambah Pekerja</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
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
            <div class="col-4 col-md-4 col-lg-4">
                <div class="card card-statistic-2 card-primary">
                    <div class="card-stats">
                        <div class="card-stats-title" style="color:#6777ef">
                            <h6> Informasi Kursi </h6>
                        </div>
                        <div class="card-stats-title text-success text-small font-600-bold" id="ik_fungsi"> Fungsi </div>
                        <div class="card-stats-title text-success text-small font-600-bold" id="ik_tanggal"> Tanggal </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="ik_tersedia">-</div>
                                <div class="card-stats-item-label">Tersedia</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="ik_dibooking">-</div>
                                <div class="card-stats-item-label">Dibooking</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="ik_digunakan">-</div>
                                <div class="card-stats-item-label">Digunakan</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-chair"></i>
                    </div>
                    <div class="row">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total</h4>
                            </div>
                            <div class="card-body" id="ik_total">
                                -
                            </div>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Presentase</h4>
                            </div>
                            <div class="card-body" id="ik_presentase">
                                -
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>List Pekerja WFO</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="list_wfo">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>No Pekerja</th>
                                        <th>Nama Pekerja</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" id="hapusButton">Hapus Daftar Pekerja</button>
                        <button type="button" class="btn btn-primary" id="simpanButton">Simpan Daftar WFO</button>
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

    function get_informasi_kursi(params) {
        let data = {}
        data.fungsi = params
        $.ajax({
            url: "{{ route('get-info-kursi')}}",
            method: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                if (data.status == 'success') {
                    $('#ik_fungsi').text(data.dataKursi.fungsi)
                    $('#ik_tanggal').text(data.dataKursi.tanggal)
                    $('#ik_tersedia').text(data.dataKursi.tersedia)
                    $('#ik_dibooking').text(data.dataKursi.dibooking)
                    $('#ik_digunakan').text(data.dataKursi.digunakan)
                    $('#ik_total').text(data.dataKursi.total)
                    $('#ik_presentase').text((data.dataKursi.presentase).toFixed(1) + '%')
                } else {
                    swal.fire("Warning!", data.message, data.status);
                }
            }
        });
    }

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
            url: "{{ route('get-pekerja-by-fungsi')}}",
            method: "POST",
            data: "datanya=" + JSON.stringify(fungsi),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                pekerja = {};
                for (let i = 0; i < data.length; i++) {
                    pekerja[data[i].ID] = data[i].nomorPekerja + ' | ' + data[i].namaLengkap
                }
                $('#pekerja').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Pekerja -- </option>')

                $.each(pekerja, function(val, text) {
                    $('#pekerja').append(
                        $('<option></option>').val(val).html(text)
                    );
                });

                get_informasi_kursi(fungsi)
            }
        });
    });

    $("#tipe_pakai").change(function() {
        var tipe_pakai = $('#tipe_pakai').val();
        if (tipe_pakai == '1') {
            $("#jam_mulai").val('07:00 AM')
            $("#jam_selesai").val('12:00 PM')
            $("#jam_mulai").prop('readonly', true)
            $("#jam_selesai").prop('readonly', true)

        } else if (tipe_pakai == '2') {
            $("#jam_mulai").val('07:00 AM')
            $("#jam_selesai").val('04:00 PM')
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

    $("#tambah_button").click(function() {
        let pekerja = $('#pekerja')

        if (pekerja.val() == '') {
            swal.fire("Warning!", "Data Pekerja Kosong!", "warning");
        } else {
            let jumlahRow = tabel_pekerja.rows().count();

            if (jumlahRow >= $('#ik_tersedia').text()) {
                swal.fire("Warning!", "Jumlah pekerja WFO sudah memenuhi batas maksimal!", "warning");
            } else {
                let pekerjaValue = pekerja[0].selectedOptions[0].value
                let pekerjaText = pekerja[0].selectedOptions[0].text
                let split = pekerjaText.split(" | ")

                function checkValue(value, arr) {
                    var status = 'Not exist';

                    for (var i = 0; i < arr.length; i++) {
                        var name = arr[i];
                        if (name == value) {
                            status = 'Exist';
                            break;
                        }
                    }

                    return status;
                }

                let getData = tabel_pekerja.column(1).data()
                let check = checkValue(split[0], getData)

                if (check == 'Exist') {
                    swal.fire("Warning!", "Data pekerja sudah ditambahkan!", "warning");
                } else {

                    let no = tabel_pekerja.rows().count();

                    function buttonCheck(value, row) {
                        let checkHTML = '<div class="custom-checkbox custom-control">'
                        checkHTML += '<input type="checkbox" value="' + value + '" data-checkboxes="mygroup" class="custom-control-input checkbox" id="checkbox-' + row + '">'
                        checkHTML += '<label for="checkbox-' + row + '" class="custom-control-label">&nbsp;</label>'
                        checkHTML += '</div>'

                        return checkHTML;
                    }

                    tabel_pekerja.row.add([
                        buttonCheck(pekerjaValue, (no + 1)),
                        split[0],
                        split[1],
                        'WFO Mandatory',
                    ]).node().id = 'rowID-' + (no + 1)

                    tabel_pekerja.draw(false);
                }
            }
        }

    });

    function removeA(arr) {
        var what, a = arguments,
            L = a.length,
            ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax = arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    let listCheckbox = [];
    $('#list_wfo').on('change', '.checkbox', function(e) {
        let index = tabel_pekerja.row($(this).parents('tr').get(0)).index()
        if (e.target.checked == true) {
            listCheckbox.push(index + 1)
            console.log(listCheckbox);
        } else {
            removeA(listCheckbox, (index + 1));
            $('#checkbox-all').prop('checked', false);
            console.log(listCheckbox);
        }
    })

    $('#list_wfo').on('change', '#checkbox-all', function(e) {
        if (e.target.checked !== true) {
            listCheckbox = [];
        } else {
            listCheckbox = [];
            let length = tabel_pekerja.rows().count();
            for (let i = 0; i < length; i++) {
                listCheckbox.push(i + 1)
            }
            console.log(listCheckbox);
        }
    })

    $('#hapusButton').click(function() {
        if ($('#checkbox-all').is(':checked')) {
            tabel_pekerja.clear().draw();
        } else {
            for (let i = 0; i < listCheckbox.length; i++) {
                tabel_pekerja.rows('#rowID-' + listCheckbox[i]).remove().draw();
            }
            listCheckbox = [];
            console.log(listCheckbox);

            let getAll = tabel_pekerja.rows().data();
            tabel_pekerja.clear().draw();

            for (let i = 0; i < getAll.length; i++) {
                tabel_pekerja.row.add([
                    getAll[i][0],
                    getAll[i][1],
                    getAll[i][2],
                    getAll[i][3],
                ]).node().id = 'rowID-' + (i + 1)

                tabel_pekerja.draw(false);
            }
        }
    })

    $('#simpanButton').click(function() {
        let direktorat = $('#direktorat').val()
        let fungsi = $('#fungsi').val()
        let tanggalPakai = $('#tanggalPakai').val()
        let tipePakai = $('#tipe_pakai').val()
        let jamMulai = $('#jam_mulai').val()
        let jamSelesai = $('#jam_selesai').val()

        let getNopek = tabel_pekerja.column(1).data().toArray()
        let getNama = tabel_pekerja.column(2).data().toArray()
        let getket = tabel_pekerja.column(3).data().toArray()

        let arrayListWFO = []
        for (let i = 0; i < getNopek.length; i++) {
            var arrayList = [getNopek[i], getNama[i], getket[i]];
            arrayListWFO.push(arrayList)
        }

        let postData = {};
        postData.direktorat = direktorat
        postData.fungsi = fungsi
        postData.tanggalPakai = tanggalPakai
        postData.tipePakai = tipePakai
        postData.jamMulai = jamMulai
        postData.jamSelesai = jamSelesai
        postData.list_wfo = arrayListWFO

        console.log(postData);

        let route = "{{route('save-wfo')}}"
        $.ajax({
            url: route,
            type: "POST",
            data: "datanya=" + JSON.stringify(postData),
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    swal.fire("Success!", data.message, data.alert)
                        .then(function() {
                            location.href = "{{route('monitor-booking')}}"
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