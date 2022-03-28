<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./bootstrap5/bootstrap.min.css" />
    <script src="./bootstrap5/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap5/jquery.min.js"></script>
    <link rel="stylesheet" href="./home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="phone-screen">
            <input type="checkbox" id="test-check" onclick="turnOnLed()">
            <script>
                var DOMAIN = "http://localhost/smartledsystem/SourceMVC/client";
                
                function sleep(ms) {
                    return new Promise(resolve => setTimeout(resolve, ms));
                }

                async function loop()
                {
                    while (true) {
                        $.ajax({
                            url: DOMAIN + "/Home/testGetData",
                            type: "post",
                            data: {
                                flag: true,
                            },
                            success: function(result) {
                                console.log(result);
                            },
                        });
                        await sleep(1000);
                    }
                }

                function turnOnLed() {
                    // $.ajax({
                    //     url: DOMAIN + "/Home/turnOnLed",
                    //     type: "post",
                    //     data: {
                    //         flag: true,
                    //     },
                    //     success: function(result) {
                    //         console.log(result);
                    //     },
                    // });
                    loop();
                }
            </script>
            <div class="body">
                <div class="home-title">Home</div>
                <ul class="home-leds">
                    <li class="home-led-item d-flex justify-content-between" id="led1" data-bs-toggle="collapse" data-bs-target="#led-detail1">
                        <p>Thiết bị đèn số 1</p>
                        <div class="on-off-button">
                            <div class="circle-on-off"></div>
                        </div>
                    </li>
                    <div id="led-detail1" class="collapse led-detail">
                        <div class="mode">
                            <strong>Mode</strong>
                            <button class="custom-btn btn-6">
                                <span>Auto</span>
                            </button>
                        </div>
                        <p>
                            <strong>Description: </strong> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis sit asperiores vero
                            adipisci vel neque
                        </p>
                    </div>
                </ul>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="./home.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>

</html>