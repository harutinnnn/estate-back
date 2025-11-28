<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/<?= ADMIN_LINK ?>" class="brand-link">
        <img src="/assets/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php if (isset($menu) && !empty($menu)): ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <?php foreach ($menu as $menuItem): ?>
                        <?php
                        $slug = service('uri')->getSegment(2);


                        ?>
                        <?php if ($menuItem['link'] == null && isset($menuItem['nodes']) && !empty($menuItem['nodes'])): ?>

                            <li class="nav-item <?= is_current_menu_in_child($slug, $menuItem['nodes']) ? 'menu-open' : '' ?>">
                                <a href="javascript:void(0)"
                                   class="nav-link <?= is_current_menu_in_child($slug, $menuItem['nodes']) ? 'menu-open active' : '' ?>">
                                    <i class="right fas fa-angle-left"></i>
                                    <p>
                                        <?= $menuItem['title'] ?>
                                        <i class="<?= $menuItem['icon'] ?>"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <?php foreach ($menuItem['nodes'] as $node): ?>
                                        <li class="nav-item">
                                            <a href="<?= '/' . ADMIN_LINK . $node['link'] ?>"
                                               class="nav-link <?= '/' . $slug == $node['link'] ? 'active' : '' ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?= $node['title'] ?></p>
                                            </a>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            </li>

                        <?php else: ?>

                            <li class="nav-item">
                                <a href="<?= '/' . ADMIN_LINK . $menuItem['link'] ?>"
                                   class="nav-link <?= $slug == trim($menuItem['link'], '/') ? 'active' : '' ?>">
                                    <i class="<?= $menuItem['icon'] ?>"></i>
                                    <p>
                                        <?= $menuItem['title'] ?>
                                    </p>
                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
