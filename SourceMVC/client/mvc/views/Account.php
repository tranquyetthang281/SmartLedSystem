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
                    <p>Nguyen Danh Tien Dung</p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>Sex:</b>
                </div>
                <div class="col-9">
                    <p>Nam</p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>User:</b>
                </div>
                <div class="col-9">
                    <p>tiendung</p>
                </div>
            </div>
        </li>
        <li class="inf-item">
            <div class="row">
                <div class="col-3">
                    <b>ID:</b>
                </div>
                <div class="col-9">
                    <p>1912955</p>
                </div>
            </div>
        </li>
    </ol>
    <div class="logout-btn-div">
        <button class="custom-btn btn-out" onclick="alertOut()"><span>Logout</span></button>
    </div>

    <script>
        function alertOut() {
            confirm("Are you sure?");
        }
    </script>
</div>