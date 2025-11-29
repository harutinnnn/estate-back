<section class="page-head-img" style="background-image: url(/assets/images/442996.jpg)">

    <div class="head-content">

        <ul class="breadcrumb">
            <li>
                <a href="/<?= $_lang ?>">Home</a>
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
        <div class="mb-30 t-center">Already have an account? - <strong><a class="color-red" href="/<?= $_lang ?>/sign-in">Sign
                    in</a></strong></div>

        <form action="" method="post">

            <div class="form-input-row">
                <label for="">Select Account Type</label>
                <select name="role" id="role" class="form-input">
                    <option value="user">User</option>
                    <option value="broker">Broker</option>
                </select>
                <?= show_error('role', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="text" class="form-input" id="name" name="name" placeholder="Full name" value="<?= set_value('name') ?>">
                <?= show_error('name', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="text" class="form-input mobile-number" id="phone" name="phone"
                       placeholder="(099) 99-99-99" value="<?= set_value('phone') ?>">
                <?= show_error('phone', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="text" class="form-input" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                <?= show_error('email', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="password" class="form-input" id="password" name="password" placeholder="Password">
                <?= show_error('password', $validation) ?>
            </div>

            <div class="form-input-row mt-30">
                <input type="password" class="form-input" name="password_confirm" id="password_confirm"
                       placeholder="Password confirmation">
                <?= show_error('password_confirm', $validation) ?>
            </div>


            <?php if (session()->getFlashdata('error_message')): ?>
                <div class="col-12">
                    <div class="error-msg mb-3">
                        <?= session()->getFlashdata('error_message') ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-input-row mt-30">
                <button type="submit" name="submit" value="1" class="btn w-100">Register</button>
            </div>
        </form>

        <div class="form-input-row mt-30 t-center">
            - OR -
        </div>

        <div class="form-input-row mt-30">
            <a href="/<?= $_lang ?>/google">
                <button type="button" class="btn google w-100">Google</button>
            </a>
        </div>

    </section>
</div>

a