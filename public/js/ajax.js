var kecamatan = $('#kecamatan');
var kelurahan = $('#kelurahan');
$(document).ready(function () {
    kecamatan.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'pilih-kelurahan',
            type: 'POST',
            data: {
                'id': id,
            },
            success: function (datax) {
                kelurahan.empty();
                kelurahan.append(
                    '<option selected disabled hidden value=>Pilih Kelurahan');
                var data = datax.replace('"', '');
                kelurahan.append(data.replace('"', ''));
                kelurahan.prop("disabled", false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
});