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
    public Light $light;

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

$remote = new RemoteControl();
$commandOff = new CommandOff();
$remote->setCommand($commandOff);
$remote->run();

?>