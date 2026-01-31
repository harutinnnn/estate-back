<!doctype html>
<html lang="en">
<?php include('./partial/admin-head.php') ?>
<body style="background-color: var(--light-gray-color)">

<?php include('./partial/admin-header.php') ?>

<?php $activeMenu = 'profile'; ?>
<?php include('./partial/admin/admin-sidebar.php') ?>

<div class="main-content">

    <section class="properties-header ">

        <div class="properties-title-container">
            <h1 class="">Profile</h1>
        </div>
    </section>

    <section class="admin-section">

        <div class="profile-container">

            <h4>Profile information</h4>

            <div class="profile-img-container mb-30">
                <img src="/assets/images/agents/agent-1.jpg" alt="">
                <label for="profile-img">
                    Upload photo <i class="fa-solid fa-download"></i>
                    <input type="file" id="profile-img">
                </label>

            </div>

            <div class="col-2-grid">
                <div class="form-input-row">
                    <label for="username">Username</label>
                    <input type="text" class="form-input" id="username" name="username">
                </div>

                <div class="form-input-row">
                    <label for="area-size">Email</label>
                    <input type="email" class="form-input" id="email" name="email">
                </div>
            </div>

            <div class="col-2-grid">
                <div class="form-input-row">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-input" id="first-name" name="first-name">
                </div>

                <div class="form-input-row">
                    <label for="last-name">Last Name</label>
                    <input type="email" class="form-input" id="last-name" name="last-name">
                </div>
            </div>

            <div class="col-2-grid">
                <div class="form-input-row">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-input" id="mobile" name="mobile">
                </div>


            </div>

            <div class="form-input-row">
                <label for="mobile">About me</label>
                <textarea name="about-me" id="about-me" class="form-input"></textarea>
            </div>

            <div class="form-input-row">
                <button class="btn">Update profile</button>
            </div>

        </div>

        <div class="profile-container mt-30">

            <h4 class="mb-30">Change password</h4>

            <div class="form-input-row">
                <label for="old-password">Old password</label>
                <input type="email" class="form-input" id="old-password" name="old-password">
            </div>

            <div class="col-2-grid">
                <div class="form-input-row">
                    <label for="new-password">New password</label>
                    <input type="email" class="form-input" id="new-password" name="new-password">
                </div>

                <div class="form-input-row">
                    <label for="confirm-new-password">Confirm New Password</label>
                    <input type="email" class="form-input" id="confirm-new-password" name="confirm-new-password">
                </div>

                <div class="form-input-row">
                    <button class="btn">Update password</button>
                </div>

            </div>

        </div>


    </section>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    let myChart;

    function createChart() {
        if (myChart) myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 22, 3, 18, 84, 45, 32],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 0
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    createChart()

    const chart =
        window.addEventListener('resize', () => {
            createChart()
        });
</script>


<?php include('./partial/footer.php') ?>

</body>
</html>