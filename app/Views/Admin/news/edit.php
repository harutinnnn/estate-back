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
                        <?php if (isset($itemsMl[ADMIN_DEF_LANG]->title)): ?>
                            <li class="breadcrumb-item active"><?= $itemsMl[ADMIN_DEF_LANG]->title ?></li>
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
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title"><?= isset($id) && $id ? 'Edit' : 'Create' ?> <?= translate('form') ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data" onsubmit="return checkNotFinishedCrops()">

                            <div class="card-body">

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="status"><?= translate('status') ?> <code>*</code></label>
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


                                    <div class="form-group col-md-6">
                                        <label for="status"><?= translate('category') ?> <code>*</code></label>
                                        <?php

                                        $inputData = [
                                            'name' => "cat_id",
                                            'id' => 'cat_id',
                                            'class' => 'custom-select rounded-0',
                                        ];
                                        echo form_dropdown($inputData,
                                            (isset($categories) ? $categories : [])
                                            , (isset($item->cat_id) ? $item->cat_id : set_value('cat_id')));
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error('cat_id', $validation) ?>
                                        </div>
                                    </div>
                                </div>


                                <?= view('/Admin/partial/image_input', ['imageFieldName' => 'img', 'imageBoxId' => rand(9999, 999999)]) ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline card-tabs">
                                            <div class="card-header p-0 pt-1">
                                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                    <?php $count = 0; ?>
                                                    <?php if (isset($langList) && !empty($langList)): ?>
                                                        <?php foreach ($langList as $lang => $langTitle): ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link <?= $count++ == 0 ? 'active' : '' ?>"
                                                                   id="lang-<?= $lang ?>-tab"
                                                                   data-toggle="pill"
                                                                   href="#lang-<?= $lang ?>" role="tab"
                                                                   aria-controls="lang-<?= $lang ?>"
                                                                   aria-selected="true"><?= $langTitle ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                                    <?php $count = 0; ?>
                                                    <?php if (isset($langList) && !empty($langList)): ?>
                                                        <?php foreach ($langList as $lang => $langTitle): ?>
                                                            <div class="tab-pane fade  <?= $count++ == 0 ? 'active show' : '' ?>"
                                                                 id="lang-<?= $lang ?>"
                                                                 role="tabpanel"
                                                                 aria-labelledby="lang-<?= $lang ?>-tab">


                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?= translate('title') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [
                                                                        'type' => 'text',
                                                                        'name' => "title_{$lang}",

                                                                        'value' => (isset($itemsMl[$lang]->title) ? $itemsMl[$lang]->title : set_value("title_{$lang}")),
                                                                        'class' => 'form-control',
                                                                        'placeholder' => translate('title'),
                                                                    ];
                                                                    echo form_input($inputData);
                                                                    ?>
                                                                    <div class="error-msg mb-3">
                                                                        <?= show_error("title_{$lang}", $validation); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><?= translate('content') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [

                                                                        'name' => "content_{$lang}",
                                                                        'value' => (isset($itemsMl[$lang]->content) ? $itemsMl[$lang]->content : set_value("content_{$lang}")),
                                                                        'class' => 'form-control editor',
                                                                        'placeholder' => translate('content')
                                                                    ];
                                                                    echo form_textarea($inputData);
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>
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