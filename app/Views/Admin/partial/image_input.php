<div class="row">
    <div class="form-group">
        <label for="<?= $imageFieldName ?>"><?= translate('img') ?></label>
        <div class="image-container">
            <div class="input-group">
                <div class="custom-file">

                    <?php
                    $inputData = [
                        'type' => 'file',
                        'name' => $imageFieldName,
                        "onchange" => "ReaderImageDisplay(this.files, 'imageBoxId" . $imageBoxId . "',250)",
                        'id' => $imageFieldName,
                        'class' => 'custom-file-input',
                        'placeholder' => translate('img'),
                    ];

                    if (isset($isCropper) && $isCropper) {
                        $inputData['onchange'] = "doImageCrop(this, 'imageBoxId" . $imageBoxId . "',1920,1080)";
                    } else {
                        $inputData['onchange'] = "ReaderImageDisplay(this.files, 'imageBoxId" . $imageBoxId . "',250)";
                    }
                    echo form_input($inputData);

                    ?>
                    <label class="custom-file-label"
                           for="exampleInputFile"><?= translate('choose_file') ?></label>

                </div>

            </div>
            <div class="error-msg mb-3">
                <?= show_error($imageFieldName, $validation); ?>
            </div>
        </div>

        <div class="mt-3 image-box" id="imageBoxId<?= $imageBoxId ?>">
            <?php if (isset($item->{$imageFieldName}) && is_file(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $mod . DIRECTORY_SEPARATOR . $item->{$imageFieldName})): ?>
                <a href="/uploads/<?= $mod ?>/<?= $item->{$imageFieldName} ?>" data-toggle="lightbox"
                   data-title="Menu image">
                    <img src="/uploads/<?= $mod ?>/<?= $item->{$imageFieldName} ?>" alt=""
                         class="img-thumbnail uploaded-img-width">
                </a>
                <i class="fas fa-trash-alt btn btn-info"
                   onclick="removeImage(<?= $id ?>,'<?= $mod ?>','<?= $imageFieldName ?>',this,'imageBoxId<?= $imageBoxId ?>')"></i>
            <?php endif; ?>
        </div>
    </div>

</div>

