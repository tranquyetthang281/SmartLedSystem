<?php

class Light
{
    static function init()
    {
        self::$ledModel = self::model('LedModel');
        self::$historyModel =  self::model('HistoryModel');
    }

    static function model($model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model;
    }

    private static $ledModel;
    private static $historyModel;

    static function switchOn()
    {
        echo "light on";
    }

    static function switchOff()
    {
        echo "light off";
    }
    static function changeStatusCommand()
    {
        
    }
}
