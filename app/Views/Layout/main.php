<!DOCTYPE html>
<html lang="en">

<?= view('partial/head') ?>

<body>


<?= view('partial/header') ?>

<!-- /.login-logo -->
<?php if (isset($currentView)): ?>

    <?= view($currentView) ?>

<?php endif; ?>


<!-- ./wrapper -->


<?= view('partial/footer') ?>

<?= view('partial/footer_media') ?>

</body>
</html>