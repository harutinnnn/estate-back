$(document).ready(function () {
    $('.delete-item-row').click(function (e) {
        e.preventDefault();
        if (confirm('Are you sure!')) {
            location.href = $(this).attr('data-href');
        }
    })
})


function init_tinymce() {

    tinymce.init({
        selector: '.editor',
        height: 400,
        plugins: 'link image media code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | link image media | code',
        relative_urls: false,       // Do NOT convert URLs to relative
        remove_script_host: false,  // Keep the full host in URLs
        convert_urls: true,         // Convert URLs (leave as absolute if above false)

        file_browser_callback: function (field_name, url, type, win) {
            var elfinderUrl = '/admin/elfinder/popup';
            var w = 900, h = 600;
            var x = window.screen.width / 2 - w / 2;
            var y = window.screen.height / 2 - h / 2;

            // Store callback globally
            window.elfinderTinyMCECallback = function (fileUrl) {
                win.document.getElementById(field_name).value = decodeURIComponent(fileUrl);
            };

            window.open(elfinderUrl, 'FileManager', 'width=' + w + ',height=' + h + ',left=' + x + ',top=' + y);
        }
    });
}

init_tinymce();

function ReaderImageDisplay(files, class_box, w) {
    var reader = new FileReader();
    w = (w) ? w : 100;
    reader.onload = function (e) {

        $('#' + class_box).html('<img style="width:' + w + 'px;" class="img-thumbnail uploaded-img-width" src="' + e.target.result + '"/>');
    };

    reader.readAsDataURL(files[0]);
}

function removeImage(id, tbl, col, e, imageBoxId) {
    if (confirm(message.are_you_sure)) {
        $.ajax({
            type: 'POST',
            url: '/' + ADMIN_LINK + '/ajax/delete-image',
            data: {
                id: id,
                tbl: tbl,
                col: col
            },
            dataType: 'json',
            beforeSend: function (data) {

            },
            success: function (data) {

                if (data) {
                    $(e).closest('#' + imageBoxId).html('');
                }
            },
            error: function (error) {

            }
        });
    }
}

$(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});