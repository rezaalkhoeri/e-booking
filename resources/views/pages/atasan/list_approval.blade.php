@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('vendor/myticket_list.css') }}">
<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-7 d-flex align-items-stretch">
            <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">List Approval Pekerja Request WFO</h3>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-box">
                                    <div class="widget-header bordered-bottom bordered-themesecondary">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <h5 class="widget-caption themesecondary">Request WFO List</h5>
                                    </div>
                                    <!--Widget Header-->
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="tickets-container">
                                                <ul class="tickets-list">
                                                    @foreach($getListApproval as $row)
                                                    <li class="ticket-item">
                                                        <div class="row">
                                                            <div class="ticket-user col-md-6 col-sm-12">
                                                                <div class="avatar">
                                                                    <div class="avatar__letters">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <span class="user-name">{{$row->nomorPekerja}} - {{$row->namaLengkap}}</span>
                                                                <span class="user-at">at</span>
                                                                <span class="user-company">{{$row->fungsi}}</span>
                                                            </div>
                                                            <div class="ticket-user ticket-time  col-md-2 col-sm-6 col-xs-12">
                                                                <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                <i class="fa fa-clock-o"></i>
                                                                <span class="time">{{$row->tglMulai}}</span>
                                                                <span class="user-at">s/d</span>
                                                                <span class="user-name"> {{$row->tglSelesai}}</span>
                                                            </div>
                                                            <?php if (Session::get('role') == "Approver" ) { ?>
                                                            <div class="ticket-time  col-md-2 col-sm-6 col-xs-12">
                                                                <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                <span class="lihat_tiket">
                                                                    <a data-id="{{$row->ID}}" id="ModalApproval" href="#" onclick="doModal(this);"> 
                                                                        Lihat Request
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                                                <span class="divider hidden-xs"></span>
                                                                <span class="type"> <?php 
                                                                    if ($row->status == 1) {
                                                                        echo "Pending";
                                                                    } else if ($row->status == 2) {
                                                                        echo "Approve";
                                                                    } else {
                                                                        echo "Reject";
                                                                    }
                                                                ?> </span>
                                                            </div>
                                                            <div class="ticket-state bg-palegreen">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
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
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Approval/ Reject Request WFO</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div class="row contactForm">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="namWWe">Direktorat</label>
                                <input type="text" class="form-control" name="direktorat" id="direktorat" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="namWWe">Fungsi</label>
                                <input type="text" class="form-control" name="fungsi" id="fungsi" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Tanggal Start WFO</label>
                                <input type="text" class="form-control" name="tglMulai" id="tglMulai" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Tanggal Finish WFO</label>
                                <input type="text" class="form-control" name="tglSelesai" id="tglSelesai" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="#">Keterangan</label>
                                <textarea name="Keterangan" class="form-control" id="keterangan" cols="30" rows="4" placeholder="Keterangan" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id-approval" id="id-approval" disabled>
                                <button type="button" id="ApproveRequestWFO" class="btn btn-info">Approve</button>
                                <button type="button" id="RejectRequestWFO" class="btn btn-primary">Reject</button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
            <!-- <div class="modal-header">
                <h3>Pilih Kursi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-5 d-flex align-items-stretch">
                    <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                        <div class="dbox w-100 d-flex align-items-start" id="kursi_template">

                        </div>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Pilih</button>
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ url('Scripts/sweetalert.min.js') }}"></script>
<script>

    const url_list_approval = "{{ route('list-approval') }}";
    const url_get_data_approval = "{{ route('get-data-approval') }}";
    const url_post_approval_request_wfo = "{{ route('post-status-approval') }}";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function doModal(sender)
    {
        var id_data = sender.attributes['data-id'].value;
        $.ajax({
            url: url_get_data_approval,
            type: "POST",
            data: "datanya=" + JSON.stringify(id_data),
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#myModal').modal('show');
        
                    $('#direktorat').val(data[0].direktorat);
                    $('#fungsi').val(data[0].fungsi);
                    let arr_tglMulai = data[0].tglMulai.split("-");
                    let txtTglMulai = arr_tglMulai[2] + " " + getBulan(arr_tglMulai[1]) + " " + arr_tglMulai[0];
                    $('#tglMulai').val(txtTglMulai);
                    let arr_tglSelesai = data[0].tglSelesai.split("-");
                    let txtTglSelesai = arr_tglSelesai[2] + " " + getBulan(arr_tglSelesai[1]) + " " + arr_tglSelesai[0];
                    $('#tglSelesai').val(txtTglSelesai);
                    $('#keterangan').val(data[0].keterangan);
                    $('#id-approval').val(data[0].ID);
                }
            },
            error: function(data) {
                swal.fire("Error!", "Add data failed!", "error");
            }
        });
    }

    function getBulan(bulan)
    {
        if (bulan == "01") {
            return "Januari";
        } else if (bulan == "02") {
            return "Februari";
        } else if (bulan == "03") {
            return "Maret";
        } else if (bulan == "04") {
            return "April";
        } else if (bulan == "05") {
            return "Mei";
        } else if (bulan == "06") {
            return "Juni";
        } else if (bulan == "07") {
            return "Juli";
        } else if (bulan == "08") {
            return "Agustus";
        } else if (bulan == "09") {
            return "September";
        } else if (bulan == "10") {
            return "Oktober";
        } else if (bulan == "11") {
            return "November";
        } else {
            return "Desember";
        }
    }

    function submitRequestWFO(statusApproval)
    {
        let status = 0;
        if (statusApproval == "Approve") {
            status = 2;
        } else {
            status = 3;
        }

        let id = $('#id-approval').val()

        let data = {}
        data.ID = id;
        data.status = status;

        $.ajax({
            url: url_post_approval_request_wfo,
            type: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    let url = url_list_approval;

                    swal.fire("Success!", data.message, data.alert)
                        .then(function() {
                            location.href = url;
                        });
                } else {
                    swal.fire("Warning!", data.message, data.alert);
                }
            },
            error: function(data) {
                swal.fire("Error!", "Add data failed!", "error");
            }
        });
    }

    $("#ApproveRequestWFO").click(function() {
        submitRequestWFO("Approve");
    })

    $("#RejectRequestWFO").click(function() {
        submitRequestWFO("Reject");
    })
</script>


@endsection