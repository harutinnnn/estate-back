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

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title"><?= isset($id) && $id ? 'Edit' : 'Create' ?> <?= translate('form') ?></h3>
                        </div>

                        <form method="post" id="post-form" enctype="multipart/form-data">

                            <div class="card-body">


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="language"><?= translate('category') ?> <code>*</code></label>
                                        <?php
                                        $catId = (isset($item->cat_id) ? $item->cat_id : set_value('cat_id'));



                                        $inputData = [
                                            'name' => "cat_id",
                                            'id' => 'cat_id',
                                            'class' => 'custom-select rounded-0',
                                        ];

                                        if (isset($related_item->cat_id)) {
                                            $catId = $related_item->cat_id;
                                        }

                                        echo form_dropdown($inputData, $categories, $catId);
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error('cat_id', $validation) ?>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="language"><?= translate('language') ?> <code>*</code></label>

                                        <input type="hidden" name="related_id" value="<?= $related_id ?? 0 ?>">

                                        <?php

                                        $selectedLang = (isset($item->lang) ? $item->lang : set_value('lang'));
                                        $inputData = [
                                            'name' => "lang",
                                            'id' => 'lang',
                                            'class' => 'custom-select rounded-0',
                                        ];


                                        if (isset($lang) && !in_array($lang, $langList) && isset($related_id) && $related_id) {

                                            $selectedLang = $lang;

                                        } else {

                                            if ($id) {
                                                $inputData['disabled'] = 'disabled';
                                            }
                                        }
                                        echo form_dropdown($inputData, $langList, $selectedLang);
                                        ?>
                                        <div class="error-msg mb-3">
                                            <?= show_error('lang', $validation) ?>
                                        </div>
                                    </div>

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

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">
                                            <?= translate('title') ?></label>
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
                                </div>

                                <?= view('/Admin/partial/image_input', ['imageFieldName' => 'img', 'imageBoxId' => rand(9999, 999999)]) ?>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">
                                            <?= translate('content') ?>
                                        </label>

                                        <div id="editorjs"></div>

                                        <input type="hidden" name="editor_json_data" id="editor_json_data">
                                        <?= show_error("editor_json_data", $validation); ?>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" id="saveBtn" name="submit" value="1"
                                        class="btn btn-primary"><?= translate($id ? 'update' : 'create') ?></button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

    const editorData = <?= $editor_json_data ?>;

</script>