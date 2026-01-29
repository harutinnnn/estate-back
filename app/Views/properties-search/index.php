<div class="main-content">
    <section class="properties-header mt-30">


        <ul class="breadcrumb">
            <li>
                <a href="/index.php">Home</a>
            </li>
            <li>
                <span>Properties</span>
            </li>
        </ul>

        <div class="properties-title-container">
            <h1 class="mt-10">Properties list</h1>

            <div class="properties-filter-toggle ml-auto">
                <div class="toggle-icon"><i class="fa-solid fa-filter"></i></div>
                <div class="toggle-text flex flex-align-items-center">
                    <span class="color-white fs-16 fw-700">Show filters</span>
                </div>
            </div>
        </div>
    </section>


    <section class="properties-container">

        <div class="properties-sidebar">
            <div class="properties-filter">

                <div class="properties-filter-inner sidebar-block">
                    <div class="filter-mobile-head">
                        <h3>Advanced search</h3>
                        <i class="fa-solid fa-xmark ml-auto"></i>
                    </div>

                    <div class="filter-input-row mb-10 with-icon">
                        <input type="text" placeholder="keyword" class="form-input">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <div class="filter-input-row mb-10 with-icon">
                        <input type="text" placeholder="Location" class="form-input">
                        <i class="fa-solid fa-location-pin"></i>
                    </div>


                    <div class="filter-input-row mb-10">
                        <select name="category" id="category" class="form-input">
                            <option>Property type</option>
                            <?php use App\Libraries\PropertyParameters;

                            if (isset($categories) && !empty($categories)): ?>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="filter-input-row mb-10">
                        <?= form_dropdown(
                            [
                                'class' => 'form-input',
                                'name' => 'bedrooms',
                                'id' => 'bedrooms',
                            ],
                            [0 => translate('bedrooms')] + PropertyParameters::getBadRooms()

                        ) ?>


                    </div>

                    <div class="filter-input-row mb-10">


                        <?= form_dropdown(
                            [
                                'class' => 'form-input',
                                'name' => 'bathrooms',
                                'id' => 'bathrooms',
                            ],
                            [0 => translate('bathrooms')] + PropertyParameters::getBadRooms()

                        ) ?>
                    </div>

                    <div class="filter-input-row mb-10">
                        <?= form_dropdown(
                            [
                                'class' => 'form-input',
                                'name' => 'garages',
                                'id' => 'garages',
                            ],
                            [0 => translate('garage')] + PropertyParameters::getGarages(),
                            $article->garages ?? null
                        ) ?>

                    </div>
                    <div class="filter-input-row mb-10">
                        <select name="sort-by" id="sort-by" class="form-input">
                            <option>Year built</option>
                            <?php for ($i = date('Y'); $i > date('Y') - 20; $i--): ?>
                                <option><?= $i ?></option>
                            <?php endfor; ?>
                            <?php ?>
                        </select>
                    </div>

                    <div class="filter-input-row mb-10 relative">
                        <div class="advanced-input" id="price-range">
                            Price range <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                        <div class="price-range-hidden" id="price-range-hidden">

                            <div class="range-values">
                                <span id="minVal"></span> <span id="maxVal" class="ml-auto"></span>
                            </div>
                            <div id="rangeSlider"></div>
                        </div>
                    </div>


                    <div class="filter-input-row mb-10">
                        <input type="text" placeholder="Area min" class="form-input">
                    </div>
                    <div class="filter-input-row mb-10">
                        <input type="text" placeholder="Area max" class="form-input">
                    </div>

                    <div class="filter-input-row mb-10">
                        <div class="advanced-input" id="advanced-filters-list">
                            Advanced <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>

                        <div class="advanced-search-container-list">
                            <div class="filter-amenities">
                                <ul>
                                    <?php if (isset($amenities) && !empty($amenities)): ?>
                                        <?php foreach ($amenities as $amenity): ?>
                                            <li>
                                                <label for="amenities-air">
                                                    <input type="checkbox" name="amenities[]"
                                                           value="<?= $amenity->id ?>" id="amenities-air"/>
                                                    <?= $amenity->title ?>
                                                </label>
                                            </li>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-block">
                    <h3 class="title">Featured Properties</h3>

                    <div class="side-featured-properties">
                        <div class="swiper" id="sideFeaturedProperties">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="property">
                                        <div class="thumb">
                                            <img src="/assets/images/tips/art-tip-1.jpg" alt="">

                                            <div class="slide-caption">

                                                <div class="caption-tags">
                                                    <div class="tag tag-featured">Featured</div>
                                                    <div class="tag tag-rent">For Rent</div>
                                                </div>
                                                <div class="caption-info">
                                                    <div class="caption-price">$16000/mo</div>
                                                    <h3><a href="#">Luxury Family Home</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="property">
                                        <div class="thumb">
                                            <img src="/assets/images/tips/art-tip-2.jpg" alt="">

                                            <div class="slide-caption">

                                                <div class="caption-tags">
                                                    <div class="tag tag-featured">Featured</div>
                                                    <div class="tag tag-rent">For Rent</div>
                                                </div>
                                                <div class="caption-info">
                                                    <div class="caption-price">$16000/mo</div>
                                                    <h3><a href="#">Luxury Family Home</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="property">
                                        <div class="thumb">
                                            <img src="/assets/images/tips/art-tip-4.jpg" alt="">

                                            <div class="slide-caption">

                                                <div class="caption-tags">
                                                    <div class="tag tag-featured">Featured</div>
                                                    <div class="tag tag-rent">For Rent</div>
                                                </div>
                                                <div class="caption-info">
                                                    <div class="caption-price">$16000/mo</div>
                                                    <h3><a href="#">Luxury Family Home</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>

                <div class="sidebar-block">
                    <h3 class="title">Categories Property</h3>
                    <ul class="categories-property">
                        <li>
                            <span>
                                <i class="fas fa-angle-right"></i>
                                <a href="#">Apartment</a>
                            </span>
                            <span>9 properties</span>
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-angle-right"></i>
                                <a href="#">Condo</a>
                            </span>
                            <span>16 properties</span>
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-angle-right"></i>
                                <a href="#">Modern Villa</a>
                            </span>
                            <span>6 properties</span>
                        </li>
                    </ul>

                </div>


                <div class="sidebar-block">
                    <h3 class="title">Recently Viewed</h3>


                    <div class="recently-viewed-properties">
                        <div class="compact-property">
                            <a href="#">
                                <img src="/assets/images/tips/art-tip-1.jpg" alt="">
                            </a>
                            <div class="p-info">
                                <h3>
                                    <a href="#">
                                        Luxury Family Home
                                    </a>
                                </h3>
                                <div class="price">$19000/mo</div>
                                <div class="property-other-info">
                                    <div>
                                        Beds: 1
                                    </div>
                                    <div>
                                        Baths: 1
                                    </div>

                                    <div>
                                        Sq: 80
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="compact-property">
                            <a href="#">
                                <img src="/assets/images/tips/art-tip-2.jpg" alt="">
                            </a>
                            <div class="p-info">
                                <h3>
                                    <a href="#">
                                        Luxury Family Home
                                    </a>
                                </h3>
                                <div class="price">$12000/mo</div>
                                <div class="property-other-info">
                                    <div>
                                        Beds: 1
                                    </div>
                                    <div>
                                        Baths: 1
                                    </div>

                                    <div>
                                        Sq: 80
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="compact-property">
                            <a href="#">
                                <img src="/assets/images/tips/art-tip-4.jpg" alt="">
                            </a>
                            <div class="p-info">
                                <h3>
                                    <a href="#">
                                        Renovated Apartment
                                    </a>
                                </h3>
                                <div class="price">$11000/mo</div>
                                <div class="property-other-info">
                                    <div>
                                        Beds: 1
                                    </div>
                                    <div>
                                        Baths: 1
                                    </div>

                                    <div>
                                        Sq: 80
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>

        <div class="properties-list">


            <div class="properties-list-head">

                <div class="results-count">10 Search results</div>

                <div class="sort-by ml-auto">
                    <label for="sort-by">Sort by:</label>
                    <select name="sort-by" id="sort-by" class="form-input no-border fs-14 fw-700">
                        <option value="sale">Sale</option>
                        <option value="rent">Rend</option>
                        <option value="asc-alpha">A-Z</option>
                        <option value="asc-alpha">A-Z</option>
                        <option value="asc-price">Price low to high</option>
                        <option value="desc-price">Price high to low</option>
                    </select>
                </div>
            </div>


            <div class="properties-list-container">

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-1.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        Apartment
                    </div>
                    <h3><a href="/details.php">Luxury Family Home</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>

                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-2.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        House
                    </div>
                    <h3><a href="/details.php">Renovated Apartment</a></h3>
                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>


                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-4.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        Bungalow
                    </div>

                    <h3><a href="/details.php">Single Family Home</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>


                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>


                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>

                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-1.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>
                    <div class="property-type mt-10 mb-10">
                        Bungalow
                    </div>

                    <h3><a href="/details.php">Gorgeous Villa Bay View</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>

                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-1.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        Apartment
                    </div>
                    <h3><a href="/details.php">Luxury Family Home</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>

                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-2.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        House
                    </div>
                    <h3><a href="/details.php">Renovated Apartment</a></h3>
                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>


                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-4.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>

                    <div class="property-type mt-10 mb-10">
                        Bungalow
                    </div>

                    <h3><a href="/details.php">Single Family Home</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>


                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>


                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>

                </div>

                <div class="property">

                    <div class="thumb">
                        <img src="/assets/images/tips/art-tip-1.jpg" alt="">

                        <div class="slide-caption">

                            <div class="caption-tags">
                                <div class="tag tag-featured">Featured</div>
                                <div class="tag tag-rent">For Rent</div>
                            </div>

                            <div class="caption-info">
                                <div class="caption-price">$16000/mo</div>
                                <i class="fa-solid fa-heart-circle-check"></i>
                            </div>

                        </div>
                    </div>
                    <div class="property-type mt-10 mb-10">
                        Bungalow
                    </div>

                    <h3><a href="/details.php">Gorgeous Villa Bay View</a></h3>

                    <div class="address">
                        <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                    </div>

                    <div class="property-other-info">
                        <div>
                            Beds: 1
                        </div>
                        <div>
                            Baths: 1
                        </div>

                        <div>
                            Sq: 80
                        </div>
                    </div>

                    <div class="line mt-20 mb-20"></div>

                    <div class="property-publisher">
                        <img src="/assets/images/icons/man.png" alt="">
                        <div class="publisher-info fs-14">
                            <div class="publisher-name">Sarah Taylor</div>
                            <div class="publish-date ml-auto">March 10, 2023</div>
                        </div>
                    </div>
                </div>

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>

<script>
    const slider = document.getElementById("rangeSlider");

    noUiSlider.create(slider, {
        start: [150000, 799999],      // initial values
        connect: true,        // fill color between handles
        range: {
            min: 0,
            max: 999999
        }
    });

    const minVal = document.getElementById("minVal");
    const maxVal = document.getElementById("maxVal");

    slider.noUiSlider.on("update", (values) => {
        minVal.innerHTML = '$' + Math.round(values[0]);
        maxVal.innerHTML = '$' + Math.round(values[1]);
    });

    slider.noUiSlider.on("end", function (values, handle) {
        console.log("Drag ended on handle:", handle);
        console.log("Selected value:", values[handle]);
    });
</script>