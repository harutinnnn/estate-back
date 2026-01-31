<!doctype html>
<html lang="en">
<?php include('./partial/head.php') ?>
<body>

<?php include('./partial/header.php') ?>

<section class="home-header-section">
    <div class="home-header-inner-section">
        <h1 class="t-center">Enjoy The Finest Homes</h1>
        <div class="sub-text t-center">
            From as low as $10 per day with limited time offer discounts.
        </div>

        <div class="header-search-container">
            <div class="buy-or-rent">
                <div>
                    <input type="radio" id="buy" name="buy-rent" value="buy" checked/>
                    <label for="buy">Buy</label>
                </div>
                <div>
                    <input type="radio" id="rent" name="buy-rent" value="rent"/>
                    <label for="rent">Rent</label>
                </div>
            </div>

            <ul class="header-search-form">
                <li>
                    <input type="text" placeholder="Enter keyword" id="keyword" name="keyword"/>
                </li>

                <li>
                    <select name="property_type" id="property_type">
                        <option>Property type</option>
                        <option>Apartment</option>
                        <option>House</option>
                        <option>Garage</option>
                    </select>
                </li>
                <li>
                    <input type="text" placeholder="Location" id="location" name="location"/>
                </li>
                <li>
                    <select name="price" id="price">
                        <option value="">Price</option>
                    </select>
                </li>
                <li>
                    <div class="advanced-input" id="advanced-filters">
                        Advanced <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </li>
                <li>
                    <button class="btn">Search</button>
                </li>
            </ul>
        </div>
        <div class="advanced-search-container">
            <h3 class="mb-20">Amenities</h3>
            <div class="filter-amenities">
                <ul>
                    <li>
                        <label for="amenities-air">
                            <input type="checkbox" name="amenities" value="air" id="amenities-air"/>
                            Air conditionoing
                        </label>
                    </li>
                    <li>

                        <label for="amenities-barbeque">
                            <input type="checkbox" name="amenities" value="air" id="amenities-barbeque"/>
                            Barbeque
                        </label>
                    </li>
                    <li>

                        <label for="amenities-dryer">
                            <input type="checkbox" name="amenities" value="air" id="amenities-dryer"/>
                            Dryer
                        </label>
                    </li>
                    <li>

                        <label for="amenities-gym">
                            <input type="checkbox" name="amenities" value="air" id="amenities-gym"/>
                            Gym
                        </label>
                    </li>
                    <li>
                        <label for="amenities-laundry">
                            <input type="checkbox" name="amenities" value="air" id="amenities-laundry"/>
                            Laundry
                        </label>
                    </li>
                    <li>
                        <label for="amenities-lawn">
                            <input type="checkbox" name="amenities" value="air" id="amenities-lawn"/>
                            Lawn
                        </label>
                    </li>
                    <li>

                        <label for="amenities-microwave">
                            <input type="checkbox" name="amenities" value="air" id="amenities-microwave"/>
                            Microwave
                        </label>
                    </li>
                    <li>

                        <label for="amenities-refrigerator">
                            <input type="checkbox" name="amenities" value="air" id="amenities-refrigerator"/>
                            Refrigerator
                        </label>
                    </li>
                    <li>

                        <label for="amenities-sauna">
                            <input type="checkbox" name="amenities" value="air" id="amenities-sauna"/>
                            Sauna
                        </label>
                    </li>
                    <li>
                        <label for="amenities-swimming-pool">
                            <input type="checkbox" name="amenities" value="air" id="amenities-swimming-pool"/>
                            Swimming Pool
                        </label>
                    </li>
                    <li>
                        <label for="amenities-wifi">
                            <input type="checkbox" name="amenities" value="air" id="amenities-tv-cable"/>
                            TV Cable
                        </label>
                    </li>
                    <li>
                        <label for="amenities-wifi">
                            <input type="checkbox" name="amenities" value="air" id="amenities-wifi"/>
                            WIFI
                        </label>
                    </li>
                    <li>
                        <label for="amenities-wifi">
                            <input type="checkbox" name="amenities" value="air" id="amenities-washer"/>
                            Washer
                        </label>
                    <li>
                        <label for="amenities-wifi">
                            <input type="checkbox" name="amenities" value="air" id="amenities-window-coverings"/>
                            Window Coverings
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="featured-properties-slider">

    <h2 class="section-title t-center">Featured Properties</h2>
    <p class="section-sub-title t-center">
        Handpicked properties by our team.
    </p>

    <div class="slider-container">
        <div class="swiper" id="featured-properties-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-1.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-tags">
                            <div class="tag tag-featured">Featured</div>
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-2.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-featured">Featured</div>
                        </div>
                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-3.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-featured">Featured</div>
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-1.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-2.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-3.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-1.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-2.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/home-slider/slide-3.jpg" alt="">
                    <div class="slide-caption">
                        <div class="caption-tags">
                            <div class="tag tag-rent">For Rent</div>
                        </div>

                        <div class="caption-info">
                            <div class="caption-price">$16000/mo</div>
                            <div class="caption-title">Renovated Apartment</div>
                            <div class="caption-params">
                                <div>Beds: 4</div>
                                <div>Baths: 6</div>
                                <div>SqFt: 5280</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="section-bg-img after-slider-section">
    <h2 class="section-title t-center">
        What are you looking for?
    </h2>
    <p class="section-sub-title t-center">
        We provide full service at every step.
    </p>

    <div class="building-type-blocks">
        <div class="building-type-block">
            <div class="icon-house">
                <img src="/assets/images/icons/home/house.png" alt="">
            </div>
            <h3>Modern Villa</h3>
            <p class="t-center">Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
        </div>
        <div class="building-type-block">
            <div class="icon-house">
                <img src="/assets/images/icons/home/home.png" alt="">
            </div>
            <h3>Family House</h3>
            <p class="t-center">
                Aliquam dictum elit vitae mauris facilisis, at dictum urna.
            </p>
        </div>
        <div class="building-type-block">
            <div class="icon-house">
                <img src="/assets/images/icons/home/townhouse.png" alt="">
            </div>
            <h3>Town House</h3>
            <p class="t-center">Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
        </div>
        <div class="building-type-block">
            <div class="icon-house">
                <img src="/assets/images/icons/home/apartment.png" alt="">
            </div>
            <h3>Apartment</h3>
            <p class="t-center">Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
        </div>
    </div>

    <h2 class="section-title t-center">
        Find Properties in These Cities
    </h2>
    <p class="section-sub-title t-center">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>

    <div class="property-cities">

        <div class="property-city">
            <img src="/assets/images/yerevan.jpg" alt="">
            <div class="city-info">
                <div class="city-name">Yerevan</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>

        <div class="property-city">
            <img src="/assets/images/gyumri.jpeg" alt="">
            <div class="city-info">
                <div class="city-name">Gyumri</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>

        <div class="property-city">
            <img src="/assets/images/ejmiacin.jpg" alt="">
            <div class="city-info">
                <div class="city-name">Ejmiacin</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>

        <div class="property-city">
            <img src="/assets/images/abovyan.jpg" alt="">
            <div class="city-info">
                <div class="city-name">Abovyan</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>
        <div class="property-city">
            <img src="/assets/images/vanadzor.jpg" alt="">
            <div class="city-info">
                <div class="city-name">Vanadzor</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>

        <div class="property-city">
            <img src="/assets/images/dilijan.jpg" alt="">
            <div class="city-info">
                <div class="city-name">Dilijan</div>
                <div class="city-properties-count">245 Properties</div>
            </div>
        </div>
    </div>
