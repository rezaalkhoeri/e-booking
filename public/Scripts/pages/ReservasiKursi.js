

$("#lihatKursi").click(function(e) {
    var idKursi = $('#kursi').val();

    if (idKursi == '') {
        Swal.fire(
            'Get Denah Kursi Gagal!',
            'Data Kursi belum dipilih',
            'warning'
        )
    } else {
        var data = {}
        data.id = idKursi;

        $.ajax({
            url: url_get_denah,
            method: "POST",
            data: "datanya=" + JSON.stringify(data),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                if (data.status == 'success') {
                    let src =  "Img/Kursi/"+ data.url;
                    document.getElementById("ifDokumen").setAttribute('src', src);
                    $("#modalKursi").modal('show');
                }
                
            }
        });
    }
})


// $("#fungsi").change(function() {
//     var fungsi = $('#fungsi').val();
//     $.ajax({
//         url: "{{ route('get-kursi')}}",
//         method: "POST",
//         data: "datanya=" + JSON.stringify(fungsi),
//         dataType: 'json',
//         beforeSend: function() {

//         },
//         success: function(data) {
//             let html = data[0].template;
//             $("#box_kursi").val(html)
//         }
//     });
// });

$("#box_kursi").val("")

$("#tipe_pakai").change(function() {
    var tipe_pakai = $('#tipe_pakai').val();
    if (tipe_pakai == '1') {
        $("#jam_mulai").val('07:00:00')
        $("#jam_selesai").val('12:00:00')
        $("#jam_mulai").prop('readonly', true)
        $("#jam_selesai").prop('readonly', true)
    } else if (tipe_pakai == '2') {
        $("#jam_mulai").val('07:00:00')
        $("#jam_selesai").val('17:00:00')
        $("#jam_mulai").prop('readonly', true)
        $("#jam_selesai").prop('readonly', true)
    } else if (tipe_pakai == '3') {
        $("#jam_mulai").val('')
        $("#jam_selesai").val('')
        $("#jam_mulai").removeAttr('readonly')
        $("#jam_selesai").removeAttr('readonly')
    } else {
        $("#jam_mulai").val('')
        $("#jam_selesai").val('')
        $("#jam_mulai").prop('readonly', true)
        $("#jam_selesai").prop('readonly', true)
    }
});

$("#submitBooking").click(function() {
    let direktorat = $('#direktorat').val()
    let fungsi = $('#fungsi').val()
    let kursi = $('#kursi').val()
    let tglStart = $('#tglStart').val()
    let tglFinish = $('#tglFinish').val()
    let tipe_pakai = $('#tipe_pakai').val()
    let jam_mulai = $('#jam_mulai').val()
    let jam_selesai = $('#jam_selesai').val()
    let keterangan = $('#keterangan').val()


    let data = {}
    data.direktorat = direktorat;
    data.fungsi = fungsi;
    data.kursi = kursi;
    data.tglStart = tglStart;
    data.tglFinish = tglFinish;
    data.tipe_pakai = tipe_pakai;
    data.jam_mulai = jam_mulai;
    data.jam_selesai = jam_selesai;
    data.keterangan = keterangan;

    $.ajax({
        url: url_post_reservasi_kursi,
        type: "POST",
        data: "datanya=" + JSON.stringify(data),
        dataType: "json",
        success: function(data) {
            if (data.status == 'success') {
                let url = url_view_ticket;
                url = url.replace('slug', data.id);

                console.log(url);
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