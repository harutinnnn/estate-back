<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/<?= $_lang ?>"><img src="/assets/img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <ul class="language-list">
                                    <?php foreach ($langList as $langKey => $langTitle): ?>

                                            <li class="<?= $langKey == $_lang  ? 'active-lang' : ''?>">
                                                <?php if (isset($langPageLinks[$langKey])): ?>
                                                    <a href="/<?= $langPageLinks[$langKey] ?>">
                                                        <img src="/assets/flags/<?= $langKey ?>-l.png" alt="<?= $langTitle ?>">
                                                    </a>
                                                <?php else: ?>
                                                    <a href="/<?= $langKey ?>">
                                                        <img src="/assets/flags/<?= $langKey ?>-l.png" alt="<?= $langTitle ?>" >
                                                    </a>
                                                <?php endif; ?>
                                            </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="/<?= $_lang ?>"><img src="/assets/img/core-img/logo.png" alt=""></a>
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <?php if (isset($newsCategories) && !empty($newsCategories)): ?>
                                    <?php foreach ($newsCategories as $newsCategory): ?>
                                        <li  class="">
                                            <a href="/<?= $_lang ?>/posts/<?= $newsCategory->slug ?>"
                                              >
                                                <?= $newsCategory->title ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->