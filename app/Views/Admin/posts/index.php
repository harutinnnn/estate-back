<div class="content-wrapper" style="min-height: 1302.25px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= translate($mod) ?> <?= translate('list') ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/<?= ADMIN_LINK ?>"><?= translate('dashboard') ?></a></li>
                        <li class="breadcrumb-item active"><?= translate($mod) ?> <?= translate('list') ?></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="/<?= ADMIN_LINK ?>/<?= $mod ?>/edit/0">
                                    <button class="btn btn-success"><?= translate('add_new') ?></button>
                                </a>
                            </h3>

                            <div class="card-tools">
                                <?= view('Admin/partial/search_block') ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>

                                    <th><?= translate('title') ?></th>
                                    <th><?= translate('category') ?></th>
                                    <th><?= translate('language') ?></th>
                                    <th><?= translate('status') ?></th>
                                    <th><?= translate('date') ?></th>
                                    <th><?= translate('img') ?></th>
                                    <th class="text-right"><?= translate('actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($items) && !empty($items)): ?>
                                    <?php foreach ($items as $item): ?>
                                        <tr>

                                            <td><?= $item->title ?></td>
                                            <td><?= isset($categories[$item->cat_id]) ? $categories[$item->cat_id] : '' ?></td>
                                            <td>
                                                <div style="display: flex;flex-direction: column;gap: 5px">
                                                    <a href="/<?= ADMIN_LINK ?>/posts/edit/<?= $item->id ?>"
                                                       class="btn btn-success flex btn-sm flex-center-v flex-center-h">
                                                        <?= isset($langList[$item->lang]) ? $langList[$item->lang] : '' ?>
                                                    </a>
                                                    <?php foreach ($langList as $lKey => $lVal): ?>
                                                        <?php if ($lKey != $item->lang): ?>

                                                            <?php if (isset($item->nodes[$lKey])): ?>
                                                                <a href="/<?= ADMIN_LINK ?>/posts/edit/<?= $item->nodes[$lKey]->id ?>"
                                                                   class="btn btn-success flex btn-sm flex-center-v flex-center-h">
                                                                    <?= $lVal ?>
                                                                </a>
                                                            <?php else: ?>

                                                                <a href="/<?= ADMIN_LINK ?>/posts/edit/0?related_id=<?= $item->id ?>&lang=<?= $lKey ?>"
                                                                   class="btn btn-warning flex btn-sm flex-center-v flex-center-h">
                                                                    <i class="fas fa-plus"></i>&nbsp;&nbsp;</b><?= $lVal ?>
                                                                </a>
                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if (isset($item->img) && is_file(FCPATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $mod . DIRECTORY_SEPARATOR . $item->img)): ?>

                                                    <a href="/uploads/<?= $mod ?>/<?= $item->img ?>"
                                                       data-toggle="lightbox"
                                                       data-title="<?= $item->title ?>">

                                                        <img src="/uploads/<?= $mod ?>/<?= $item->img ?>" alt=""
                                                             class="img-thumbnail lightbox" style="height: 100px">
                                                    </a>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="tag"><?= $item->created_at ?></span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success"><?= $item->status ? 'Approved' : 'Pending' ?></span>
                                            </td>
                                            <td class="text-right quick-actions">

                                                <a href="/<?= ADMIN_LINK ?>/<?= $mod ?>/edit/<?= $item->id ?>">
                                                    <button class="btn btn-success">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </a>

                                                <a href="/<?= ADMIN_LINK ?>/<?= $mod ?>/toggle/<?= $item->id ?>">
                                                    <button class="btn btn-<?= $item->status ? 'info' : 'warning' ?>">
                                                        <i class="far fa-lightbulb"></i>
                                                    </button>
                                                </a>

                                                <a class="delete-item-row"
                                                   data-href="/<?= ADMIN_LINK ?>/<?= $mod ?>/delete/<?= $item->id ?>">
                                                    <button class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <?= isset($pager) && $pager ? $pager->links('default', 'bootstrap_full') : '' ?>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>