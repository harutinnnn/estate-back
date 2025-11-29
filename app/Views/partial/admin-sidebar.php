<div class="admin-nav">

    <div class="sidebar-head">
        <a href="/index.php" class="fw-700 flex flex-align-items-center">
            <img src="/assets/images/logo.png" alt="FindHouse">
            <span class="fs-28 mt-5">FindHouse</span>
        </a>
    </div>

    <div class="sidebar-nav">
        <h4 class="fs-">Main</h4>
        <ul>

            <li class="<?= isset($activeMenu) && $activeMenu == 'dashboard' ? 'active' : '' ?>">
                <a href="/<?= $_lang ?>/user/dashboard"><i class="fa-solid fa-layer-group"></i> Dashboard</a>
            </li>

            <li class="<?= isset($activeMenu) && $activeMenu == 'create' ? 'active' : '' ?>">
                <a href="/<?= $_lang ?>/user/create"><i class="fa-solid fa-plus"></i> Create</a>
            </li>
            <li class="<?= isset($activeMenu) && $activeMenu == 'messages' ? 'active' : '' ?>">
                <a href="/<?= $_lang ?>/user/messages"><i class="fa-solid fa-envelope"></i> Messages</a>
            </li>

            <li class="<?= isset($activeMenu) && $activeMenu == 'properties' ? 'active' : '' ?>">
                <a href="/<?= $_lang ?>/user/properties"><i class="fa-solid fa-house-chimney-window"></i> My properties</a>
            </li>

            <li class="<?= isset($activeMenu) && $activeMenu == 'favorites' ? 'active' : '' ?>">
                <a href="/<?= $_lang ?>/user/favorites"><i class="fa-solid fa-heart"></i> Favorites</a>
            </li>

            <li class="<?= isset($activeMenu) && $activeMenu == 'package' ? 'active' : '' ?>">
                <a href="#"><i class="fa-solid fa-box-open"></i> Package</a>
            </li>

            <li class="<?= isset($activeMenu) && $activeMenu == 'profile' ? 'active' : '' ?>">
                <a href="#"><i class="fa-regular fa-id-card"></i> Profile</a>
            </li>

            <li>
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </li>

        </ul>
    </div>

</div>