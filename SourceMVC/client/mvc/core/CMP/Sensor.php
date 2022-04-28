<?php

class Sensor extends Device
{
    static function getInfraredData($id_infra)
    {
        $feedName = "CPP_INFRA" . ($id_infra - 3);
        $sensor = self::$adafruitIO->getFeed($feedName);
        return $sensor->get();
    }

    static function getSoundData($id_sound)
    {
        $feedName = "CPP_SOUND" . ($id_sound - 1);
        $sensor = self::$adafruitIO->getFeed($feedName);
        return $sensor->get();
    }
}
