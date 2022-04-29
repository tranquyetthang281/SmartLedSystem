<?php

// $INFRARED_MIN = 50;
// $SOUND_MIN = 200;

class Home extends Controller
{
    protected $ledModel;
    protected $historyModel;
    protected $sensorModel;
    protected $energyModel;
    public $data = array();
    protected $remote;

    public function __construct()
    {
        $this->remote = new RemoteControl();
        $this->ledModel = $this->model("LedModel");
        $this->historyModel = $this->model("HistoryModel");
        $this->sensorModel = $this->model("SensorModel");
        $this->energyModel = $this->model("EnergyModel");
        $this->data['leds'] = $this->ledModel->get_all_leds();
    }

    function Show()
    {
        $this->view("Main", $this->data);
    }

    function RenderPage($render)
    {
        $this->data['render'] = $render;
        $this->view("Main", $this->data);
    }

    function ChangeMode()
    {
        if (isset($_POST['ledId']) && isset($_POST['ledMode'])) {
            $ledId = (int)$_POST['ledId'];
            $ledMode = $_POST['ledMode'] == 'Auto' ? 'Sound' : 'Auto';
            if ($this->ledModel->update_mode($ledId, $ledMode))
                echo $ledMode;
            else echo 'Failed';
        } else echo 'Failed';
    }

    function ChangeStatus()
    {
        //$led0 = $this->adafruitIO->getFeed("CPP_LED0");
        if (isset($_POST['ledId']) && isset($_POST['ledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            $newLedStatus = $_POST['ledStatus'] == 0 ? '1' : '0';
            if ($newLedStatus)
            $command = new TurnOnLedCommand($ledId);
            else
            $command = new TurnOffLedCommand($ledId);
            $this->remote->setCommand($command);
            $this->remote->run();
            //$led0->send($newLedStatus);
            if ($this->ledModel->update_status($ledId, $newLedStatus)) {
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $time = date("Y-m-d h:i:s");
                $lastTime = $this->historyModel->getLastedHistory($ledId)['time'];
                $this->historyModel->addHistory($ledId, $newLedStatus, $time);
                if ($newLedStatus == '0') {
                    $used_time = strtotime($time) - strtotime($lastTime);
                    $used_energy = $used_time / 3600 * (int)$this->ledModel->get_led($ledId)['wattage'];
                    $this->energyModel->handleEnergy($ledId, $used_energy);
                }
            }
        } else echo 'Failed';
    }
    
    function ChangeStatusBySensor()
    {
        if (isset($_POST['l'])) {
            $l1 = explode(' ', $_POST['l']);
            $flag = '0';
            for ($i = 0; $i + 1 < sizeof($l1); $i += 2) {
                $ledId = (int)$l1[$i];
                $led = $this->ledModel->get_led($ledId);
                // echo '*' . $led['status'];
                if ($led['mode'] == 'Auto') {
                    if ((int)($l1[$i + 1]) > 50) {
                        $newLedStatus = '1';
                    } else $newLedStatus = '0';
                } else {
                    if ((int)($l1[$i + 1]) > 200) {
                        $newLedStatus = $led['status'] == '1' ? '0' : '1';
                    } else continue;
                }

                // if ((int)($l1[$i + 1]) > 50) {
                //     $newLedStatus = '1';
                // } else $newLedStatus = '0';

                if ($newLedStatus == '1') {
                    if ($led['status'] == '0') {
                        $command = new TurnOnLedCommand($ledId);
                        $this->remote->setCommand($command);
                        $this->remote->run();
                        $flag = '1';
                        //$led0->send($newLedStatus);
                        if ($this->ledModel->update_status($ledId, $newLedStatus)) {
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $time = date("Y-m-d h:i:s");
                            $lastTime = $this->historyModel->getLastedHistory($ledId)['time'];
                            $this->historyModel->addHistory($ledId, $newLedStatus, $time);
                            if ($newLedStatus == '0') {
                                $used_time = strtotime($time) - strtotime($lastTime);
                                $used_energy = $used_time / 3600 * (int)$this->ledModel->get_led($ledId)['wattage'];
                                $this->energyModel->handleEnergy($ledId, $used_energy);
                            }
                        }
                    }
                } else {
                    if ($led['status'] == '1') {
                        $command = new TurnOffLedCommand($ledId);
                        $this->remote->setCommand($command);
                        $this->remote->run();
                        $flag = '1';
                        //$led0->send($newLedStatus);
                        if ($this->ledModel->update_status($ledId, $newLedStatus)) {
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            $time = date("Y-m-d h:i:s");
                            $lastTime = $this->historyModel->getLastedHistory($ledId)['time'];
                            $this->historyModel->addHistory($ledId, $newLedStatus, $time);
                            if ($newLedStatus == '0') {
                                $used_time = strtotime($time) - strtotime($lastTime);
                                $used_energy = $used_time / 3600 * (int)$this->ledModel->get_led($ledId)['wattage'];
                                $this->energyModel->handleEnergy($ledId, $used_energy);
                            }
                        }
                    }
                }
            }
            echo $flag;
        } else echo 'Failed';
    }

    function getSensorData()
    {
        $infrared_sensors =  $this->sensorModel->get_infrared_sensors();
        foreach ($infrared_sensors as $key => $value) {
            $led = $this->ledModel->get_led($value['led_id']);
            if ($led['mode'] == 'Auto') {
                $command = new GetInfraredDataCommand($value['sensor_id']);
                $this->remote->setCommand($command);
                echo $value['led_id'] . ' ' . $this->remote->run() . ' ';
            }
        }

        $sound_sensors =  $this->sensorModel->get_sound_sensors();
        foreach ($sound_sensors as $key => $value) {
            $led = $this->ledModel->get_led($value['led_id']);  
            // if ($led['mode'] == 'Sound') {
            if ($led['mode'] != 'Auto') {
                $command = new GetSoundDataCommand($value['sensor_id']);
                $this->remote->setCommand($command);
                echo $value['led_id'] . ' ' . $this->remote->run() . ' ';
            }
        }
    }
}
