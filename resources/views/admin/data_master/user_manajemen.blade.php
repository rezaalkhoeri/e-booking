@extends('admin.master')

@section('title')
User Manajemen
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>DATA USER</h1>
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
                        <h4>User Manajemen</h4>
                    </div>
                    <div class="card-body">
                        <div class="buttons">
                            <button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">
                                Tambah User Manajemen
                            </button>
                            <a class="btn btn-secondary" href="{{ url('add-data-user-manajemen') }}" style="text-decoration: none;">
                                Multiple User Manajemen
                            </a>
                        </div>
                        <div class="table-responsive">
                            <div id="table-2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped dataTable no-footer" id="table-2" role="grid" aria-describedby="table-2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">No</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">User ID</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Email</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Role</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Fungsi</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 53.0125px;">Source</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listUser">
                                                @foreach ($getUsers as $a)
                                                <tr>
                                                    <td>{{ $a->ID }}</td>
                                                    <td>{{ $a->userid }}</td>
                                                    <td>{{ $a->email }}</td>
                                                    <td>{{ $a->role }}</td>
                                                    <td>{{ $a->fungsi }}</td>
                                                    <td>{{ $a->source }}</td>
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
<!-- Modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        <label class="col-sm-2 col-form-label">Source</label>
                        <div class="col-sm-12">
                            <select class="form-control select choose" id="source">
                                <option value=""> -- Pilih Data Source -- </option>
                                <option value="system">system</option>
                                <option value="ldap">ldap</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email ...">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Jika pilih system, harap input password ">
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <label class="col-sm-2 col-form-label">Roles</label>
                        <div class="col-sm-12">
                            <select class="form-control select choose" id="role">
                                <option value="">-- Role Users --</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Super">Super</option>
                                <option value="Approver">Approver</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-12">
                        <label class="col-sm-2 col-form-label">Direktorat</label>
                        <div class="col-sm-12">
                            <select class="form-control select choose" id="direktorat">
                                <option value=""> -- Pilih Direktorat -- </option>
                                @foreach ($getDirektorat as $c)
                                <option value="{{ $c->ID }}"> {{ $c->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label class="col-sm-2 col-form-label">Fungsi</label>
                        <div class="col-sm-12">
                            <select class="form-control select choose" id="fungsi">
                                <option value=""> -- Pilih Fungsi -- </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
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
        var email = $('#inputEmail').val();
        var password = $('#inputPassword').val();
        var role = $('#role').val();
        var direktorat = $('#direktorat').val();
        var fungsi = $('#fungsi').val();

        var data = {}
        data.source = source;
        data.email = email;
        data.password = password;
        data.role = role;
        data.direktorat = direktorat;
        data.fungsi = fungsi;

        route = "{{ route('add-user') }}";
        var tabel_pekerja = $("#table-2").DataTable();
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
                tabel_pekerja.clear().draw();
                tabel_pekerja.destroy()
                $('#listUser').html(html);
                $('#table-2').DataTable();
            }
        })
    })

    $("#source").change(function() {
        var tipe_source = $('#source').val();
        if (tipe_source == 'ldap') {
            $("#inputPassword").prop('readonly', true)
        } else {
            $("#inputPassword").prop('readonly', false)
        }
    });
</script>
@endsection
@endsection