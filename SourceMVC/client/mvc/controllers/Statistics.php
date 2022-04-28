<?php

use LDAP\Result;

class Statistics extends Controller
{
    public $data = array();
    protected $historyModel;
    protected $ledModel;
    protected $energyModel;
    function __construct()
    {
        $this->ledModel = $this->model('LedModel');
        $this->energyModel = $this->model('EnergyModel');
        $this->data['render'] = 'Statistics';
        $this->data['leds'] = $this->ledModel->get_all_leds();
        $this->data['time'] = $this->energyModel->getAllMonthYear();
    }
    function Show()
    {
        $this->view("Main", $this->data);
    }
    function getData()
    {
        if (isset($_POST['led_id'])) {
            $ledId = $_POST['led_id'];
            $time = $_POST['time'];
        } else {

            $ledId = $this->data['leds'][0]['id'];
            $time = $this->data['time'][0]['year'] . '-' . $this->data['time'][0]['month'];
        }
        $result = array();
        $time2 = date("t", strtotime($time));
        $t1 = $time . '-1';
        $result[] = array(1 => $this->energyModel->getEnergy($t1, $t1, $ledId));
        for ($i = 5; $i <= (int)$time2; $i += 5) {
            $t2 = $time . '-' . $i;
            // i =25 
            // month have 28 or 29 days
            if ($i + 5 > (int)$time2 && $i + 5 <= 30) {
                $result[] = array($i => $this->energyModel->getEnergy($t1, $t2, $ledId));
                $t2 = $time . '-' . $time2;
                $result[] = array($time2 => $this->energyModel->getEnergy($t1, $t2, $ledId));
            } else if ($i + 5 > (int)$time2 && $i + 5 > 30) {
                $t2 = $time . '-' . $time2;
                $result[] = array($time2 => $this->energyModel->getEnergy($t1, $t2, $ledId));
            } else {
                $result[] = array($i => $this->energyModel->getEnergy($t1, $t2, $ledId));
            }
        }
        echo  json_encode($result);
    }
}
