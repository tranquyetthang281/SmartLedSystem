<?php

class GetSoundDataCommand implements Command
{
    private $id_sound;

    public function __construct($id_sound)
    {
        $this->id_sound = $id_sound;
    }

    function execute()
    {
        return Sensor::getSoundData($this->id_sound);
    }
}
