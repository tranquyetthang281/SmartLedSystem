<?php

Light::init();

class Light
{
    // static function init()
    // {
    //     self::$ledModel = self::model('LedModel');
    //     self::$historyModel =  self::model('HistoryModel');
    // }

    // static function model($model)
    // {
    //     require_once "./mvc/models/" . $model . ".php";
    //     return new $model;
    // }

    // private static $ledModel;
    // private static $historyModel;

    static $adafruitIO;

    static function init()
    {
        self::$adafruitIO = new AdaFruitIO("aio_NnQN317g8xVIwtOrmrjAIFAmziWc");
    }

    static function sendOnStatus($id_led)
    {
        $feedName = "CPP_LED" . $id_led;
        // $led = self::$adafruitIO->getFeed($feedName);
        $led = self::$adafruitIO->getFeed("CPP_LED0");
        $led->send('1');
    }

    static function sendOffStatus($id_led)
    {
        $feedName = "CPP_LED" . $id_led;
        $led = self::$adafruitIO->getFeed($feedName);
        $led->send('0');
    }

    static function changeStatusCommand()
    {
        
    }
}
