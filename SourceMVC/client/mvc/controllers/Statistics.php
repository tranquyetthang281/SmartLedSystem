<?php

class Statistics extends Controller
{
    public $data = array();
    protected $historyModel;
    protected $ledModel;
    function __construct()
    {
        $this->ledModel = $this->model('LedModel');
        $this->data['render'] = 'Statistics';
        // $this->data['count_leds'] = $this->ledModel->get_count_leds();
        $this->data['leds'] = $this->ledModel->get_all_leds();
    }
    function Show()
    {
        $this->view("Main", $this->data);
    }
}
