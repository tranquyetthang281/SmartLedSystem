<div class="body">
    <div class="statistic-title">Statistics</div>
    <div class="selectpicker led-char">
        <select id="slc-led">
            <option value="leds">Tất cả thiết bị</option>
            <?php
            foreach ($data['leds'] as $key => $value) { ?>
                <option value="led<?php echo $value['id'] ?>">Thiết bị đèn số <?php echo $key + 1 ?></option>
            <?php
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