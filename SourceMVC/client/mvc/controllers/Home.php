<?php

class Home extends Controller
{
    public $data = array();

    public function __construct()
    {
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
