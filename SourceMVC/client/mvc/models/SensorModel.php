<?php
class SensorModel extends Database
{
    function get_sound_sensors()
    {
        // $sql = "SELECT * FROM sensor where sensor.type = 'infrared'";
        $sql = "SELECT sensor_id, led_id FROM sensor_control_led,sensor where sensor.id = sensor_control_led.sensor_id and sensor.type = 'sound'";
        return $this->get_list($sql);
    }

    function get_infrared_sensors()
    {
        // $sql = "SELECT * FROM sensor where sensor.type = 'infrared'";
        $sql = "SELECT sensor_id, led_id FROM sensor_control_led,sensor where sensor.id = sensor_control_led.sensor_id and sensor.type = 'infrared'";
        return $this->get_list($sql);
    }
}
