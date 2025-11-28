<form>
    <div class="input-group input-group-sm" style="width: 250px;">
        <span class="input-group-append">
            <button onclick="location.href='/<?= ADMIN_LINK ?>/<?= $mod ?>/index/'"
                    type="button" class="btn btn-default">
                <?= translate('reset') ?>
                &nbsp;<i class="fa fa-ban"></i>
            </button>
        </span>
        <?php
        $inputData = [
            'type' => 'text',
            'name' => "table_search",

            'value' => request()->getGet('table_search'),
            'class' => 'form-control float-right',
            'placeholder' => translate('search'),
        ];

        echo form_input($inputData);
        ?>
        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
</form>