<div class="main-content">

    <section class="properties-header ">

        <div class="properties-title-container">
            <h1 class="">My properties</h1>
        </div>
    </section>

    <section class="admin-section">


        <div class="user-properties">

            <div class="user-properties-inner">
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Info</th>
                        <th>Published date</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (isset($properties) && !empty($properties)): ?>
                        <?php foreach ($properties as $property): ?>
                            <tr>
                                <td>
                                    <div class="property-img">
                                        <div class="property-type"><?= translate($property->property_rent_type) ?></div>

                                        <?php if (isset($property->images[0])): ?>
                                            <img src="<?= $property->images[0]->img ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="property-info">
                                        <h3 class="fs-18"><?= $property->title ?></h3>
                                        <div class="prop-addr fs-14">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <?= $property->address ?>
                                        </div>
                                        <div class="prop-price fs-16 color-red">
                                            <?= $property->price ?>/mo
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <div class="prop-date fs-16">
                                        30 December, 2020
                                    </div>
                                </td>
                                <td>

                                    <div class="prop-status flex flex-justify-center flex-align-items-center">
                                        <div class="<?= $property->status ? 'published' : 'pending' ?> fs-14">
                                            <?= $property->status ? translate('published') : translate('pending') ?>
                                        </div>
                                    </div>

                                </td>
                                <td>

                                    <div class="prop-views flex flex-justify-center flex-align-items-center">
                                        <div class="bold">2,518</div>
                                    </div>

                                </td>
                                <td>

                                    <div class="prop-actions">
                                        <a href="#" class="prop-edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="prop-remove"
                                           onclick="removeUserProperty('<?= '/' . $_lang . '/user/remove-property/' . $property->id ?>','<?= translate('are you_sure_to_remove') ?>')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="pager mt-50">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">1</a>
                    </li>
                    <li class="active">
                        <span>2</span>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </section>
</div>