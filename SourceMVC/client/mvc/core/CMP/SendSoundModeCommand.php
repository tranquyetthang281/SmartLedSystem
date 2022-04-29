<?php

class SendSoundModeCommand implements Command
{
    private $id_led;

    public function __construct($id_led)
    {
        $this->id_led = $id_led;
    }

    function execute()
    {
        return Light::sendSoundMode($this->id_led);
    }
}
