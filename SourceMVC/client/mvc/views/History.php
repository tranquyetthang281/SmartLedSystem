<div class="body">
    <div class="home-title">History</div>

    <div class="list-led">
        <SELECT id="led" onchange="changeLed(this)">
            <?php
            foreach ($data['leds'] as $key => $value) { ?>
                <option value="led<?php echo $value['id'] ?>">Thiết bị đèn số <?php echo $key + 1 ?></option>
            <?php
            }
            ?>
        </SELECT>
    </div>
    <div class="history-leds">
        <ul id="listHistory">
            <?php foreach ($data['history'] as $key => $value) { ?>
                <li id='history<?php echo $value['id'] ?>'>
                    <?php echo $value['time'] ?>
                    <?php echo $value['action'] == '1' ? 'Turn On' : 'Turn Off' ?>
                    <i class="material-icons icon-remove">delete</i>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div>
        <button class="btn-remove" onclick="removeAll()">Remove All</button>
    </div>
</div>