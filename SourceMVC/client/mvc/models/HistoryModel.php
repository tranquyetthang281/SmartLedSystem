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
    function getHistoryById($historyId)
    {
        $sql = "SELECT * FROM history WHERE id = {$historyId} ";
        return $this->get_one($sql);
    }
    function deleteHistory($id)
    {
        $sql = "DELETE from history WHERE id = {$id}";
        return $this->query($sql);
    }
    function deleteAll($id)
    {

        $sql =  "DELETE from history WHERE led_id = {$id}";
        return $this->query($sql);
    }
}
