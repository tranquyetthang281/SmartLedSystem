<?php
$DOMAIN = 'http://localhost/SmartLedSystem/SourceMVC/client/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/bootstrap5/bootstrap.min.css" />
    <script src="<?php echo $DOMAIN ?>public/css/bootstrap5/jquery.min.js"></script>
    <script src="<?php echo $DOMAIN ?>public/css/bootstrap5/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/login.css" />
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/home.css" />
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/statistics.css" />
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/history.css" />
    <link rel="stylesheet" href="<?php echo $DOMAIN ?>public/css/account.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>SmartLedSystem</title>
</head>

<body>
    <div class="container">
        <div class="phone-screen" style="background-image: url('<?php echo $DOMAIN ?>public/image/pngwing.com.png')">
            <?php
            if (!isset($_SESSION['token_user']))
                require_once('login.php');
            else { ?>
                <?php
                if (isset($data['render'])) {
                    require_once $data['render'] . '.php';
                } else require_once 'Home.php';
                ?>
                <div class="footer">
                    <div class="d-flex justify-content-between">
                        <div class="home-icon icon-footer">
                            <a href="<?php echo $DOMAIN ?>">
                                <ion-icon name="home-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="history-icon icon-footer">
                            <a href="<?php echo $DOMAIN ?>History/Show">
                                <ion-icon name="timer-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="nofi-icon icon-footer">
                            <a href="<?php echo $DOMAIN ?>Statistics/Show">
                                <ion-icon name="podium-outline" title=""></ion-icon>
                            </a>
                        </div>
                        <div class="user-icon icon-footer">
                            <a href="<?php echo $DOMAIN ?>Account/Show">
                                <ion-icon name="person-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="<?php echo $DOMAIN ?>public/js/home.js"></script>
    <script src="<?php echo $DOMAIN ?>public/js/history.js"></script>
    <script src="<?php echo $DOMAIN ?>public/js/statistics.js"></script>
    <script src="<?php echo $DOMAIN ?>public/js/main.js"></script>
</body>

</html>