<?php

use function PHPSTORM_META\type;

class Home extends Controller
{
    // public $adafruitIO;
    protected $ledModel;
    protected $historyModel;
    protected $sensorModel;
    protected $energyModel;
    public $data = array();
    protected $remote;

    public function __construct()
    {
        // $this->adafruitIO = new AdaFruitIO("aio_EJzC83MmD65yTYJJNkwDMuTv6hRp");
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
            $ledMode = $_POST['ledMode'] == 'Auto' ? 'Voice' : 'Auto';
            if ($this->ledModel->update_mode($ledId, $ledMode))
                echo $ledMode;
            else echo 'Failed';
        } else echo 'Failed';
    }

    function ChangeStatus()
    {
        //$led0 = $this->adafruitIO->getFeed("CPP_LED0");
        if (isset($_POST['ledId']) && isset($_POST['newledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            $newledStatus = $_POST['newledStatus'] == 0 ? '1' : '0';
            if ($newledStatus)
                $command = new TurnOnLedCommand($ledId);
            else
                $command = new TurnOffLedCommand($ledId);
            $this->remote->setCommand($command);
            $this->remote->run();
            //$led0->send($newledStatus);
            if ($this->ledModel->update_status($ledId, $newledStatus)) {
                $time = date("Y-m-d h:i:s");
                $lastTime = $this->historyModel->getLastedHistory($ledId)['time'];
                $this->historyModel->addHistory($ledId, $newledStatus, $time);
                if ($newledStatus == '0') {
                    $used_time = strtotime($time) - strtotime($lastTime);
                    $used_energy = $used_time / 3600 * (int)$this->ledModel->get_led($ledId)['wattage'];
                    $this->energyModel->handleEnergy($ledId, $used_energy);
                }
            }
        } else echo 'Failed';

        // $commandOff = new CommandOff(10);
        // $remote->setCommand($commandOff);
        // $remote->run();
    }
    function ChangeStatus2()
    {
        if (isset($_POST['l'])) {
            $l1 = explode(' ', $_POST['l']);
            $flag = '0';
            for ($i = 0; $i + 1 < sizeof($l1); $i += 2) {
                $ledId = (int)$l1[$i];
                $led = $this->ledModel->get_led($ledId);
                // echo '*' . $led['status'];
                if ((int)($l1[$i + 1]) > 50) {

                    $newledStatus = '1';
                } else $newledStatus = '0';

                if ($newledStatus == '1') {
                    if ($led['status'] == '0') {
                        $command = new TurnOnLedCommand($ledId);
                        $this->remote->setCommand($command);
                        $this->remote->run();
                        $flag = '1';
                    }
                } else {
                    if ($led['status'] == '1') {
                        $command = new TurnOffLedCommand($ledId);
                        $this->remote->setCommand($command);
                        $this->remote->run();
                        $flag = '1';
                    }
                }
                //$led0->send($newledStatus);
                if ($this->ledModel->update_status($ledId, $newledStatus)) {
                    $time = date("Y-m-d h:i:sa");
                    $this->historyModel->addHistory($ledId, $newledStatus, $time);
                    echo $flag;
                }
            }
        } else echo 'Failed';
    }
    function ChangeStatusByServer()
    {
        if (isset($_POST['ledId']) && isset($_POST['newledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            if ($this->ledModel->update_status($ledId, $_POST['newledStatus']))
                echo 'success';
        } else echo 'Failed';
    }

    function ChangeStatusByInfrared()
    {
    }

    // function turnOnLed()
    // {
    //     $led0 = $this->adafruitIO->getFeed("CPP_LED0");
    //     if (isset($_POST["flag"])) {
    //         if ($_POST["flag"]) {
    //             $led0->send("1");
    //         }
    //     }
    //     return "success";
    // }

    function testGetData()
    {
        $led0 = $this->adafruitIO->getFeed("CPP_LED0");
        echo $led0->get();
    }

    function getInfraredData()
    {
        $infrared_leds =  $this->sensorModel->get_infrared_leds();
        foreach ($infrared_leds as $key => $value) {
            $command = new GetInfraredDataCommand($value['sensor_id']);
            $this->remote->setCommand($command);
            echo $value['led_id'] . ' ' . $this->remote->run() . ' ';
        }
        // $command = new GetInfraredDataCommand(0);
        // $this->remote->setCommand($command);
        // echo $this->remote->run();
    }
}
