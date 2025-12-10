<?php

use App\Models\CategoryModel;

?>
<div class="main-content">

    <section class="properties-header">

        <div class="properties-title-container">
            <h1 class="">Add New Property</h1>
        </div>
    </section>

    <section class="admin-section">
        <form method="post">
            <div class="admin-section-block mb-30">
                <h2 class="mb-30 flex flex-align-items-center gap-5">Create Listing <i
                            class="fa-solid fa-caret-right fs-16"></i> <?= $categories[$propertyType] ?></h2>


                <?= form_hidden('property-type', $propertyType) ?>

                <div class="form-input-row">
                    <label for="property-title">Property Title</label>
                    <input type="text" class="form-input" id="property-title">
                </div>

                <div class="form-input-row">
                    <label for="description">Նկարագիր</label>
                    <textarea class="form-input" id="description" name="description"></textarea>
                </div>

                <div class="col-3-grid">
                    <div class="form-input-row">
                        <label for="price">Price</label>
                        <input type="number" class="form-input" id="price" name="price">
                    </div>


                    <!--TODO only for rent--->
                    <div class="form-input-row">
                        <label for="rooms">Կանխավճար</label>
                        <select name="rooms" id="rooms" class="form-input">
                            <option value="">Առանց կանխավճարի</option>
                            <option value="">Համաձայնությամբ</option>
                            <option value="">2 շաբաթ</option>
                            <option value="">1 ամիս</option>
                            <option value="">3 ամիս</option>
                            <option value="">6 ամիս</option>
                        </select>
                    </div>

                    <div class="form-input-row">
                        <label for="area">Area</label>
                        <input type="number" step="0.1" class="form-input" id="area" name="area">
                    </div>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES])): ?>
                        <div class="form-input-row">
                            <label for="area">Հողատարածքի մակերես</label>
                            <input type="number" step="0.1" class="form-input" id="area" name="area">
                        </div>
                    <?php endif; ?>


                    <div class="form-input-row">
                        <label for="rooms">Rooms</label>
                        <select name="rooms" id="rooms" class="form-input">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES])): ?>
                        <div class="form-input-row">
                            <label for="ceiling_height">Առաստաղի բարձրություն</label>
                            <input type="number" step="0.1" class="form-input" id="ceiling_height"
                                   name="ceiling_height">
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="form-input-row">
                            <label for="floor">Հարկ</label>
                            <select name="floor" id="floor" class="form-input">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT])): ?>
                        <div class="form-input-row">
                            <label for="balcony">Պատշգամբ</label>
                            <select name="balcony" id="balcony" class="form-input">
                                <option value="">Առանց պատշգամբ</option>
                                <option value="">Բաց պատշգամբ</option>
                                <option value="">Փակ պատշգամբ</option>
                                <option value="">Մի քանի պատշգամբ</option>

                            </select>
                        </div>
                    <?php endif; ?>


                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES])): ?>
                        <div class="form-input-row">
                            <label for="balcony">Կոմունալ վճարումներ</label>
                            <select name="balcony" id="balcony" class="form-input">
                                <option value="">Ներառված</option>
                                <option value="">Չներառված</option>
                                <option value="">Համաձայնությամբ</option>

                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>
                        <div class="form-input-row">
                            <label for="furniture">Կահույք</label>
                            <select name="furniture" id="furniture" class="form-input">
                                <option value="">Կահույքով</option>
                                <option value="">Առանց կահույք</option>
                                <option value="">Մասնակի կահույք</option>
                                <option value="">Համաձայնությամբ</option>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>
                        <div class="form-input-row">
                            <label for="furniture">Տեսարաններ պատուհաններից</label>
                            <select name="furniture" id="furniture" class="form-input">
                                <option value="">Տեսարան դեպի բակ</option>
                                <option value="">Տեսարան դեպի փողոց</option>
                                <option value="">Տեսարան դեպի քաղաք</option>
                                <option value="">Տեսարան դեպի այգի</option>
                                <option value="">Տեսարան դեպի Արարատ</option>

                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])): ?>
                        <div class="form-input-row">
                            <label for="appliances">Կենցաղային տեխնիկա</label>
                            <ul>
                                <li>
                                    <label for="amenities-air">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-air"/>
                                        Սառնարան
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-barbeque">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-barbeque"/>
                                        Սալօջախ
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-dryer">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-dryer"/>
                                        Միկրոալիքային վառարան
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-dryer">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-dryer"/>
                                        Սրճեփ
                                    </label>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE, CategoryModel::TYPE_LAND_PLOT, CategoryModel::TYPE_BOOTHS_AND_KIOSKS])): ?>
                        <div class="form-input-row">
                            <label for="appliances">Կոմունիկացիաներ</label>
                            <ul>

                                <li>
                                    <label for="amenities-air">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-air"/>
                                        Էլեկտրականություն
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-barbeque">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-barbeque"/>
                                        Ջրամատակարարում
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-dryer">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-dryer"/>
                                        Գազ
                                    </label>
                                </li>
                                <li>

                                    <label for="amenities-dryer">
                                        <input type="checkbox" name="amenities" value="air" id="amenities-dryer"/>
                                        Կոյուղի
                                    </label>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

            <div class="admin-section-block mb-30">
                <h2 class="mb-30">Location</h2>


                <div class="col-2-grid">


                    <div class=" ">
                        <div class="form-input-row">
                            <label for="state">State</label>

                            <?= form_dropdown(
                                [
                                    'class' => 'form-input',
                                    'name' => 'state',
                                    'id' => 'state',
                                ],
                                $states
                            ) ?>
                        </div>

                        <div class="form-input-row">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-input"></select>
                        </div>

                        <div class="form-input-row">
                            <label for="postal-code">Postal code</label>
                            <input type="number" class="form-input" id="postal-code">
                        </div>

                        <div class="form-input-row">
                            <label for="address">Address</label>
                            <input type="text" class="form-input" id="address">
                        </div>

                    </div>

                    <div class="form-input-row">
                        <div id="property-map" style="width: 100%;height: 360px"></div>
                    </div>
                </div>
            </div>

            <div class="admin-section-block">
                <h2 class="mb-30">Detailed Information</h2>

                <div class="col-3-grid">
                    <div class="form-input-row">
                        <label for="property-id">Property ID</label>
                        <input type="text" class="form-input" id="property-id" name="property-id">
                    </div>

                    <div class="form-input-row">
                        <label for="area-size">Area Size</label>
                        <input type="text" class="form-input" id="area-size" name="area-size">
                    </div>

                    <div class="form-input-row">
                        <label for="size-prefix">Size Prefix</label>
                        <select name="size-prefix" id="size-prefix" class="form-input">
                            <option value="">Մք</option>
                            <option value="">Կմք</option>
                            <option value="">Հա</option>
                        </select>

                    </div>

                </div>

                <div class="col-3-grid">

                    <div class="form-input-row">
                        <label for="bedrooms">Bedrooms</label>
                        <select name="bedrooms" id="bedrooms" class="form-input">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>


                    </div>

                    <div class="form-input-row">
                        <label for="Bathrooms">Bathrooms</label>
                        <select name="Bathrooms" id="Bathrooms" class="form-input">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>

                    <div class="form-input-row">
                        <label for="Garages">Garages</label>
                        <select name="Garages" id="Garages" class="form-input">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>

                <div class="col-3-grid">

                    <div class="form-input-row">
                        <label for=" Year Built"> Year Built</label>
                        <select name=" Year Built" id=" Year Built" class="form-input">
                            <option value="">2025</option>
                            <option value="">2024</option>
                            <option value="">2023</option>
                            <option value="">2022</option>
                            <option value="">2021</option>
                            <option value="">2020</option>
                            <option value="">2019</option>
                            <option value="">2018</option>
                            <option value="">2001</option>
                        </select>
                    </div>


                    <?php if ($propertyCategory->cat_key == CategoryModel::TYPE_APARTMENT): ?>
                        <div class="form-input-row">
                            <label for="new_building">New building</label>
                            <select name="new_building" id="new_building" class="form-input">

                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <!--TODO if prooperty on rent-->
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES])): ?>
                        <div class="form-input-row">
                            <label for="new_building">
                                Թույլատրվում են ընտանի կենդանիներ Գործարքի
                            </label>
                            <select name="new_building" id="new_building" class="form-input">

                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                        <div class="form-input-row">
                            <label for="elevator">Elevator</label>
                            <select name="elevator" id="elevator" class="form-input">

                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                        <div class="form-input-row">
                            <label for="elevator">Հարկերի քանակ</label>
                            <select name="number_of_floors" id="number_of_floors" class="form-input">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                        <div class="form-input-row">
                            <label for="number_of_bathrooms">Շինության տիպ</label>
                            <select name="number_of_floors" id="number_of_floors" class="form-input">
                                <option value="">Քարե</option>
                                <option value="">Պանելային</option>
                                <option value="">Մոնոլիտ</option>
                                <option value="">Աղյուսե</option>
                                <option value="">Կասետային</option>
                                <option value="">Փայտե</option>

                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])): ?>

                        <div class="form-input-row">
                            <label for="number_of_bathrooms">Սենյակների քանակ</label>
                            <select name="number_of_bathrooms" id="number_of_bathrooms" class="form-input">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3+</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])): ?>

                        <div class="form-input-row">
                            <label for="parking">Կայանատեղի</label>
                            <select name="parking" id="parking" class="form-input">

                                <option value="1">Բացօթյա կայանատեղի</option>
                                <option value="2">Ծածկապատ կայանատեղի</option>
                                <option value="2">Ավտոտնակ</option>
                            </select>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if (in_array($propertyCategory->cat_key, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_GARAGES_AND_PARKING])): ?>
                    <div class="create-amenities">
                        <h3 class="mb-10">Amenities</h3>
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
                                    <input type="checkbox" name="amenities" value="air"
                                           id="amenities-window-coverings"/>
                                    Window Coverings
                                </label>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="form-input-row mt-20 flex gap-10">

                    <a href="/<?= $_lang ?>/user/create">
                        <button class="btn btn-gray" name="submit" type="button" value="1">Back</button>
                    </a>
                    <button class="btn" name="submit" value="1">Save</button>
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

    marker.on('dragend', (e) => {
        const pos = e.target.getLatLng();
        console.log('marker moved to:', pos.lat, pos.lng);
        getPointInfo(pos.lat, pos.lng)
    });

    map.on('click', function (e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;

        getPointInfo(lat, lng)
        marker.setLatLng([lat, lng]);
    })

    const getPointInfo = async (lat, lng) => {
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&addressdetails=1&&accept-language=hy`;

        const res = await fetch(url, {
            headers: {'User-Agent': 'YourAppName'} // required by Nominatim rules
        });

        const data = await res.json();

        const addr = data.address;

        // console.log("street: ", addr.road);
        // console.log("city: ", addr.city || addr.town || addr.village);
        // console.log("state: ", addr.state);
        // console.log("ZIP: ", addr.postcode);
        // console.log("country: ", addr.country)
        console.log(addr)

        console.log(addr.city)
        // document.getElementById('city').value = addr.city || addr.town || addr.village || ""
        document.getElementById('postal-code').value = addr.postcode
        // document.getElementById('state').value = addr.state || addr.suburb

        return {
            street: addr.road,
            city: addr.city || addr.town || addr.village || "",
            state: addr.state || addr.suburb,
            zip: addr.postcode,
            country: addr.country
        }
    }

</script>