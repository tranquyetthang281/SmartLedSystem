<?php
class Light {
    function switchOn() {
        echo "light on";
    }

    function switchOff() {
        echo "light off";
    }
}

interface Command {
    function execute();
}

class CommandOff implements Command {
    public $id_led;

    function __construct($id_led)
    {
        $this->id_led = $id_led;
    }

    function execute() {
        // $this->light = new Light();
        $this->light->switchOff();
    }
}

class CommandOn implements Command {
    public Light $light;
    
    function execute() {
        // $this->light = new Light();
        $this->light->switchOn();
    }
}

class RemoteControl {
    private Command $command;

    function setCommand(Command $command)
    {
        $this->command = $command;
    }

    function run() {
        if ($this->command)
            $this->command->execute();
    }
}

// $remote = new RemoteControl();
// $commandOff = new CommandOff(10);
// $remote->setCommand($commandOff);
// $remote->run();

class A {
    public static $count = 0;
} 

class B extends A {
    
}

$a = new A();
A::$count = 10;

echo B::$count;


?>