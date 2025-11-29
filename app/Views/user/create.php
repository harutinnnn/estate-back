
<div class="main-content">

    <section class="properties-header">

        <div class="properties-title-container">
            <h1 class="">Add New Property</h1>
        </div>
    </section>

    <section class="admin-section">
        <div class="admin-section-block mb-30">
            <h2 class="mb-30">Create Listing</h2>

            <div class="form-input-row">
                <label for="property-title">Property Title</label>
                <input type="text" class="form-input" id="property-title">
            </div>

            <div class="form-input-row">
                <label for="description">Description</label>
                <textarea class="form-input" id="description" name="description"></textarea>
            </div>

            <div class="form-input-row">
                <label for="property-type">Property Type</label>
                <select name="property-type" id="property-type" class="form-input">
                    <option value="">Apartment</option>
                    <option value="">House</option>
                    <option value="">Garage</option>
                </select>

            </div>

            <div class="col-3-grid">
                <div class="form-input-row">
                    <label for="price">Price</label>
                    <input type="number" class="form-input" id="price" name="price">
                </div>

                <div class="form-input-row">
                    <label for="area">Area</label>
                    <input type="number" step="0.1" class="form-input" id="area" name="area">
                </div>


                <div class="form-input-row">
                    <label for="rooms">Rooms</label>
                    <select name="rooms" id="rooms" class="form-input">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>

                </div>
            </div>

        </div>

        <div class="admin-section-block mb-30">
            <h2 class="mb-30">Location</h2>

            <div class="form-input-row">
                <label for="address">Address</label>
                <input type="text" class="form-input" id="address">
            </div>

            <div class="col-3-grid">
                <div class="form-input-row">
                    <label for="state">State</label>
                    <input type="text" class="form-input" id="state">
                </div>

                <div class="form-input-row">
                    <label for="city">City</label>
                    <input type="text" class="form-input" id="city">
                </div>
                <div class="form-input-row">
                    <label for="postal-code">Postal code</label>
                    <input type="number" class="form-input" id="postal-code">
                </div>
            </div>

            <div class="form-input-row">
                <div id="property-map" style="width: 100%;height: 400px"></div>
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
            </div>

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
                            <input type="checkbox" name="amenities" value="air" id="amenities-window-coverings"/>
                            Window Coverings
                        </label>
                    </li>
                </ul>
            </div>
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
        document.getElementById('city').value = addr.city || addr.town || addr.village || ""
        document.getElementById('postal-code').value = addr.postcode
        document.getElementById('state').value = addr.state || addr.suburb

        return {
            street: addr.road,
            city: addr.city || addr.town || addr.village || "",
            state: addr.state || addr.suburb,
            zip: addr.postcode,
            country: addr.country
        }
    }

</script>