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

                                    <th><?= translate('key') ?></th>
                                    <th><?= translate('text') ?></th>
                                    <th><?= translate('type') ?></th>
                                    <th class="text-right"><?= translate('actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($items) && !empty($items)): ?>
                                    <?php foreach ($items as $item): ?>
                                        <tr>

                                            <td><?= $item->key ?></td>
                                            <td><?= $item->text ?></td>
                                            <td>
                                                <span class="tag tag-success"><?= translate($item->type) ?></span>
                                            </td>
                                            <td class="text-right quick-actions">

                                                <a href="/<?= ADMIN_LINK ?>/<?= $mod ?>/edit/<?= $item->id ?>">
                                                    <button class="btn btn-success">
                                                        <i class="fas fa-pencil-alt"></i>
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