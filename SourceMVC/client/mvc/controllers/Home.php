<?php

class Home extends Controller
{
    public function __construct()
    {
    }

    function Show()
    {
        $this->view("Home", $this->data);
    }
}
