<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap5/bootstrap.min.css" />
    <script src="bootstrap5/jquery.min.js"></script>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="statistics.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="phone-screen">
            <div class="body">

                <div class="statistic-title">Statistics</div>

                <div class="selectpicker led-char">
                    <select id="slc-led">
                        <option value="led">Tất cả các thiết bị</option>
                        <?php
                        for ($i = 1; $i <= 20; ++$i) {
                            echo "<option class=\"option-color\" value=\"led$i\">Thiết bị đèn số $i </option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="time-char">
                    <select id="slc-time">
                        <?php
                        for ($i = 1; $i <= 3; ++$i) {
                            echo "<option class=\"option-color\">0$i/2022</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="charts">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="statistic-total">Tổng điện năng: 300(kWh)</div>

            </div>

            <div class="footer">
                <div class="d-flex justify-content-between">
                    <div class="home-icon icon-footer">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                    <div class="history-icon icon-footer">
                        <ion-icon name="timer-outline"></ion-icon>
                    </div>
                    <div class="nofi-icon icon-footer">
                        <ion-icon name="podium-outline" title=""></ion-icon>
                    </div>
                    <div class="user-icon icon-footer">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="statistics.js"></script>
</body>

</html>