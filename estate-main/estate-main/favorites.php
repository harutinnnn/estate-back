<!doctype html>
<html lang="en">
<?php include('./partial/admin-head.php') ?>
<body style="background-color: var(--light-gray-color)">

<?php include('./partial/admin-header.php') ?>

<?php $activeMenu = 'favorites'; ?>
<?php include('./partial/admin/admin-sidebar.php') ?>

<div class="main-content">

    <section class="properties-header ">

        <div class="properties-title-container">
            <h1 class="">My properties</h1>
        </div>
    </section>

    <section class="admin-section">


        <div class="user-properties">

            <div class="user-properties-inner">
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Info</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <div class="property-img">
                                <div class="property-type">Rent</div>
                                <img src="/assets/images/tips/art-tip-1.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <h3 class="fs-18">Luxury Family Home</h3>
                                <div class="prop-addr fs-14">
                                    <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                                </div>
                                <div class="prop-price fs-16 color-red">
                                    $13000/mo
                                </div>
                            </div>

                        </td>


                        <td>

                            <div class="prop-actions">


                                <a href="#" class="prop-remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="property-img">
                                <div class="property-type">Rent</div>
                                <img src="/assets/images/tips/art-tip-2.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <h3 class="fs-18">Renovated Apartment</h3>
                                <div class="prop-addr fs-14">
                                    <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                                </div>
                                <div class="prop-price fs-16 color-red">
                                    $13000/mo
                                </div>
                            </div>

                        </td>

                        <td>

                            <div class="prop-actions">

                                <a href="#" class="prop-remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="property-img">
                                <div class="property-type sale">Sale</div>
                                <img src="/assets/images/tips/art-tip-4.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <h3 class="fs-18">Single Family Home</h3>
                                <div class="prop-addr fs-14">
                                    <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                                </div>
                                <div class="prop-price fs-16 color-red">
                                    $13000/mo
                                </div>
                            </div>

                        </td>

                        <td>

                            <div class="prop-actions">


                                <a href="#" class="prop-remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="property-img">
                                <div class="property-type">Rent</div>
                                <img src="/assets/images/tips/art-tip-1.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <h3 class="fs-18">Luxury Family Home</h3>
                                <div class="prop-addr fs-14">
                                    <i class="fa-solid fa-location-dot"></i> 1421 San Pedro St, Los Angeles, CA 900015
                                </div>
                                <div class="prop-price fs-16 color-red">
                                    $13000/mo
                                </div>
                            </div>

                        </td>

                        <td>

                            <div class="prop-actions">


                                <a href="#" class="prop-remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>

                        </td>
                    </tr>


                    </tbody>
                </table>
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


<?php include('./partial/footer.php') ?>

</body>
</html>