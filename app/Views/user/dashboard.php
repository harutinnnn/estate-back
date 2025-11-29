<div class="main-content">

    <section class="properties-header ">

        <div class="properties-title-container">
            <h1 class="">Your dashboard</h1>
        </div>
    </section>

    <section class="admin-section">

        <div class="dashboard-user-activities">

            <div class="activity-item">
                <div class="left">
                    <div class="num">37</div>
                    <div class="text">All Properties</div>
                </div>
                <div class="icon">
                    <i class="fa-regular fa-house"></i>
                </div>
            </div>

            <div class="activity-item">
                <div class="left">
                    <div class="num">23</div>
                    <div class="text">Total Views</div>
                </div>
                <div class="icon">
                    <i class="fa-regular fa-eye"></i>
                </div>
            </div>

            <div class="activity-item">
                <div class="left">
                    <div class="num">14</div>
                    <div class="text">Total Visitor Reviews</div>
                </div>
                <div class="icon">
                    <i class="fa-regular fa-comment-dots"></i>
                </div>
            </div>


            <div class="activity-item">
                <div class="left">
                    <div class="num">34</div>
                    <div class="text">Total Favorites</div>
                </div>
                <div class="icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>

        </div>


        <div class="user-activities">
            <div class="activities-chart">
                <canvas id="myChart"></canvas>
            </div>


            <div class="last-activities">
                <h3>Recent activities</h3>

                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-house"></i>
                    </div>
                    <div class="activity-text">
                        Your listing <strong>Luxury Family</strong> Home has been approved!.
                    </div>
                </div>

                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <div class="activity-text">
                        Kathy Brown left a review on <strong>Renovated Apartment</strong>
                    </div>
                </div>


                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="activity-text">
                        Someone favorites your <strong>Gorgeous Villa Bay View</strong> listing!
                    </div>
                </div>
                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-house"></i>
                    </div>
                    <div class="activity-text">
                        Your listing <strong>Luxury Family</strong> Home has been approved!.
                    </div>
                </div>

                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <div class="activity-text">
                        Kathy Brown left a review on <strong>Renovated Apartment</strong>
                    </div>
                </div>


                <div class="activity-item">
                    <div class="icon">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="activity-text">
                        Someone favorites your <strong>Gorgeous Villa Bay View</strong> listing!
                    </div>
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
