<?php

namespace FBIZI\IE;
use FBIZI\IE\Interfaces\ExportInterface;

class Exporter
{
    public $exporter;

    public function __construct(ExportInterface $exporter)
    {
        $this->exporter = $exporter;
    }
}
