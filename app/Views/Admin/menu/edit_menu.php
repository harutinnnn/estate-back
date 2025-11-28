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
                        <li class="breadcrumb-item"><a href="/<?= ADMIN_LINK ?>/<?= $mod ?>"><?= $mod ?></a></li>

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
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <?= form_input([
                                    'type' => 'hidden',
                                    'value' => $id,
                                    'id' => 'hidden-id'

                                ]) ?>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="exampleSelectRounded0"><?= translate('status') ?>
                                            <code>*</code></label>
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
                                        <label for="exampleInputEmail1"><?= translate('pos') ?></label>
                                        <?php
                                        $inputData = [
                                            'type' => 'text',
                                            'name' => "pos",
                                            'value' => (isset($item->pos) ? $item->pos : intval(set_value("pos"))),
                                            'class' => 'form-control',
                                            'placeholder' => translate('pos'),
                                        ];

                                        echo form_input($inputData);
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error("pos", $validation); ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleSelectRounded0"><?= translate('show_in_menu') ?>
                                            <code>*</code></label>
                                        <?php

                                        $inputData = [
                                            'name' => "show",
                                            'id' => 'show',
                                            'class' => 'custom-select rounded-0',
                                        ];
                                        echo form_dropdown($inputData, [
                                            1 => translate('yes'),
                                            0 => translate('no'),
                                        ], (isset($item->show) ? $item->show : set_value('show')));
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error('show_in_menu', $validation) ?>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="exampleSelectRounded0"><?= translate('content') ?>
                                            <code>*</code></label>
                                        <?php

                                        $inputData = [
                                            'name' => "cid",
                                            'id' => 'cid',
                                            'class' => 'custom-select rounded-0',
                                        ];
                                        echo form_dropdown($inputData, (isset($contents) ? $contents : []), (isset($item->cid) ? $item->cid : set_value('cid')));
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error('content', $validation) ?>
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
                                                                        'data-lang' => "{$lang}",
                                                                        'value' => (isset($itemsMl[$lang]->title) ? $itemsMl[$lang]->title : set_value("title_{$lang}")),
                                                                        'class' => 'form-control menu-url',
                                                                        'placeholder' => translate('title'),
                                                                    ];


                                                                    echo form_input($inputData);
                                                                    ?>
                                                                    <div class="error-msg mb-3">
                                                                        <?= show_error("title_{$lang}", $validation); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?= translate('url') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [
                                                                        'type' => 'text',
                                                                        'name' => "url_{$lang}",
                                                                        'value' => (isset($itemsMl[$lang]->url) ? $itemsMl[$lang]->url : set_value("url_{$lang}")),
                                                                        'class' => 'form-control ',
                                                                        'placeholder' => translate('url'),
                                                                    ];
                                                                    if (!$id) {
                                                                        $inputData['readonly'] = 'readonly';
                                                                    }
                                                                    echo form_input($inputData);
                                                                    ?>
                                                                    <div class="error-msg mb-3">
                                                                        <?= show_error("url_{$lang}", $validation); ?>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?= translate('meta_title') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [
                                                                        'type' => 'text',
                                                                        'name' => "meta_title_{$lang}",

                                                                        'value' => (isset($itemsMl[$lang]->meta_title) ? $itemsMl[$lang]->meta_title : set_value("meta_title_{$lang}")),
                                                                        'class' => 'form-control',
                                                                        'placeholder' => translate('meta_title'),
                                                                    ];
                                                                    echo form_input($inputData);
                                                                    ?>
                                                                    <div class="error-msg mb-3">
                                                                        <?= show_error("meta_title_{$lang}", $validation); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?= translate('meta_keywords') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [
                                                                        'type' => 'text',
                                                                        'name' => "meta_keywords_{$lang}",

                                                                        'value' => (isset($itemsMl[$lang]->meta_keywords) ? $itemsMl[$lang]->meta_keywords : set_value("meta_keywords_{$lang}")),
                                                                        'class' => 'form-control',
                                                                        'placeholder' => translate('meta_keywords'),
                                                                    ];
                                                                    echo form_input($inputData);
                                                                    ?>
                                                                    <div class="error-msg mb-3">
                                                                        <?= show_error("meta_keywords_{$lang}", $validation); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?= translate('meta_desc') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [

                                                                        'name' => "meta_desc_{$lang}",
                                                                        'value' => (isset($itemsMl[$lang]->meta_desc) ? $itemsMl[$lang]->meta_desc : set_value("meta_desc_{$lang}")),
                                                                        'class' => ' text-area form-control ' . (isset($item->type) && $item->type == LABEL_CONTENT ? 'editor' : ''),
                                                                        'placeholder' => translate('meta_desc')
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


<script type="text/javascript">
    $(document).ready(function () {

        $('#type').change(function () {
            if ($(this).val() == '<?= LABEL_INPUT ?>') {
                $('.text-area').removeClass('editor');
                tinymce.remove();
            } else {
                $('.text-area').addClass('editor');
                init_tinymce();
            }
        })

    })
</script>