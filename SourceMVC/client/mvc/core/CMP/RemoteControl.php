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
            $this->command->execute();
    }
}
