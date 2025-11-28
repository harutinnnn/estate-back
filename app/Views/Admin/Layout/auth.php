<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <!-- /.login-logo -->
    <?php if (isset($currentView)): ?>

        <?= view($currentView) ?>

    <?php endif; ?>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin/js/adminlte.min.js"></script>
</body>
</html>