</section>

<section class="section-bg-img modern-apartment-section">
    <div class="modern-apartment-inner-section">
        <div class="modern-apartment-block">
            <div class="modern-apartment-block-inner">
                <h2 class="section-title fs-30">
                    Modern Apartment
                </h2>
                <h3 class="mb-20 fs-18">
                    $79 at night
                </h3>
                <p class="section-sub-title fs-14">
                    I am text block. Click edit button to change this text. Lorem ipsum dolor sit
                    amet, consectetur adipiscing elit.
                </p>
                <a href="#">
                    <button class="btn">Book now</button>
                </a>
            </div>
        </div>

    </div>

</section>

<section class="featured-properties-slider">
    <h2 class="section-title t-center">Our Agents</h2>
    <p class="section-sub-title t-center">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>

    <div class="slider-container">
        <div class="swiper" id="our-agents-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-1.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Jennifer Barton</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">3.5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-2.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Kathleen Myers</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-3.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Mariusz Ciesla</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">4.5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-4.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Helene Powers</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">4</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-5.jpg" alt="">
                    <div class="slide-caption">


                        <div class="caption-info">
                            <div class="caption-title fs-18">Jade Northon</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-6.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Kevin Harris</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">4.5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-5.jpg" alt="">
                    <div class="slide-caption">


                        <div class="caption-info">
                            <div class="caption-title fs-18">Jade Northon</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/agents/agent-6.jpg" alt="">
                    <div class="slide-caption">

                        <div class="caption-info">
                            <div class="caption-title fs-18">Kevin Harris</div>
                            <div class="agent-rate">
                                <div class="fs-14">
                                    Agent
                                </div>
                                <div class="ml-auto fs-14">
                                    <span class="rate-point">4.5</span>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

