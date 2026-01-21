<?php

use App\Libraries\PropertyParameters;
use App\Models\CategoryModel;

?>
<div class="main-content">

    <section class="properties-header">

        <div class="properties-title-container">
            <h1 class=""><?= translate('add_new_property') ?></h1>
        </div>
    </section>

    <section class="admin-section">
        <form method="post" enctype="multipart/form-data">
            <div class="admin-section-block mb-30">
                <h2 class="mb-30 flex flex-align-items-center gap-5">
                    <?= translate('create_item') ?> <i
                            class="fa-solid fa-caret-right fs-16"></i> <?= $categories[$propertyType] ?> <i
                            class="fa-solid fa-caret-right fs-16"></i> <?= translate($propertyRentType) ?>
                </h2>

                <?= form_hidden('category', $propertyType) ?>
                <?= form_hidden('property_rent_type', $propertyRentType) ?>

                <div class="form-input-row">
                    <label for="title"><?= translate('property_name') ?></label>
                    <input type="text" class="form-input" name="title" id="title" value="<?= set_value('title') ?>">
                    <div class="error-msg mb-3">
                        <?= show_error("title", $validation); ?>
                    </div>
                </div>

                <div class="form-input-row">
                    <label for="description"><?= translate('description') ?></label>
                    <textarea class="form-input" id="description"
                              name="description"><?= set_value('description') ?></textarea>
                    <div class="error-msg mb-3">
                        <?= show_error("description", $validation); ?>
                    </div>
                </div>

                <div class="col-3-grid">
                    <div class="form-input-row">
                        <label for="price"><?= translate('price') ?></label>
                        <input type="number" class="form-input" id="price" name="price"
                               value="<?= set_value('price') ?>">
                        <div class="error-msg mb-3">
                            <?= show_error("price", $validation); ?>
                        </div>
                    </div>


                    <?php if ($propertyRentType == \App\Models\ArticleModel::TYPE_RENT): ?>
                        <!--TODO only for rent--->
                        <div class="form-input-row">
                            <label for="prepayment"><?= translate('prepayment') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'prepayment',
                                            'id' => 'prepayment',
                                    ],
                                    PropertyParameters::getPrepaymentParameters(),
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("prepayment", $validation); ?>
                            </div>

                        </div>
                    <?php endif; ?>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])): ?>

                        <div class="form-input-row">
                            <label for="rooms"><?= translate('rooms') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'rooms',
                                            'id' => 'rooms',
                                    ],
                                    PropertyParameters::getRooms(),
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("rooms", $validation); ?>
                            </div>

                        </div>
                    <?php endif; ?>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_EVENT_VENUE_RENTAL])): ?>
                        <div class="form-input-row">
                            <label for="ceiling_height"><?= translate('ceiling_height') ?></label>
                            <input type="number" step="0.1" class="form-input" id="ceiling_height"
                                   name="ceiling_height">

                            <div class="error-msg mb-3">
                                <?= show_error("ceiling_height", $validation); ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="form-input-row">
                            <label for="floor"><?= translate('floor') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'floor',
                                            'id' => 'floor',
                                    ],
                                    PropertyParameters::getPropertyFloor(),
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("floor", $validation); ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])): ?>
                        <div class="form-input-row">
                            <label for="balcony"><?= translate('balcony') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'balcony',
                                            'id' => 'balcony',
                                    ],
                                    PropertyParameters::getBalcony(),
                            ) ?>
                            <div class="error-msg mb-3">
                                <?= show_error("balcony", $validation); ?>
                            </div>

                        </div>
                    <?php endif; ?>


                    <?php if ($propertyRentType !== \App\Models\ArticleModel::TYPE_RENT): ?>
                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES])): ?>
                            <div class="form-input-row">
                                <label for="utility_payments"><?= translate('utility_payments') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'utility_payments',
                                                'id' => 'utility_payments',
                                        ],
                                        PropertyParameters::getUtilityPayments(),
                                ) ?>
                                <div class="error-msg mb-3">
                                    <?= show_error("utility_payments", $validation); ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="form-input-row">
                            <label for="furniture"><?= translate('furniture') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'furniture',
                                            'id' => 'furniture',
                                    ],
                                    PropertyParameters::getFurniture(),
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("furniture", $validation); ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="form-input-row">
                            <label for="furniture"><?= translate('views_from_windows') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'views_from_windows',
                                            'id' => 'views_from_windows',
                                    ],
                                    PropertyParameters::getViewsFromWindows(),
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("views_from_windows", $validation); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

            <div class="admin-section-block mb-30">
                <h2 class="mb-30"><?= translate('location') ?></h2>


                <div class="col-2-grid">


                    <div class=" ">
                        <div class="form-input-row">
                            <label for="state"><?= translate('state') ?></label>

                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'state',
                                            'id' => 'state',
                                    ],
                                    $states ?? []
                            ) ?>

                            <div class="error-msg mb-3">
                                <?= show_error("state", $validation); ?>
                            </div>
                        </div>

                        <div class="form-input-row">
                            <label for="city"><?= translate('city') ?></label>
                            <select name="city" id="city" class="form-input"></select>

                            <div class="error-msg mb-3">
                                <?= show_error("city", $validation); ?>
                            </div>
                        </div>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>
                            <div class="form-input-row">
                                <label for="postal_code"><?= translate('postal_code') ?></label>
                                <input type="number" class="form-input" id="postal_code" name="postal_code"
                                       value="<?= set_value('postal_code') ?>">

                                <div class="error-msg mb-3">
                                    <?= show_error("postal_code", $validation); ?>
                                </div>

                            </div>

                            <div class="form-input-row relative" id="autocomplete-container">
                                <label for="address"><?= translate('address') ?></label>
                                <input type="text" class="form-input" name="address" id="address" autocomplete="off"
                                       value="<?= set_value('address') ?>">

                                <div class="error-msg mb-3">
                                    <?= show_error("address", $validation); ?>
                                </div>

                                <div class="addr-autocomplete" id="addr-autocomplete">


                                </div>

                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="form-input-row">
                        <div id="property-map" style="width: 100%;height: 360px"></div>
                        <input type="hidden" name="lat" id="lat" value="<?= set_value('lat') ?>">
                        <input type="hidden" name="lng" id="lng" value="<?= set_value('lng') ?>">
                    </div>

                    <div class="error-msg mb-3">
                        <?= show_error("lat", $validation); ?>
                        <?= show_error("lng", $validation); ?>
                    </div>
                </div>
            </div>

            <div class="admin-section-block">
                <h2 class="mb-30"><?= translate('detailed_Information') ?></h2>
                <div class="gray-box-group mb-30">
                    <div class="col-4-grid-4-1">


                        <div class="form-input-row">
                            <label for="area_size"><?= translate('area_size') ?></label>
                            <input type="text" class="form-input" id="area_size" name="area_size"
                                   value="<?= set_value('area_size') ?>">
                            <div class="error-msg mb-3">
                                <?= show_error("area_size", $validation); ?>
                            </div>
                        </div>


                        <div class="form-input-row">
                            <label for="area_size_prefix"><?= translate('size_prefix') ?></label>
                            <?= form_dropdown(
                                    [
                                            'class' => 'form-input',
                                            'name' => 'size_prefix',
                                            'id' => 'size_prefix',
                                    ],
                                    PropertyParameters::getAreaUnits()
                            ) ?>
                            <div class="error-msg mb-3">
                                <?= show_error("size_prefix", $validation); ?>
                            </div>
                        </div>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES])): ?>

                            <div class="form-input-row">
                                <label for="land_area"><?= translate('land_area') ?></label>
                                <input type="number" step="0.1" class="form-input" id="land_area" name="land_area">
                            </div>
                            <div class="error-msg mb-3">
                                <?= show_error("land_area", $validation); ?>
                            </div>


                            <div class="form-input-row">
                                <label for="land_area_size_prefix"><?= translate('size_prefix') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'land_area_size_prefix',
                                                'id' => 'land_area_size_prefix',
                                        ],
                                        PropertyParameters::getAreaUnits()
                                ) ?>
                                <div class="error-msg mb-3">
                                    <?= show_error("land_area_size_prefix", $validation); ?>
                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-3-grid">

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT])): ?>
                            <div class="form-input-row">
                                <label for="bedrooms"><?= translate('bedrooms') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'bedrooms',
                                                'id' => 'bedrooms',
                                        ],
                                        PropertyParameters::getBadRooms()
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("bedrooms", $validation); ?>
                                </div>


                            </div>
                        <?php endif; ?>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT])): ?>
                            <div class="form-input-row">
                                <label for="garages"><?= translate('garages') ?></label>

                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'garages',
                                                'id' => 'garages',
                                        ],
                                        PropertyParameters::getGarages()
                                ) ?>


                                <div class="error-msg mb-3">
                                    <?= show_error("garages", $validation); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-3-grid">

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT])): ?>
                            <div class="form-input-row">
                                <label for=" Year Built"><?= translate('year_built') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'year_built',
                                                'id' => 'year_built',
                                        ],
                                        PropertyParameters::getBuildYears()
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("year_built", $validation); ?>
                                </div>

                            </div>
                        <?php endif; ?>


                        <?php if ($propertyCategory->cat_key == CategoryModel::TYPE_APARTMENT): ?>

                            <div class="form-input-row">
                                <label for="new_building"><?= translate('new_building') ?></label>

                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'new_building',
                                                'id' => 'new_building',
                                        ],
                                        PropertyParameters::getYesNo()
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("new_building", $validation); ?>
                                </div>
                            </div>

                        <?php endif; ?>


                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                            <div class="form-input-row">
                                <label for="number_of_floors"><?= translate('number_of_floors') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'number_of_floors',
                                                'id' => 'number_of_floors',
                                        ],
                                        PropertyParameters::getPropertyFloor(),
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("number_of_floors", $validation); ?>
                                </div>

                            </div>
                        <?php endif; ?>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])): ?>

                            <div class="form-input-row">
                                <label for="building_type"><?= translate('building_type') ?></label>

                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'building_type',
                                                'id' => 'building_type',
                                        ],
                                        PropertyParameters::getBuildingType(),
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("building_type", $validation); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])): ?>

                            <div class="form-input-row">
                                <label for="bathrooms"><?= translate('number_of_rooms') ?></label>
                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'bathrooms',
                                                'id' => 'bathrooms',
                                        ],
                                        PropertyParameters::getBadRooms(),
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("bathrooms", $validation); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                            <div class="form-input-row">
                                <label for="parking"><?= translate('parking') ?></label>

                                <?= form_dropdown(
                                        [
                                                'class' => 'form-input',
                                                'name' => 'parking',
                                                'id' => 'parking',
                                        ],
                                        PropertyParameters::getParkingParams(),
                                ) ?>

                                <div class="error-msg mb-3">
                                    <?= show_error("parking", $validation); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php if ($propertyRentType == \App\Models\ArticleModel::TYPE_RENT): ?>
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="create-amenities gray-box-group mb-30">
                            <h3 class="mb-20"><?= translate('household_appliances') ?></h3>

                            <ul>
                                <?php if (isset($householdAppliances) && !empty($householdAppliances)): ?>
                                    <?php foreach ($householdAppliances as $id => $title): ?>
                                        <li>
                                            <label for="household_appliances-<?= $id ?>">
                                                <input type="checkbox" name="household_appliances[]" value="<?= $id ?>"
                                                       id="household_appliances-<?= $id ?>"/>
                                                <?= $title ?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if ($propertyRentType == \App\Models\ArticleModel::TYPE_RENT): ?>
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])): ?>

                        <div class="create-amenities gray-box-group mb-30">
                            <h3><?= translate('amenities') ?></h3>

                            <?php if (isset($amenities) && !empty($amenities)): ?>
                                <?php foreach ($amenities as $amenityType => $amenityList): ?>
                                    <div class="gray-line mt-30"></div>
                                    <?php if (!empty($amenityList)): ?>
                                        <h4 class="mt-30 mb-10"><?= translate($amenityType) ?></h4>
                                        <ul>
                                            <?php foreach ($amenityList as $amenityId => $amenityTitle): ?>
                                                <li>
                                                    <label for="amenities-<?= $amenityId ?>">
                                                        <input type="checkbox" name="amenities[]"
                                                               value="<?= $amenityId ?>"
                                                               id="amenities-<?= $amenityId ?>"/>
                                                        <?= $amenityTitle ?>
                                                    </label>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>


                                <?php endforeach; ?>

                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE, CategoryModel::TYPE_LAND_PLOT, CategoryModel::TYPE_BOOTHS_AND_KIOSKS])): ?>
                    <div class="create-amenities gray-box-group mb-30">
                        <h3 class="mb-20"><?= translate('communications') ?></h3>

                        <ul>
                            <?php if (isset($communications) && !empty($communications)): ?>
                                <?php foreach ($communications as $id => $title): ?>
                                    <li>
                                        <label for="communications-<?= $id ?>">
                                            <input type="checkbox" name="communications[]" value="<?= $id ?>"
                                                   id="communications-<?= $id ?>"/>
                                            <?= $title ?>
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </div>
                <?php endif; ?>

                <div class="gray-box-group mb-30">
                    <h3 class="mb-20"><?= translate('images') ?> (<span id="image-count">10</span>)</h3>
                    <div class="create-art-images-container" id="create-art-images-container">

                        <label class="create-art-add-image" id="create-art-add-image">
                            <input type="file" class="apartment-image" id="apartment-image" multiple
                                   accept="image/jpeg, image/png, image/webp">
                            <span>Select upload <br> images or drop</span>
                        </label>

                    </div>
                    <div id="image-errors"></div>
                    <?= show_error('images', $validation) ?>
                </div>

                <div class="form-input-row mt-20 flex gap-10">

                    <a href="/<?= $_lang ?>/user/create">
                        <button class="btn btn-gray" name="submit" type="button"
                                value="1"><?= translate('back') ?></button>
                    </a>
                    <button class="btn" name="submit" value="1"><?= translate('save') ?></button>
                </div>

            </div>


        </form>
    </section>


