$("#direktorat").change(function() {
    var direktorat = $('#direktorat').val();
    $.ajax({
        url: url_get_fungsi,
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
    let fungsi = $('#fungsi').val();
    let tipeForm = $('#tipe_form').val();

    if (tipeForm == 'Reservasi')
    {
        $.ajax({
            url: url_get_kursi_fungsi,
            method: "POST",
            data: "datanya=" + JSON.stringify(fungsi),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                kursi = {};
                for (let i = 0; i < data.length; i++) {
                    kursi[data[i].ID] = data[i].kode + ' | ' + data[i].nama
                }
                $('#kursi').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Kursi -- </option>')

                $.each(kursi, function(val, text) {
                    $('#kursi').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    } else if (tipeForm == 'request') {
        $.ajax({
            url: url_get_atasan_fungsi,
            method: "POST",
            data: "datanya=" + JSON.stringify(fungsi),
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {
                kursi = {};
                for (let i = 0; i < data.length; i++) {
                    kursi[data[i].ID] = data[i].userid
                }
                $('#atasan').find('option')
                    .remove()
                    .end()
                    .append('<option value=""> -- Pilih Atasan -- </option>')

                $.each(kursi, function(val, text) {
                    $('#atasan').append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            }
        });
    }
});
