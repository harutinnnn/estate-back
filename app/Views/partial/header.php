<header>

    <div class="inner-header">

        <div class="header-burger-menu">
            <span></span>
        </div>

        <div class="mobile-menu">
            <div class="inner-mobile-menu">

                <div class="mobile-menu-header">
                    <a href="/<?= $_lang ?>">
                        <img src="/assets/images/logo.png" alt="FindHouse">
                        <span class="fs-28 mt-5">FindHouse</span>
                    </a>
                </div>
                <div class="mobile-menu-body">
                    <ul class="nav">
                        <li class="active"><a href="/<?= $_lang ?>" class="active">Home</a></li>
                        <li><a href="/<?= $_lang ?>/about">About Us</a></li>
                        <li class=" ">
                            <a href="javascript:void(0)">Pages
                                <i class="fa-solid fa-chevron-down"></i>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <ul class="sub-nav">
                                <li><a href="#">Page 1</a></li>
                                <li><a href="#">Page 2</a></li>
                                <li><a href="#">Page 3</a></li>
                                <li><a href="#">Page 4</a></li>
                                <li><a href="#">Page 5</a></li>
                                <li><a href="#">Page 6</a></li>
                                <li><a href="#">Page 7</a></li>
                                <li><a href="#">Page 8</a></li>
                            </ul>
                        </li>
                        <li><a href="/<?= $_lang ?>/properties">Properties</a></li>
                        <li><a href="/<?= $_lang ?>/blog">Blog</a></li>
                        <li><a href="/<?= $_lang ?>/contact">Contact</a></li>
                        <li class="user-nav-item">
                            <a href="/<?= $_lang ?>/sign-in">
                                <span>Login/Register</span> <i class="fa-regular fa-user"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

        <div class="header-logo">
            <a href="/<?= $_lang ?>/" class="fw-700 flex flex-align-items-center">
                <img src="/assets/images/logo.png" alt="FindHouse">
                <span class="fs-28 mt-5">FindHouse</span>
            </a>
        </div>
        <form action="">
            <div class="header-search">
                <input type="text" name="search-text" placeholder="What are you looking for?"/>
                <button>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <div class="header-nav">
            <ul class="nav">
                <li><a href="/<?= $_lang ?>/about">About Us</a></li>
                <li><a href="/<?= $_lang ?>/properties">Properties</a></li>
                <li><a href="/<?= $_lang ?>/blog">Blog</a></li>
                <li><a href="/<?= $_lang ?>/contact">Contact</a></li>
                <li class="user-nav-item">
                    <?php if (isset($userData->id) && $userData->id): ?>
                        <a href="/<?= $_lang ?>/sign-out">
                            <span>Sign Out</span>
                        </a>

                        <a href="/<?= $_lang ?>/profile">
                            <span><?= $userData->name ?></span> <i class="fa-regular fa-user"></i>
                        </a>
                    <?php else: ?>
                        <a href="/<?= $_lang ?>/sign-in">
                            <span>Login/Register</span>
                        </a>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
        <div class="header-create-btn">
            <a href="/<?= $_lang ?>/user/create">
                <button class="btn br-25"><i class="fa-solid fa-plus"></i> <span>Create Listing</span></button>
            </a>
        </div>
    </div>
</header>