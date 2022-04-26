<?php

class ChangeStatusCommand implements Command
{
    function execute()
    {
        Light::changeStatusCommand();
    }
}