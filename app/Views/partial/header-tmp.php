<header>

    <div class="inner-header">

        <div class="header-burger-menu">
            <span></span>
        </div>

        <div class="mobile-menu">
            <div class="inner-mobile-menu">

                <div class="mobile-menu-header">
                    <a href="/index.php">
                        <img src="/assets/images/logo.png" alt="FindHouse">
                        <span class="fs-28 mt-5">FindHouse</span>
                    </a>
                </div>
                <div class="mobile-menu-body">
                    <ul class="nav">
                        <li class="active"><a href="/index.php" class="active">Home</a></li>
                        <li><a href="/about.html">About Us</a></li>
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
                        <li><a href="/properties.php">Properties</a></li>
                        <li><a href="/blog.html">Blog</a></li>
                        <li><a href="/contact.html">Contact</a></li>
                        <li class="user-nav-item">
                            <a href="#">
                                <span>Login/Register</span> <i class="fa-regular fa-user"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

        <div class="header-logo">
            <a href="/index.php" class="fw-700 flex flex-align-items-center">
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
                <li class="active"><a href="/index.php" class="active">Home</a></li>
                <li><a href="/about.html">About Us</a></li>
                <li class="active">
                    <a href="javascript:void(0)">Pages <i class="fa-solid fa-chevron-down"></i></a>
                    <ul class="sub-nav">
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                        <li><a href="#">Page 4</a></li>
                        <li><a href="#">Page 5</a></li>
                    </ul>
                </li>
                <li><a href="/properties.php">Properties</a></li>
                <li><a href="/blog.html">Blog</a></li>
                <li><a href="/contact.html">Contact</a></li>
                <li class="user-nav-item">
                    <?php if (isset($userData->id) && $userData->id): ?>
                        <a href="/sign-out">
                            <span>Sign Out</span> <i class="fa-regular fa-user"></i>
                        </a>
                    <?php else: ?>
                        <a href="/sign-in">
                            <span>Login/Register</span> <i class="fa-regular fa-user"></i>
                        </a>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
        <div class="header-create-btn">
            <a href="/user/create">
                <button class="btn br-25"><i class="fa-solid fa-plus"></i> <span>Create Listing</span></button>
            </a>
        </div>
    </div>
</header>