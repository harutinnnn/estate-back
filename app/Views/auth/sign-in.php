<section class="page-head-img" style="background-image: url(/assets/images/442996.jpg)">

    <div class="head-content">

        <ul class="breadcrumb">
            <li>
                <a href="/<?= $_lang ?>">Home</a>
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
        <div class="mb-30 t-center">Dont have an account - <strong><a class="color-red" href="/<?= $_lang ?>/sign-up">Sign
                    up</a></strong></div>

        <form action="" method="post">
            <div class="form-input-row">
                <input type="text"  class="form-input" id="email" name="email" placeholder="Email">
                <?= show_error('email', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="password" class="form-input" id="password" name="password" placeholder="Password">
                <?= show_error('password', $validation) ?>
            </div>

            <div class="form-input-row mt-30 flex flex-row">
                <label for="remember">
                    <input type="checkbox" class="" id="remember" name="remember" value="1">
                    Remember me
                </label>

                <a href="/<?= $_lang ?>/forgot" class="ml-auto color-red">Forgot password</a>
            </div>



            <div class="form-input-row mt-30">
                <?php if (session()->getFlashdata('error_message')): ?>
                    <div class="col-12">
                        <div class="error-msg mb-3">
                            <?= session()->getFlashdata('error_message') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <button type="submit" name="submit" value="1" class="btn w-100">Login</button>
            </div>
        </form>

        <div class="form-input-row mt-30 t-center">
            - OR -
        </div>

        <div class="form-input-row mt-30">
            <a href="/<?= $_lang ?>/google">
                <button type="button" class="btn google w-100">
                    <i class="fa-brands fa-google"></i>
                    <span>Google</span>
                </button>
            </a>
        </div>
        <div class="form-input-row mt-30">
            <a href="/<?= $_lang ?>/google">
                <button type="button" class="btn linkedin w-100">
                    <i class="fa-brands fa-linkedin-in"></i>
                    <span>Google</span>
                </button>
            </a>
        </div>

    </section>
</div>

a