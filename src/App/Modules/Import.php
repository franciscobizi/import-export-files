<?php

namespace App\Modules;
use App\Modules\CSV;
use App\Modules\JSON;
use App\Modules\XML;

class Import
{
    private $message = "The class you're trying to use don't exist. Therefore couldn't create the object.";
    public function ICreate($class)
    {
        if(class_exists($class))
        {
            return new $class();
        }
        else
        {
            return $this->message;
        }
    }
}
