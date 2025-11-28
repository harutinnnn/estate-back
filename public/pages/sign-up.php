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
                <span>Sign Up</span>
            </li>
        </ul>
        <h1>Sign Up</h1>

    </div>
</section>


<div class="main-content">
    <section class="auth-form">

        <h2 class="mb-10 t-center">Register to your account</h2>
        <div class="mb-30 t-center">Already have an account? - <strong><a href="/pages/sign-in.php">Sign in</a></strong></div>

        <div class="form-input-row">
            <select name="account-type" id="account-type" class="form-input">
                <option value="">-- select Account type --</option>
                <option value="">User</option>
                <option value="">Broker</option>
            </select>

        </div>

        <div class="form-input-row mt-30">
            <input type="text" class="form-input" id="full_name" name="full_name" placeholder="Full name">
        </div>

        <div class="form-input-row mt-30">
            <input type="text" class="form-input mobile-number" id="mobile_number"  name="mobile_number" placeholder="(099) 99-99-99">
        </div>

        <div class="form-input-row mt-30">
            <input type="text" class="form-input" id="email" name="email" placeholder="Email">
        </div>

        <div class="form-input-row mt-30">
            <input type="password" class="form-input" id="password" placeholder="Password">
        </div>

        <div class="form-input-row mt-30">
            <input type="password" class="form-input" id="password-confirm" placeholder="Password confirmation">
        </div>

        <div class="form-input-row mt-30">
            <button type="submit" class="btn w-100">Register</button>
        </div>

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