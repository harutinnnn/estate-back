<!DOCTYPE html>
<html lang="en">

<?= view('/partial/admin-head') ?>

<body>


<?= view('partial/header') ?>

<?= view('partial/admin-sidebar') ?>

<!-- /.login-logo -->
<?php if (isset($currentView)): ?>

    <?= view($currentView) ?>

<?php endif; ?>


<!-- ./wrapper -->


<?= view('partial/footer') ?>

<?= view('partial/footer_media') ?>

</body>
</html>