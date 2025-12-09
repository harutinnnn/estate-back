<div class="main-content">

    <section class="properties-header">

        <div class="properties-title-container">
            <h1 class="">Add New Property</h1>
        </div>
    </section>

    <section class="admin-section">
        <div class="admin-section-block mb-30">
            <h2 class="mb-30">Choose property type</h2>


            <form method="post">
                <div class="form-input-row">
                    <label for="property-type">Property Type</label>
                    <?= form_dropdown(
                        [
                            'class' => 'form-input',
                            'name' => 'property-type',
                            'id' => 'property-type',
                        ],
                        $categories,
                    ) ?>
                    <div class="error-msg mb-3">
                        <?= show_error('status', $validation) ?>
                    </div>

                </div>

                <div class="form-input-row">
                    <button class="btn" name="submit" value="1">Next</button>
                </div>

            </form>


        </div>

    </section>


</div>