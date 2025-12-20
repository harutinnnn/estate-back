<?php

use App\Models\ArticleModel;

?>
<div class="main-content">

    <section class="properties-header">

        <div class="properties-title-container">
            <h1 class=""><?= translate('add_new_property') ?></h1>
        </div>
    </section>

    <section class="admin-section">
        <div class="admin-section-block mb-30">
            <h2 class="mb-30"><?= translate('choose_property_type') ?></h2>


            <form method="post">
                <div class="col-2-grid">
                    <div class="form-input-row">

                        <label for="property-type"><?= translate('property_type') ?></label>
                        <?= form_dropdown(
                            [
                                'class' => 'form-input',
                                'name' => 'property-type',
                                'id' => 'property-type',
                            ],
                            $categories,
                        ) ?>
                        <div class="error-msg mb-3">
                            <?= show_error('property-type', $validation) ?>
                        </div>

                    </div>

                    <div class="form-input-row">

                        <label for="property-rent-type"><?= translate('property_deal_type') ?></label>
                        <?= form_dropdown(
                            [
                                'class' => 'form-input',
                                'name' => 'property-rent-type',
                                'id' => 'property-rent-type',
                            ],
                            ArticleModel::getPropertyTypes(),
                        ) ?>
                        <div class="error-msg mb-3">
                            <?= show_error('property-rent-type', $validation) ?>
                        </div>

                    </div>

                </div>

                <div class="form-input-row">
                    <button class="btn" name="submit" value="1">Next</button>
                </div>

            </form>


        </div>

    </section>


</div>