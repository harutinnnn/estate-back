<!doctype html>
<html lang="en">
<?php include('./partial/head.php') ?>
<link rel="stylesheet" href="/assets/css/auth.css">
<body>

<?php include('./partial/header.php') ?>

<section class="page-head-img" style="background-image: url(/assets/images/442996.jpg)">

    <div class="head-content">

        <ul class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <span>Forgot password</span>
            </li>
        </ul>
        <h1>Forgot password</h1>

    </div>
</section>


<div class="main-content">
    <section class="auth-form">

        <h2 class="mb-10 t-center">Recover your password</h2>
        <div class="mb-30 t-center">Already recovered your password? - <strong><a href="/pages/sign-in.php">Sign in</a></strong></div>



        <div class="form-input-row mt-30">
            <input type="text" class="form-input" id="email" name="email" placeholder="Email">
        </div>


        <div class="form-input-row mt-30">
            <button type="submit" class="btn w-100">Forgot</button>
        </div>

    </section>
</div>


<?php include('./partial/footer.php') ?>

</body>
</html>