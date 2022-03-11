// untuk admin provinsi
var kotakab = $('#kotakab');
var kecamatan = $('#kecamatan');
var kelurahan = $('#kelurahan');
// untuk admin kotakab
var kecamatanmodal = $('#kecamatanmodal');
var kelurahanmodal = $('#kelurahanmodal');
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    kecamatanmodal.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: 'pilih-kelurahan',
            type: 'POST',
            data: {
                'id': id,
            },
            success: function (datax) {
                kelurahanmodal.empty();
                kelurahanmodal.append(
                    '<option selected disabled hidden value=>Pilih Kelurahan');
                var data = datax.replace('"', '');
                kelurahanmodal.append(data.replace('"', ''));
                kelurahanmodal.prop("disabled", false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });

    kotakab.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: 'select-kotakab',
            type: 'POST',
            data: {
                'kotakab': id,
                'kecamatan': kecamatan.val(),
                'kelurahan': kelurahan.val(),
            },
            success: function (datax) {
                var parsedata = $.parseJSON(datax);
                kecamatan.empty();
                kecamatan.append(
                    '<option selected value=all>Semua');
                var datakecamatan = parsedata['kecamatan'].replace('"', '');
                kecamatan.append(datakecamatan.replace('"', ''));

                kelurahan.empty();
                kelurahan.append(
                    '<option selected value=all>Semua');
                var datakelurahan = parsedata['kelurahan'].replace('"', '');
                kelurahan.append(datakelurahan.replace('"', ''));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
    kecamatan.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: 'select-kecamatan',
            type: 'POST',
            data: {
                'kotakab': kotakab.val(),
                'kecamatan': id,
                'kelurahan': kelurahan.val(),
            },
            success: function (datax) {
                kelurahan.empty();
                kelurahan.append(
                    '<option selected value=all>Semua');
                var data = datax.replace('"', '');
                kelurahan.append(data.replace('"', ''));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
});