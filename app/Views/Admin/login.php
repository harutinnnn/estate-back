<div class="login-logo">
    <b>Admin</b>Panel
</div>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><?= translate('sign_in_to_start_your_session') ?></p>

        <form method="post">
            <?= csrf_field() ?>

            <div class="input-group mb-1">
                <input type="email" class="form-control" name="email" placeholder="<?= translate('email') ?>"
                       value="<?= set_value('email') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="error-msg mb-3">
                <?= show_error('email', $validation) ?>
            </div>

            <div class="input-group mb-1">
                <input type="password" class="form-control" name="password" placeholder="<?= translate('password') ?>"
                       value="<?= set_value('password') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="error-msg mb-3">
                <?= show_error('password', $validation) ?>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember" value="1">
                        <label for="remember">
                            <?= translate('remember_me') ?>
                        </label>
                    </div>
                </div>


                <!-- /.col -->
                <div class="col-4">

                    <button type="submit" class="btn btn-primary btn-block" name="submit" value="1"><?= translate('sign_in') ?></button>
                </div>
                <?php if (session()->getFlashdata('error_message')): ?>
                    <div class="col-12">
                        <div class="error-msg mb-3">
                            <?= session()->getFlashdata('error_message') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
</div>