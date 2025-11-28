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
                        <form method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleSelectRounded0"><?= translate('type') ?> <code>*</code></label>
                                    <?php

                                    $inputData = [
                                        'name' => "type",
                                        'id' => 'type',
                                        'class' => 'custom-select rounded-0',
                                    ];
                                    echo form_dropdown($inputData, (isset($label_types) ? $label_types : []), (isset($item->type) ? $item->type : set_value('type')));
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error('type', $validation) ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?= translate('key') ?></label>
                                    <?php
                                    $inputData = [
                                        'type' => 'text',
                                        'name' => "key",

                                        'value' => (isset($item->key) ? $item->key : set_value("key")),
                                        'class' => 'form-control',
                                        'placeholder' => 'Key',
                                    ];
                                    if ($id) {
                                        $inputData['readonly'] = 'readonly';
                                    }

                                    echo form_input($inputData);
                                    ?>
                                    <div class="error-msg mb-3">
                                        <?= show_error("key", $validation); ?>
                                    </div>
                                </div>


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
                                                                        <?= translate('text') ?>
                                                                        (<?= $langTitle ?>)</label>
                                                                    <?php
                                                                    $inputData = [

                                                                        'name' => "text_{$lang}",
                                                                        'value' => (isset($itemsMl[$lang]->text) ? $itemsMl[$lang]->text : set_value("text_{$lang}")),
                                                                        'class' => ' text-area form-control ' . (isset($item->type) && $item->type == LABEL_CONTENT ? 'editor' : ''),
                                                                        'placeholder' => translate('text')
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