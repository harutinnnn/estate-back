<div class="content-wrapper" style="min-height: 1302.25px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= translate('section') ?> <?= $section->title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/<?= ADMIN_LINK ?>"><?= translate('dashboard') ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= translate($mod) ?> <?= translate('list') ?></li>
                        </ol>
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
                                <a href="/<?= ADMIN_LINK ?>/<?= $mod ?>/edit_menu/<?= $sectionId ?>/0">
                                    <button class="btn btn-success"><?= translate('add_new') ?></button>
                                </a>
                            </h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body position-relative">

                            <div class="sort-save-loader"></div>

                            <div class="box-body table-responsive">
                                <ol class="sortable todo-list">
                                    <?php if (isset($items) && !empty($items)): ?>
                                        <?php foreach ($items as $item): ?>
                                            <li data-id="<?= $item->id ?>" data-title="<?= $item->title ?>">
                                                <div>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                                    <span class="disclose"><span></span></span>
                                                    <?= $item->title ?>

                                                    <div class="options quick-actions">

                                                        <a title="<?php echo translate('edit'); ?>"
                                                           href="<?= site_url("admin/{$mod}/edit_menu/{$sectionId}/{$item->id}"); ?>"
                                                           class="edit">
                                                            <button class="btn btn-sm btn-success">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                        </a>

                                                        <a href="<?= site_url("admin/{$mod}/menu_toggle/{$sectionId}/{$item->id}"); ?>"
                                                           class="toggle <?= $item->status == 0 ? 'toggle_pending' : ''; ?>">
                                                            <button class="btn btn-sm btn-<?= $item->status ? 'info' : 'warning' ?>">
                                                                <i class="far fa-lightbulb"></i>
                                                            </button>
                                                        </a>

                                                        <a title="<?php translate('trash'); ?>" class="delete-item-row"
                                                           data-href="<?= site_url("admin/{$mod}/menu_remove/{$sectionId}/{$item->id}"); ?>">
                                                            <button class="btn btn-sm btn-danger">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php if (isset($item->children) && !empty($item->children)): ?>
                                                    <ol>
                                                        <?php foreach ($item->children as $child): ?>
                                                            <li data-id="<?= $child->id ?>"
                                                                data-title="<?= $child->title ?>">
                                                                <div>
                                                            <span class="handle">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </span>
                                                                    <span class="disclose"><span></span></span>
                                                                    <?= $child->title ?>

                                                                    <div class="options quick-actions">
                                                                        <a title="<?php echo translate('edit'); ?>"
                                                                           href="<?= site_url("admin/{$mod}/edit_menu/{$sectionId}/{$child->id}"); ?>"
                                                                           class="edit">
                                                                            <button class="btn btn-sm btn-success">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </button>
                                                                        </a>

                                                                        <a href="<?= site_url("admin/{$mod}/menu_toggle/{$sectionId}/{$child->id}"); ?>"
                                                                           class="toggle <?= $child->status == 0 ? 'toggle_pending' : ''; ?>">
                                                                            <button class="btn btn-sm btn-<?= $child->status ? 'info' : 'warning' ?>">
                                                                                <i class="far fa-lightbulb"></i>
                                                                            </button>
                                                                        </a>

                                                                        <a title="<?php translate('trash'); ?>"
                                                                           class="delete-item-row"
                                                                           data-href="<?= site_url("admin/{$mod}/menu_remove/{$sectionId}/{$child->id}"); ?>">
                                                                            <button class="btn btn-sm btn-danger">
                                                                                <i class="far fa-trash-alt"></i>
                                                                            </button>
                                                                        </a>


                                                                    </div>

                                                                </div>

                                                                <?php if (isset($child->children) && !empty($child->children)): ?>
                                                                    <ol>
                                                                        <?php foreach ($child->children as $childI): ?>
                                                                            <li data-id="<?= $childI->id ?>"
                                                                                data-title="<?= $childI->title ?>">
                                                                                <div>
                                                                            <span class="handle">
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                            </span>
                                                                                    <span class="disclose"><span></span></span>
                                                                                    <?= $childI->title ?>

                                                                                    <div class="options quick-actions">


                                                                                        <a title="<?php echo translate('edit'); ?>"
                                                                                           href="<?= site_url("admin/{$mod}/edit_menu/{$sectionId}/{$childI->id}"); ?>"
                                                                                           class="edit">
                                                                                            <button class="btn btn-sm btn-success">
                                                                                                <i class="fas fa-pencil-alt"></i>
                                                                                            </button>
                                                                                        </a>

                                                                                        <a href="<?= site_url("admin/{$mod}/menu_toggle/{$sectionId}/{$childI->id}"); ?>"
                                                                                           class="toggle <?= $childI->status == 0 ? 'toggle_pending' : ''; ?>">
                                                                                            <button class="btn btn-sm btn-<?= $childI->status ? 'info' : 'warning' ?>">
                                                                                                <i class="far fa-lightbulb"></i>
                                                                                            </button>
                                                                                        </a>

                                                                                        <a title="<?php translate('trash'); ?>"
                                                                                           class="delete-item-row"
                                                                                           data-href="<?= site_url("admin/{$mod}/menu_remove/{$sectionId}/{$childI->id}"); ?>">
                                                                                            <button class="btn btn-sm btn-danger">
                                                                                                <i class="far fa-trash-alt"></i>
                                                                                            </button>
                                                                                        </a>

                                                                                    </div>

                                                                                </div>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ol>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                <?php endif; ?>

                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ol>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<script type="text/javascript">

    const sectionId = <?= $sectionId ?>;
</script>