<div class="body">
    <div class="home-title">Home</div>
    <ul class="home-leds">
        <?php
        foreach ($data['leds'] as $key => $value) { ?>
            <li class="home-led-item d-flex justify-content-between" id="led<?php echo $value['id'] ?>">
                <p data-bs-toggle="collapse" data-bs-target="#led-detail<?php echo $value['id'] ?>">Thiết bị đèn số <?php echo $key + 1  ?></p>
                <div class="on-off-button <?php echo $value['status'] == 1 ? 'check-on-off' : '' ?>">
                    <div class="circle-on-off"></div>
                </div>
            </li>
            <div id="led-detail<?php echo $value['id'] ?>" class="collapse led-detail">
                <div class="mode">
                    <strong>Mode</strong>
                    <button class="mode-btn btn-6">
                        <span><?php echo $value['mode'] ?></span>
                    </button>
                </div>
                <p>
                    <strong>Description: </strong> <?php echo $value['description'] ?>
                </p>
            </div>
        <?php }
        ?>
    </ul>
</div>
<script>
    // on off button
</script>