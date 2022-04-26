<?php
class HistoryModel extends Database
{
    function addHistory($ledId, $status, $time)
    {
        $query = "INSERT INTO history(led_id,action,time) VALUE ({$ledId}, '{$status}' , '{$time}')";
        $this->query($query);
    }
    function getHistoryByLed($ledId)
    {
        $sql = "SELECT * FROM history WHERE led_id = {$ledId} ";
        return $this->get_list($sql);
    }
}
