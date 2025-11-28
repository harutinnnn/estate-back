<!doctype html>
<html lang="en">
<?php include('./partial/admin-head.php') ?>
<body style="background-color: var(--light-gray-color)">

<?php include('./partial/admin-header.php') ?>

<?php $activeMenu = 'messages'; ?>
<?php include('./partial/admin/admin-sidebar.php') ?>

<div class="main-content">

    <section class="properties-header ">

        <div class="properties-title-container">
            <h1 class="">Messages</h1>
        </div>
    </section>

    <section class="admin-section">


        <div class="messages-block">

            <div class="messaged-users">

                <div class="message-user-item active">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avatar-1.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">
                        <div class="new-message-count">
                            2
                        </div>
                    </div>
                </div>

                <div class="message-user-item">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avatar-2.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">
                        <div class="new-message-count">
                            3
                        </div>
                    </div>
                </div>


                <div class="message-user-item">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avatar-3.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">

                    </div>
                </div>

                <div class="message-user-item">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avatar-4.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">

                    </div>
                </div>

                <div class="message-user-item">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avatar-5.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">

                    </div>
                </div>

                <div class="message-user-item">
                    <div class="message-user-item-left">
                        <div class="user-avatar">
                            <img src="/assets/images/user-avarats/avarar-6.jpg" alt="">
                        </div>
                        <div class="user-name-info">
                            <div class="name">Vincent Porter</div>
                            <div class="last-msg">I'm going to office.</div>
                        </div>
                    </div>
                    <div class="message-user-item-right">

                    </div>
                </div>


            </div>

            <div class="user-messages">

                <div class="messages">

                    <div class="message-item">
                        <div class="message-avatar">
                            <img src="/assets/images/user-avarats/avatar-1.jpg" alt="">
                        </div>
                        <div class="message-info">
                            <div class="message-date">
                                Today, 10:51
                            </div>
                            <div class="message-text">
                                Hello, John!
                            </div>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-avatar">
                            <img src="/assets/images/user-avarats/avatar-1.jpg" alt="">
                        </div>
                        <div class="message-info">
                            <div class="message-date">
                                Today, 11:05
                            </div>
                            <div class="message-text">
                                simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry
                            </div>
                        </div>
                    </div>

                    <div class="message-item response">
                        <div class="message-info">
                            <div class="message-date">
                                Today, 11:15
                            </div>
                            <div class="message-text">
                                simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry
                            </div>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-avatar">
                            <img src="/assets/images/user-avarats/avatar-1.jpg" alt="">
                        </div>
                        <div class="message-info">
                            <div class="message-date">
                                Today, 11:17
                            </div>
                            <div class="message-text">
                                Let's go!
                            </div>
                        </div>
                    </div>

                    <div class="message-item response">
                        <div class="message-info">
                            <div class="message-date">
                                Today, 11:22
                            </div>
                            <div class="message-text">
                                The project finally complete! Let's go to!
                            </div>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-avatar">
                            <img src="/assets/images/user-avarats/avatar-1.jpg" alt="">
                        </div>
                        <div class="message-info">
                            <div class="message-date">
                                Today, 12:05
                            </div>
                            <div class="message-text">
                                simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry
                            </div>
                        </div>
                    </div>

                </div>

                <div class="message-send-container">
                    <textarea id="message" placeholder="Enter text here..."></textarea>
                    <button type="button" id="send-message" class="btn">Send message</button>
                </div>
            </div>

        </div>


    </section>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
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
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<?php include('./partial/footer.php') ?>

</body>
</html>