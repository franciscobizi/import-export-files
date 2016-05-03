<?php

namespace App\Modules;
use App\Modules\CSV;
use App\Modules\JSON;
use App\Modules\XML;

class Import
{
    
    public function __construct(){}

    public static function Create($type = '')
    {
        $class = $type;
        
        switch($class)
        {
            case 'CSV':
                return new CSV();
                break;
            case 'JSON':
                return new JSON();
                break;
            case 'XML':
                return new XML();
                break;
            
            default:
                
        }
    }
}
