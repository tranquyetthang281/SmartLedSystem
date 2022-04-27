<?php

Device::init();

class Device
{
    static $adafruitIO;
    static function init()
    {
        self::$adafruitIO = new AdaFruitIO("aio_NnQN317g8xVIwtOrmrjAIFAmziWc");
    }
}
