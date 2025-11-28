<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= translate($mod) ?> <?= isset($id) && $id ? 'Edit' : 'Create' ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/<?= ADMIN_LINK ?>"><?= translate('dashboard') ?></a></li>
                        <li class="breadcrumb-item"><a href="/<?= ADMIN_LINK ?>/<?= $mod ?>"><?= translate($mod) ?></a>
                        </li>
                        <?php if (isset($item->key)): ?>
                            <li class="breadcrumb-item active"><?= $item->key ?></li>
                        <?php else: ?>
                            <li class="breadcrumb-item"><?= translate('new') ?></li>
                        <?php endif; ?>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= isset($id) && $id ? 'Edit' : 'Create' ?> <?= translate('form') ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= translate('tag') ?></label>
                                    <?php
                                    $inputData = [
                                        'type' => 'text',
                                        'name' => "tag",

                                        'value' => (isset($item->tag) ? $item->tag : set_value("tag")),
                                        'class' => 'form-control',
                                        'placeholder' => translate('tag'),
                                    ];

                                    echo form_input($inputData);
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error("tag", $validation); ?>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->


                            <div class="card-footer">
                                <button type="submit" name="submit" value="1"
                                        class="btn btn-primary"><?= translate($id ? 'update' : 'create') ?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>