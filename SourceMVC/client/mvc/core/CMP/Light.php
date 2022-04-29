<?php

class Light extends Device
{
    static function sendOnStatus($id_led)
    {
        $feedName = "CPP_LED" . ($id_led - 1);
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('1');
        return "1";
    }

    static function sendOffStatus($id_led)
    {
        $feedName = "CPP_LED" . ($id_led - 1);
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('0');
        return "1";
    }

    static function sendAutoMode($id_led)
    {
        $feedName = "CPP_MODE_LED0";
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('2');
        return "1";
    }

    static function sendSoundMode($id_led)
    {
        $feedName = "CPP_MODE_LED0";
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('3');
        return "1";
    }
}
