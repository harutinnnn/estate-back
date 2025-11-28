<!DOCTYPE html>
<html lang="en">

<?= view('admin/partial/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <?= view('admin/partial/nav') ?>
    <?= view('admin/partial/sidebar') ?>

    <!-- /.login-logo -->
    <?php if (isset($currentView)): ?>

        <?= view($currentView) ?>

    <?php endif; ?>

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

</div>
<!-- ./wrapper -->


<?= view('admin/partial/footer') ?>
</body>
</html>