</div>

<link rel="stylesheet" href="/assets/js/leaflet/leaflet.css"/>
<script src="/assets/js/leaflet/leaflet.js"></script>

<script type="text/javascript">
    const map = L.map('property-map').setView([40.206567, 44.506210], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 25,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    const marker = L.marker([40.206567, 44.506210], {draggable: true}).addTo(map);
    setLatLngInput(40.206567, 44.506210)

    marker.on('dragend', (e) => {
        const pos = e.target.getLatLng();
        console.log('marker moved to:', pos.lat, pos.lng);
        getPointInfo(pos.lat, pos.lng)
        setLatLngInput(pos.lat, pos.lng)
    });

    map.on('click', function (e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;

        getPointInfo(lat, lng)
        setLatLngInput(lat, lng)
        marker.setLatLng([lat, lng]);
    })

    const getPointInfo = async (lat, lng) => {
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&addressdetails=1&accept-language=<?= $_lang ?>`;

        const res = await fetch(url, {
            headers: {'User-Agent': 'YourAppName'} // required by Nominatim rules
        });

        const data = await res.json();

        const addr = data.address;


        let addressStr = ''
        if (addr.road) {
            addressStr += addr.road + ', ';
        }

        if (addr.suburb) {
            addressStr += addr.suburb + ', ';
        }
        if (addr.city) {
            addressStr += addr.city + ', ';
        }
        if (addr.postcode) {
            addressStr += addr.postcode + ', ';
        }
        if (addr.country) {
            addressStr += addr.country + ', ';
        }

        <?php if(in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>
            document.querySelector('#address').value = addressStr.trim()
            document.getElementById('postal-code').value = addr.postcode
        <?php endif; ?>

        return {
            street: addr.road,
            city: addr.city || addr.town || addr.village || "",
            state: addr.state || addr.suburb,
            zip: addr.postcode,
            country: addr.country
        }
    }

    async function searchAddress(query) {
        const url = `https://nominatim.openstreetmap.org/search?` +
            new URLSearchParams({
                q: query,
                format: 'json',
                addressdetails: 1,
                limit: 10,
                countrycodes: 'am', // Armenia only
                'accept-language': '<?= $_lang ?>'
            });

        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                // REQUIRED by Nominatim usage policy
                'User-Agent': 'YourAppName/1.0 (your@email.com)'
            }
        });

        return await response.json();
    }

    let addrTimeout = null;

    <?php if(in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

        document.querySelector('#address').addEventListener('input', async (e) => {

            document.querySelector('#addr-autocomplete').innerHTML = ''

            if (addrTimeout) {
                clearTimeout(addrTimeout);
            }
            if (e.target.value.length < 3) return;

            addrTimeout = setTimeout(async () => {

                const addrList = [];
                const results = await searchAddress(e.target.value);
                if (results && results.length) {

                    let addrHtmlList = document.createElement('ul');

                    results.map(ele => {

                        console.log(ele)

                        const addrData = {
                            display_name: ele.display_name,
                            lat: ele.lat,
                            lng: ele.lon,
                            postcode: ele.address.postcode || ''
                        }

                        const li = document.createElement('li');
                        li.textContent = ele.display_name;
                        // console.log('addrData', addrData)
                        li.onclick = () => {
                            useAddress(addrData)
                        }
                        addrHtmlList.appendChild(li);
                        addrList.push(addrData)
                    })

                    // console.log(addrHtmlList)
                    document.querySelector('#addr-autocomplete').appendChild(addrHtmlList)
                }

                console.log(addrList);
            }, 1000)
        });

        const useAddress = (addr) => {
            console.log(addr)
            document.querySelector('#address').value = addr.display_name
            document.querySelector('#postal-code').value = addr.postcode
            marker.setLatLng([addr.lat, addr.lng]);
            map.setView([addr.lat, addr.lng])
            setLatLngInput(addr.lat, addr.lng)

            document.querySelector('#addr-autocomplete').innerHTML = ''
        }

        const box = document.getElementById('autocomplete-container');

        document.addEventListener('click', (e) => {

            if (!box.contains(e.target)) {
                document.querySelector('#addr-autocomplete').innerHTML = ''
            }
        });

    <?php endif; ?>


    function setLatLngInput(lat, lng) {
        document.querySelector('#lat').value = lat;
        document.querySelector('#lng').value = lng
    }


    let imagesCount = 10;
    const maxFileSizeAllow = 1024 * 1024 * 2
    const imagesInput = document.querySelector('#apartment-image');
    const imageCountEle = document.getElementById('image-count');

    imageCountEle.innerHTML = imagesCount

    imagesInput.addEventListener('change', function () {

        console.log('aaa')

        if (imagesCount <= 0) {
            return
        }

        const files = this.files; // FileList

        uploadFiles(files)

    });

    const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

    function uploadFiles(files) {
        const preview = document.getElementById('create-art-images-container');
        const imageErrors = document.getElementById('image-errors');
        imageErrors.innerHTML = '';

        Array.from(files).forEach(file => {

            if (imagesCount > 0) {


                if (!allowedTypes.includes(file.type)) {
                    const errorMsgEle = document.createElement('div')
                    errorMsgEle.classList.add('error-msg')
                    errorMsgEle.classList.add('mime-error')
                    errorMsgEle.innerHTML = 'Only JPG, JPEG, PNG, and WEBP images are allowed!'

                    Array.from(document.querySelectorAll('.mime-error')).forEach(el => el.remove());
                    imageErrors.appendChild(errorMsgEle)

                    // } else if (file.size > maxFileSizeAllow) {
                } else if (file.size > 11111111111111111111111) {


                    const errorMsgEle = document.createElement('div')
                    errorMsgEle.classList.add('error-msg')
                    errorMsgEle.classList.add('size-error')
                    errorMsgEle.innerHTML = 'Image ' + file.name + ' size more than 2Mb!'

                    Array.from(document.querySelectorAll('.size-error')).forEach(el => el.remove());
                    imageErrors.appendChild(errorMsgEle)


                } else {


                    const imgItem = document.createElement('div');
                    imgItem.classList.add('art-image-item')

                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src);
                    imgItem.appendChild(img)


                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'images[]';
                        hiddenInput.value = e.target.result; // BASE64 STRING

                        imgItem.appendChild(hiddenInput);
                    };
                    reader.readAsDataURL(file);


                    const removeImgEl = document.createElement('i');
                    removeImgEl.classList.add('fa-solid')
                    removeImgEl.classList.add('fa-circle-xmark')
                    removeImgEl.classList.add('remove-img-item')
                    removeImgEl.addEventListener('click', () => {
                        if (confirm('<?= translate('are_you_sure') ?>')) {
                            imgItem.remove()
                            imagesCount++;
                            imageCountEle.innerHTML = imagesCount
                        }
                    })

                    imgItem.appendChild(removeImgEl)

                    preview.prepend(imgItem);


                    imagesCount--;

                    imageCountEle.innerHTML = imagesCount

                }
            } else {
                const errorMsgEle = document.createElement('div')
                errorMsgEle.classList.add('error-msg')
                errorMsgEle.classList.add('count-error')
                errorMsgEle.innerHTML = 'You can add not max 10 image!'

                Array.from(document.querySelectorAll('.count-error')).forEach(el => el.remove());

                imageErrors.appendChild(errorMsgEle)
            }
        });
    }

    label = document.querySelector('#create-art-add-image');

    label.addEventListener('dragover', (e) => {
        e.preventDefault();
        label.classList.add('hover');
    });

    label.addEventListener('dragleave', (e) => {
        e.preventDefault();
        label.classList.remove('hover');
    });

    label.addEventListener('drop', (e) => {
        e.preventDefault();
        label.classList.remove('hover');
        const files = e.dataTransfer.files;
        uploadFiles(files)
    });


</script>