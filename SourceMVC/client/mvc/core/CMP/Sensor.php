<?php

class Sensor extends Device
{
    static function getInfraredData($id_infra)
    {
        $feedName = "CPP_INFRA";
        $sensor = self::$adafruitIO->getFeed($feedName);
        return $sensor->get();
    }
}
