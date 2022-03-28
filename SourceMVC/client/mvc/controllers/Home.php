<?php

class Home extends Controller
{
    public $data = 0;

    public function __construct()
    {
    }

    function Show()
    {
        $this->view("HomePage", $this->data);
    }

    function turnOnLed()
    {
        if(isset($_POST["flag"]))
        {
            if($_POST["flag"])
            {
                
            }
        }
        return "success";
    }
}
