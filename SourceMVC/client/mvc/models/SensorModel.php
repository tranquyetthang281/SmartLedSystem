<?php
class SensorModel extends Database
{
    // function get_all_leds()
    // {
    //     $sql = "SELECT * from led ";
    //     return $this->get_list($sql);
    // }
    // function update_mode($id, $mode)
    // {
    //     $sql = "UPDATE led SET mode = '{$mode}' where id = {$id}";
    //     return $this->query($sql);
    // }
    // function update_status($id, $status)
    // {
    //     $sql = "UPDATE led SET status = '{$status}' where id = {$id}";
    //     return $this->query($sql);
    // }
    function get_infrared_leds()
    {
        // $sql = "SELECT * FROM sensor where sensor.type = 'infrared'";
        $sql = "SELECT sensor_id, led_id FROM sensor_control_led,sensor where sensor.id = sensor_control_led.sensor_id and sensor.type = 'infrared'";
        return $this->get_list($sql);
    }
}
