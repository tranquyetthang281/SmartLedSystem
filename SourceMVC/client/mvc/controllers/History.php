<?php
class History extends Controller
{
    public $data = array();
    protected $historyModel;
    protected $ledModel;
    function __construct()
    {
        $this->ledModel = $this->model('LedModel');
        $this->historyModel = $this->model('historyModel');
        $this->data['render'] = 'History';
        $this->data['leds'] = $this->ledModel->get_all_leds();
        $this->data['history'] = $this->historyModel->getHistoryByLed($this->data['leds'][0]['id']);
    }
    function Show()
    {
        $this->view("Main", $this->data);
    }
    function getHistory()
    {
        $ledId = $_POST['ledId'];
        $result = $this->historyModel->getHistoryByLed($ledId);
        echo $result ? $result : 'Failed';
    }
}
