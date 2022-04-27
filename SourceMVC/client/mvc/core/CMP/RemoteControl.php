<?php

class RemoteControl
{
    private Command $command;

    function setCommand(Command $command)
    {
        $this->command = $command;
    }

    function run()
    {
        if ($this->command)
            return $this->command->execute();
        return "0";
    }
}
