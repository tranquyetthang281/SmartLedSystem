<?php
class LedModel extends Database
{
    function get_all_leds()
    {
        $sql = "SELECT * from led ";
        return $this->get_list($sql);
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
}
