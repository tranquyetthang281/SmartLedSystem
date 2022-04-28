<?php
$DOMAIN = 'http://localhost/SmartLedSystem/SourceMVC/client/';
?>
<div class="body">
    <div>
        <ion-icon name="person-circle-outline" class="account-icon"> </ion-icon>
        <!-- <div class="account-char">Information</div> -->
    </div>
    <ol class="account-inf">
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>Name:</b>
                </div>
                <div class="col-9">
                    <p><?php echo $data['userInfo']['name'] ?></p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>Sex:</b>
                </div>
                <div class="col-9">
                    <p><?php echo $data['userInfo']['sex'] == 'M' ? 'Nam' : 'Nữ' ?></p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>User:</b>
                </div>
                <div class="col-9">
                    <p><?php echo $data['userInfo']['username'] ?></p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>ID:</b>
                </div>
                <div class="col-9">
                    <p> <?php echo $data['userInfo']['id'] ?> </p>
                </div>
            </div>
        </li>
    </ol>
    <div class="logout-btn-div">
        <button class="custom-btn btn-out"><span>
                <a href="<?php echo $DOMAIN . 'Login/Logout' ?>"> Logout</a>
            </span></button>
    </div>

</div>