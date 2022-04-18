<?php
class Light {
    static function switchOn() {
        echo "light on";
    }

    static function switchOff() {
        echo "light off";
    }
}

interface Command {
    function execute();
}

class CommandOff implements Command {
    function execute() {
        Light::switchOff();
    }
}

class CommandOn implements Command {
    function execute() {
        Light::switchOn();
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