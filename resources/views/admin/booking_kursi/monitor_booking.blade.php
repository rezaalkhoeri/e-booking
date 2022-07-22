@extends('admin.master')

@section('title')
Input Pekerja WFO
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Monitor Data Booking</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Filter Data</h4>
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
                                <label>Tipe Booking</label>
                                <select class="form-control" id="tipe_pakai">
                                    <option value="">-- Pilih Tipe Booking -- </option>
                                    <option value="1">WFO Mandatory</option>
                                    <option value="2">WFH to WFO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <div class="section-title">Status Booking</div>
                                <select class="form-control" id="tipe_pakai">
                                    <option value="">-- Pilih Status Booking -- </option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Sudah discan</option>
                                    <option value="3">Waiting List</option>
                                </select>

                            </div>
                            <div class="form-group col-6">
                                <div class="section-title">Urutkan Dari</div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Terbaru</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Terlama</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" id="filterButton" class="btn btn-primary"> Tampilkan </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Booking Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="list_booking">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Kode Booking</th>
                                        <th>No Pekerja</th>
                                        <th>Nama Pekerja</th>
                                        <th>Fungsi</th>
                                        <th>Kode Kursi</th>
                                        <th>Tipe Booking</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-warning actionButton" data="cancel"> Cancel Booking </button>
                        <button type="button" class="btn btn-success actionButton" data="waiting"> Waiting List </button>
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

    $(document).ready(function() {
        let tabel_booking = $("#list_booking").DataTable({
            ajax: '{!! route("get-booking")!!}', // memanggil route yang menampilkan data json
            columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                    data: 'ID',
                    name: 'checkbox',
                    render: function(data, type, row, meta) {

                        function buttonCheck(value, row) {
                            let checkHTML = '<div class="custom-checkbox custom-control">'
                            checkHTML += '<input type="checkbox" value="' + value + '" data-checkboxes="mygroup" class="custom-control-input checkbox" id="checkbox-' + row + '">'
                            checkHTML += '<label for="checkbox-' + row + '" class="custom-control-label">&nbsp;</label>'
                            checkHTML += '</div>'

                            return checkHTML;
                        }

                        return buttonCheck(data, (meta.row + 1));
                    }
                },
                {
                    data: 'kodeBooking',
                    name: 'kode_booking'
                },
                {
                    data: 'nomorPekerja',
                    name: 'nopek'
                },
                {
                    data: 'namaLengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'fungsi',
                    name: 'fungsi'
                },
                {
                    data: 'kodeKursi',
                    name: 'kode_kursi'
                },
                {
                    data: 'tipeRequest',
                    name: 'tipe_request',
                    render: function(data, type, row, meta) {
                        let html = ''
                        if (data == 1) {
                            html = 'WFO Mandatory'
                        } else {
                            html = 'WFH to WFO'
                        }

                        return html;
                    }
                },
                {
                    data: 'statusBooking',
                    name: 'status_booking',
                    render: function(data, type, row, meta) {
                        let html = ''
                        if (data == 1) {
                            html = '<span class="badge badge-success">Aktif</span>'
                        } else if (data == 2) {
                            html = '<span class="badge badge-info">Sudah Discan</span>'
                        } else if (data == 3) {
                            html = '<span class="badge badge-warning">Waiting List</span>'
                        } else {
                            html = '<span class="badge badge-danger">Canceled</span>'
                        }

                        return html;
                    }
                },
                {
                    data: 'ID',
                    name: 'action',
                    render: function(data, type, row, meta) {

                        function buttonCheck(value, row) {
                            let checkHTML = '<button class="btn btn-info" id="' + row + '" data="' + value + '">Detail</button>'
                            return checkHTML;
                        }

                        return buttonCheck(data, (meta.row + 1));
                    }
                },

            ],
            destroy: true,
            columnDefs: [{
                "sortable": false,
                "targets": [0, 1, 2, 3]
            }],

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
        $('#list_booking').on('change', '.checkbox', function(e) {
            let index = tabel_booking.row($(this).parents('tr').get(0)).index()
            if (e.target.checked == true) {
                listCheckbox.push(index + 1)
                console.log(listCheckbox);
            } else {
                removeA(listCheckbox, (index + 1));
                $('#checkbox-all').prop('checked', false);
                console.log(listCheckbox);
            }
        })

        $('#list_booking').on('change', '#checkbox-all', function(e) {
            if (e.target.checked !== true) {
                listCheckbox = [];
                console.log(listCheckbox);
            } else {
                listCheckbox = [];
                let length = tabel_booking.rows().count();
                for (let i = 0; i < length; i++) {
                    listCheckbox.push(i + 1)
                }
                console.log(listCheckbox);
            }
        })

        $('.actionButton').click(function(e) {
            let rows = $(tabel_booking.$('input[type="checkbox"]').map(function() {
                return $(this).prop("checked") ? $(this).closest('input').val() : null;
            }));
            let action = $(this).attr('data')

            if (rows.length == 0) {
                swal.fire("Warning!", "Tidak ada data yang diubah!", "warning");
                return false;
            }

            let dataID = []
            for (let i = 0; i < rows.length; i++) {
                dataID.push(rows[i])
            }

            let postData = {};
            postData.data = dataID
            postData.action = action

            let route = "{{route('update-booking')}}"
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
    });
</script>

@endsection
@endsection