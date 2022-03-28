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
        $cmd = 'python -u main.py';
        while (@ob_end_flush());
        $proc = popen($cmd, 'r');
        while (!feof($proc)) {
            echo fread($proc, 4096);
            @flush();
        }
        pclose($proc);
        return "success";
    }
}
