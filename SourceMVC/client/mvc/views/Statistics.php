
<div class="body">
    <div class="statistic-title">Statistics</div>
    <div class="selectpicker led-char">
        <select id="slc-led" onchange="changeStatistics()">
            <?php
            foreach ($data['leds'] as $key => $value) { ?>
                <option value="led<?php echo $value['id'] ?>">Thiết bị đèn số <?php echo $key + 1 ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="time-char">
        <select id="slc-time" onchange="changeStatistics()">
            <?php
            $currentM = date('m');
            $currentY = date('y');
            foreach ($data['time'] as $key => $value) {
                if ((int)$value['year'] != (int)$currentY && (int)$value['month'] != (int)$currentM) {
            ?>
                    <option value="<?php echo $value['year'] . '-' . $value['month'] ?>"><?php echo $value['month'] . "/" . $value['year'] ?></option>
            <?php }
            }
            ?>
        </select>
    </div>
    <div class="charts">
        <canvas id="myChart"></canvas>
    </div>
    <div class="statistic-total">Tổng điện năng: 300(kWh)</div>
</div>