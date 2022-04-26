<?php

class Home extends Controller
{
    public $adafruitIO;
    protected $ledModel;
    protected $historyModel;
    public $data = array();

    public function __construct()
    {
        $this->adafruitIO = new AdaFruitIO("aio_EJzC83MmD65yTYJJNkwDMuTv6hRp");
        $this->ledModel = $this->model("LedModel");
        $this->historyModel = $this->model("HistoryModel");
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
        $led0 = $this->adafruitIO->getFeed("CPP_LED0");
        if (isset($_POST['ledId']) && isset($_POST['ledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            $ledStatus = $_POST['ledStatus'] == 0 ? '1' : '0';
            $led0->send($ledStatus);
            if ($this->ledModel->update_status($ledId, $ledStatus)) {
                $time = date("Y-m-d h:i:sa");
                $this->historyModel->addHistory($ledId, $ledStatus, $time);
                echo 'success';
            }
        } else echo 'Failed';
    }

    function ChangeStatusByServer()
    {
        if (isset($_POST['ledId']) && isset($_POST['ledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            if ($this->ledModel->update_status($ledId, $_POST['ledStatus']))
                echo 'success';
        } else echo 'Failed';
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
}
