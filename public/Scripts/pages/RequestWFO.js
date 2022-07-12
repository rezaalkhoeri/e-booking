$("#submitRequestWFO").click(function() {
    let direktorat = $('#direktorat').val()
    let fungsi = $('#fungsi').val()
    let tglStart = $('#tglStart').val()
    let tglFinish = $('#tglFinish').val()
    let keterangan = $('#keterangan').val()
    let atasan = $('#atasan').val()

    let data = {}
    data.direktorat = direktorat;
    data.fungsi = fungsi;
    data.tglStart = tglStart;
    data.tglFinish = tglFinish;
    data.keterangan = keterangan;
    data.atasan = atasan;

    $.ajax({
        url: url_post_request_wfo,
        type: "POST",
        data: "datanya=" + JSON.stringify(data),
        dataType: "json",
        success: function(data) {
            if (data.status == 'success') {
                let url = url_get_listapproval;

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
})