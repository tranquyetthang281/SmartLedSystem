<?php
class EnergyModel extends Database
{
    function checkUsed($ledId, $time)
    {
        $sql = "SELECT * from used_energy WHERE led_id = {$ledId} AND time = '{$time}'";
        $data = $this->get_one($sql);
        return $this->get_one($sql) ? $data : 'None';
    }

    function handleEnergy($ledId, $energy)
    {
        // $used_time (hours)
        $time =  date("Y-m");
        $used_energy = $this->checkUsed($ledId, $time);
        if ($used_energy != 'None') {
            $energy = (float)$used_energy['energy'] + $energy;
            $this->updateEnergy($ledId, $energy, $time);
        } else {
            $this->addNewEnergy($ledId, $energy, $time);
        }
    }
    function addNewEnergy($ledId, $energy, $time)
    {
        $sql = "INSERT INTO used_energy(led_id,energy,time) VALUE ({$ledId},{$energy},'{$time}')";
        return $this->query($sql);
    }
    function updateEnergy($ledId, $energy, $time)
    {
        $sql = "UPDATE used_energy SET energy = {$energy} WHERE led_id = {$ledId} AND time = '{$time}'";
        return $this->query($sql);
    }
}
