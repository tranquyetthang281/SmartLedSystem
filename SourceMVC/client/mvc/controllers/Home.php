<?php

class Home extends Controller
{
    public $data;
    public $adafruitIO;

    public function __construct()
    {
        $this->data = 0;
        $this->adafruitIO = new AdaFruitIO("aio_LzKZ65Cn46pYdjXQ6b3Nkgw1oL3t");
    }

    function Show()
    {
        $this->view("HomePage", $this->data);
    }

    function turnOnLed()
    {
        $led0 = $this->adafruitIO->getFeed("CPP_LED0");
        if (isset($_POST["flag"])) {
            if ($_POST["flag"]) {
                $led0->send("1");
            }
        }
        return "success";
    }

    function testGetData()
    {
        $led0 = $this->adafruitIO->getFeed("CPP_LED0");
        echo $led0->get();
    }
}
