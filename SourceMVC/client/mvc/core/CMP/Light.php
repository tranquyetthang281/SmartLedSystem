<?php

class Light extends Device
{
    static function sendOnStatus($id_led)
    {
        $feedName = "CPP_LED" . ($id_led - 1);
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('1');
    }

    static function sendOffStatus($id_led)
    {
        $feedName = "CPP_LED" . ($id_led - 1);
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('0');
    }
}
