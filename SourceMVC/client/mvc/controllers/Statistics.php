<?php

class Statistics extends Controller
{
    protected $ledModel;
    public $data = array();

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
}
