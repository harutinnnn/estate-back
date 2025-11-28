<!DOCTYPE html>
<html lang="en">

<?= view('partial/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <?= view('partial/header') ?>

    <!-- /.login-logo -->
    <?php if (isset($currentView)): ?>

        <?= view($currentView) ?>

    <?php endif; ?>


</div>
<!-- ./wrapper -->


<?= view('partial/footer') ?>

</body>
</html>