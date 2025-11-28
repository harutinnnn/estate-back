<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/assets/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!--<script src="/assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="/assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="/assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<script src="/assets/admin/plugins/moment/moment.min.js"></script>
<script src="/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="/assets/admin/js/pages/dashboard.js"></script>-->

<script src="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.js"></script>


<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="/assets/admin/js/nestedSortable-master/jquery.mjs.nestedSortable.js"></script>


<script src="<?= base_url('/assets/admin/elfinder/js/elfinder.min.js') ?>"></script>
<script src="<?= base_url('/assets/admin/elfinder/js/jquery.dialogelfinder.js') ?>"></script>

<script src="/assets/admin/js/scripts.js"></script>

<?php if (isset($isCropper) && $isCropper): ?>
    <link href="//unpkg.com/cropperjs@1.6.1/dist/cropper.min.css" rel="stylesheet">
    <script src="//unpkg.com/cropperjs@1.6.1/dist/cropper.min.js"></script>
    <script src="/assets/admin/js/image-cropper.js"></script>

<?php endif; ?>



<?= isset($scripts) ? $scripts : '' ?>