<?php

class TurnOffLedCommand implements Command
{
    private $id_led;

    public function __construct($id_led)
    {
        $this->id_led = $id_led;
    }

    function execute()
    {
        Light::sendOffStatus($this->id_led);
    }
}
