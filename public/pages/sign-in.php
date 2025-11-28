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
                <span>Sign In</span>
            </li>
        </ul>
        <h1>Sign In</h1>

    </div>
</section>


<div class="main-content">
    <section class="auth-form">

        <h2 class="mb-10 t-center">Login to your account</h2>
        <div class="mb-30 t-center">Dont have an account - <strong><a class="color-red" href="/pages/sign-up.php">Sign
                    up</a></strong></div>

        <form action="" method="post">
            <div class="form-input-row">
                <input type="email" required class="form-input" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-input-row mt-30">
                <input type="password" class="form-input" id="password" placeholder="Password">
            </div>

            <div class="form-input-row mt-30 flex flex-row">
                <label for="remember-me">
                    <input type="checkbox" class="" id="remember-me" name="remember-me">
                    Remember me
                </label>

                <a href="/pages/forgot.php" class="ml-auto color-red">Forgot password</a>
            </div>

            <div class="form-input-row mt-30">
                <button type="submit" class="btn w-100">Login</button>
            </div>
        </form>

        <div class="form-input-row mt-30 t-center">
            - OR -
        </div>

        <div class="form-input-row mt-30">
            <a href="/">
                <button type="button" class="btn google w-100">Google</button>
            </a>
        </div>

    </section>
</div>


<?php include('./partial/footer.php') ?>

</body>
</html>