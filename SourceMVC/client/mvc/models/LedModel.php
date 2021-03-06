<?php
class LedModel extends Database
{
    function get_all_leds()
    {
        $sql = "SELECT * from led ";
        return $this->get_list($sql);
    }
    function get_led($ledId)
    {
        $sql = "SELECT * from led WHERE id = {$ledId}";
        return $this->get_one($sql);
    }
    function update_mode($id, $mode)
    {
        $sql = "UPDATE led SET mode = '{$mode}' where id = {$id}";
        return $this->query($sql);
    }
    function update_status($id, $status)
    {
        $sql = "UPDATE led SET status = '{$status}' where id = {$id}";
        return $this->query($sql);
    }
    function get_count_leds()
    {
        $sql = "SELECT COUNT(id) FROM led AS num";
        return $this->get_one($sql);
    }
}
