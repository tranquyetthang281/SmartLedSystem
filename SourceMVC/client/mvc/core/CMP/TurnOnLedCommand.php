<?php

class TurnOnLedCommand implements Command
{
    private $id_led;

    public function __construct($id_led)
    {
        $this->id_led = $id_led;
    }

    function execute()
    {
        return Light::sendOnStatus($this->id_led);
    }
}