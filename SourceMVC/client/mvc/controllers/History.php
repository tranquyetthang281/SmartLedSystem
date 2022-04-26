<?php
class History extends Controller
{
    public $data = array();
    protected $historyModel;
    protected $ledModel;
    function __construct()
    {
        $this->ledModel = $this->model('LedModel');
        $this->historyModel = $this->model('HistoryModel');
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
        echo json_encode($result) ? json_encode($result) : 'Failed';
    }
    function deleteHistory()
    {
        $historyId = $_POST['historyId'];
        $history = $this->historyModel->getHistoryById($historyId);
        $result = $this->historyModel->deleteHistory($historyId);
        if ($result) {
            $data = $this->historyModel->getHistoryByLed($history['led_id']);
            echo json_encode($data) ? json_encode($data) : 'Failed';
        }
    }
    function deleteAll()
    {
        $ledId = $_POST['ledId'];
        if ($ledId == -1) {
            $ledId = $this->data['leds'][0]['id'];
        }
        $this->historyModel->deleteAll($ledId);
        echo '';
    }
}
