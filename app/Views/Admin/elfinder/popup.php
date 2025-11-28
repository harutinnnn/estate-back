<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder File Manager</title>

    <!-- jQuery + jQuery UI -->
    <script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/admin/plugins/jquery-ui/jquery-ui.min.css"></script>

    <!-- elFinder CSS + JS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/elfinder/css/elfinder.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/elfinder/css/theme.css') ?>">
    <script src="<?= base_url('assets/admin/elfinder/js/elfinder.min.js') ?>"></script>
</head>
<body>

<div id="elfinder"></div>

<script>
    $(function () {
        $('#elfinder').elfinder({
            // Your connector route
            url: '/admin/elfinder/connector',
            getFileCallback: function (file) {
                console.log('file',file)
                if (window.opener && window.opener.elfinderTinyMCECallback) {
                    let absoluteUrl = decodeURIComponent(file.url);
                    window.opener.elfinderTinyMCECallback(absoluteUrl);
                    window.close();
                }
            },
            resizable: false
        });
    });
</script>

</body>
</html>
