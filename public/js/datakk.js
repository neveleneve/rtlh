$(function () {
    var previewImages = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            $("div.images-preview-div").empty();
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr({
                        'src': event.target.result,
                        'class': 'img-thumbnail col-3'
                    }).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#fotorumah').on('change', function () {
        previewImages(this, 'div.images-preview-div');
    });
});
$(document).ready(function (e) {
    $('#gambarkk').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-kk').attr({
                'src': e.target.result,
                'class': 'img-thumbnail'
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    $('#gambarnik').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-ktp').attr({
                'src': e.target.result,
                'class': 'img-thumbnail'
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
});