</section>

<section class="articles-and-tips">
    <h2 class="section-title t-center">Articles & Tips</h2>
    <p class="section-sub-title t-center">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>

    <div class="articles-and-tips-container">

        <div class="article-tip-card">
            <img src="/assets/images/tips/art-tip-1.jpg" alt="">
            <div class="article-tip-info">
                <div class="article-type fs-14 mb-20 mt-10">Business</div>
                <h3 class="article-tip-title fs-18 mb-20">Skills That You Can Learn In The Real Estate Market</h3>
            </div>
            <div class="line mb-20"></div>
            <div class="article-tip-publisher">
                <img src="/assets/images/icons/man.png" alt="">
                <div class="publisher-info fs-14">
                    <div class="publisher-name">Sarah Taylor</div>
                    <div class="publish-date ml-auto">March 10, 2023</div>
                </div>
            </div>
        </div>

        <div class="article-tip-card">
            <img src="/assets/images/tips/art-tip-2.jpg" alt="">
            <div class="article-tip-info">
                <div class="article-type fs-14 mb-20 mt-10">Construction</div>
                <h3 class="article-tip-title fs-18 mb-20">Bedroom Colors You will Never this Regret</h3>
            </div>
            <div class="line mb-20"></div>
            <div class="article-tip-publisher">
                <img src="/assets/images/icons/man.png" alt="">
                <div class="publisher-info fs-14">
                    <div class="publisher-name">Ali Tufan</div>
                    <div class="publish-date ml-auto">March 10, 2023</div>
                </div>
            </div>
        </div>

        <div class="article-tip-card">
            <img src="/assets/images/tips/art-tip-4.jpg" alt="">
            <div class="article-tip-info">
                <div class="article-type fs-14 mb-20 mt-10">Business</div>
                <h3 class="article-tip-title fs-18 mb-20">5 Essential Steps for Buying everyone Investment</h3>
            </div>
            <div class="line mb-20"></div>
            <div class="article-tip-publisher">
                <img src="/assets/images/icons/woman.png" alt="">
                <div class="publisher-info fs-14">
                    <div class="publisher-name">Sarah Taylor</div>
                    <div class="publish-date ml-auto">March 10, 2023</div>
                </div>
            </div>
        </div>


    </div>
</section>

<section class="our-partners border-top-line mt-50 pt-40 mb-20">
    <h2 class="section-title t-center">Our Partners</h2>
    <p class="section-sub-title t-center">
        We only work with the best companies around the globe
    </p>

    <div class="partners-block mt-50">

        <div class="partner">
            <img src="/assets/images/partners/partner-1.png" alt="">
        </div>
        <div class="partner">
            <img src="/assets/images/partners/partner-2.png" alt="">
        </div>
        <div class="partner">
            <img src="/assets/images/partners/partner-3.png" alt="">
        </div>
        <div class="partner">
            <img src="/assets/images/partners/partner-4.png" alt="">
        </div>
        <div class="partner">
            <img src="/assets/images/partners/partner-5.png" alt="">
        </div>

    </div>

</section>


<?php include('./partial/footer.php') ?>

</body>
</html>