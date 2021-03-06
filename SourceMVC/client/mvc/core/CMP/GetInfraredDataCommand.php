<?php

class GetInfraredDataCommand implements Command
{
    private $id_infra;

    public function __construct($id_infra)
    {
        $this->id_infra = $id_infra;
    }

    function execute()
    {
        return Sensor::getInfraredData($this->id_infra);
    }
}
