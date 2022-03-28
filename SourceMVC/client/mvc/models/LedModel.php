<?php
class LedModel extends Database
{
    function get_all_leds()
    {
        $sql = "SELECT * from led ";
        return $this->get_list($sql);
    }
}
