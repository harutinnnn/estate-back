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
                                    <label for="exampleSelectRounded0"><?= translate('status') ?> <code>*</code></label>
                                    <?php

                                    $inputData = [
                                        'name' => "status",
                                        'id' => 'status',
                                        'class' => 'custom-select rounded-0',
                                    ];
                                    echo form_dropdown($inputData, [
                                        1 => translate('published'),
                                        0 => translate('pending'),
                                    ], (isset($item->status) ? $item->status : set_value('status')));
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error('status', $validation) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= translate('title') ?></label>
                                    <?php
                                    $inputData = [
                                        'type' => 'text',
                                        'name' => "title",

                                        'value' => (isset($item->title) ? $item->title : set_value("title")),
                                        'class' => 'form-control',
                                        'placeholder' => translate('title'),
                                    ];

                                    echo form_input($inputData);
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error("title", $validation); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= translate('url') ?></label>
                                    <?php
                                    $inputData = [
                                        'type' => 'text',
                                        'name' => "url",

                                        'value' => (isset($item->url) ? $item->url : set_value("url")),
                                        'class' => 'form-control',
                                        'placeholder' => translate('url'),
                                    ];
                                    if ($id) {
                                        $inputData['readonly'] = 'readonly';
                                    }
                                    echo form_input($inputData);
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error("url", $validation); ?>
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