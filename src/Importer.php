<?php

namespace FBIZI\IE;
use FBIZI\IE\Interfaces\ImportInterface;

class Importer
{
    public $importer;

    public function __construct(ImportInterface $importer)
    {
        $this->importer = $importer;
    }
}