@extends('admin.master')

@section('title')
Add Data User Manajemen
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>Add Multiple User Manajemen</h1>
            </div>
            <div class="col-3">
                Tanggal Hari ini: <b class="" id="date"></b>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Tentukan Data Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Pilih Source</label>
                                <div class="input-group">
                                    <select class="form-control select choose" id="source">
                                        <option value=""> -- Pilih Data Source -- </option>
                                        <option value="system">system</option>
                                        <option value="ldap">ldap</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Pilih Roles</label>
                                <div class="input-group">
                                    <select class="form-control select choose" id="role">
                                        <option value="">-- Role Users --</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Super">Super</option>
                                        <option value="Approver">Approver</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Pilih Direktorat</label>
                                <div class="input-group">
                                    <select class="form-control select choose" id="direktorat">
                                        <option value=""> -- Pilih Direktorat -- </option>
                                        @foreach ($getDirektorat as $c)
                                        <option value="{{ $c->ID }}"> {{ $c->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Pilih Fungsi</label>
                                <div class="input-group">
                                    <select class="form-control select choose" id="fungsi">
                                        <option value=""> -- Pilih Fungsi -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card card-statistic-2 card-primary">
                    <div class="card-stats">
                        <div class="card-stats-title" style="color:#6777ef">
                            <h6> Masukan Akun Baru </h6>
                        </div>
                        <div class="col-6">
                            <button type="button" id="btnSubmit" class="btn btn-primary">Simpan</button>
                        </div>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data" class="col-6">
                                <tr id="row-1">
                                    <td><input type="email" class="form-control" name="inputEmail" placeholder="Email ..."></td>
                                    <td><input type="password" class="form-control" name="inputPassword" placeholder="Jika pilih system, harap input password "></td>
                                    <td><button class="btn btn-info btn-sm" id='add-input'><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
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

    $("#buttonAdd").on('click', function() {
        $("#modalAdd").modal('show');
    })


    $("#direktorat").change(function() {
        var direktorat = $('#direktorat').val();
        $.ajax({
            url: "{{ route('get-fungsi') }}",
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

    $(document).on('click', '#btnSubmit', function(e) {
        var source = $('#source').val();
        var role = $('#role').val();
        var direktorat = $('#direktorat').val();
        var fungsi = $('#fungsi').val();

        let email = $("input[name='inputEmail']").map(function() {
            return $(this).val();
        }).get();

        let password = $("input[name='inputPassword']").map(function() {
            return $(this).val();
        }).get();

        var data = {}
        data.source = source;
        data.email = email;
        data.password = password;
        data.role = role;
        data.direktorat = direktorat;
        data.fungsi = fungsi;

        console.log(data);


        route = "{{ route('add-multiple-user') }}";

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
                            location.href = "{{ route('user-manajemen') }}"
                        });
                } else {
                    swal.fire("Warning!", data.message, data.alert);
                }
            },
            error: function(data) {
                swal.fire("Error!", "Add User failed!", "error");
            }
        })
    })

    $("#source").change(function() {
        var tipe_source = $('#source').val();
        if (tipe_source == 'ldap') {
            $("input[name='inputPassword']").prop('readonly', true)
        } else {
            $("input[name='inputPassword']").prop('readonly', false)
        }
    });

    let dataRow = 1
    $('#add-input').click(() => {
        dataRow++
        inputRow(dataRow)
    })

    inputRow = (i) => {
        let readonly;
        let source = $('#source').val()
        if (source == 'ldap') {
            readonly = 'readonly'
        }

        let tr = `<tr id="row-${i}">
                        <td>
                            <input type="email" class="form-control" name="inputEmail" placeholder="Email ...">
                        </td>
                        <td>
                            <input type="password" class="form-control" name="inputPassword" placeholder="Jika pilih system, harap input password" ` + readonly + `>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger delete-record float-end" data-id="${i}">Hapus</button>
                        </td>
                    </tr>`
        $('#data').append(tr)
    }

    $('#data').on('click', '.delete-record', function() {
        let id = $(this).attr('data-id')
        $('#row-' + id).remove()
    })
</script>
@endsection
@endsection