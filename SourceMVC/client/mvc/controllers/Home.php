<?php

class Home extends Controller
{
    public $data = array();
    protected $ledModel;
    public function __construct()
    {
        $this->ledModel = $this->model("LedModel");
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
        if (isset($_POST['ledId']) && isset($_POST['ledStatus'])) {
            $ledId = (int)$_POST['ledId'];
            $ledStatus = $_POST['ledStatus'] == 0 ? '1' : '0';
            if ($this->ledModel->update_status($ledId, $ledStatus))
                echo 'success';
        } else echo 'Failed';
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
