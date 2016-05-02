<?php

namespace App\Modules;

class CSV
{
    private $message = "You're trying to import not correct file.";
    public function ImportCSV($file)
    {
        $ext = SplFileInfo::getExtension($file);
        if($ext!='csv' || $ext!='CSV')
        {
            return $this->message;
        }
        elseif(filesize($file)==null) 
        {
            return "The file your're trying to import is empty.";
        }
        else
        {
            return "The file was imported sucefull.";
        }
        
        
    }
    
    public function ExportCSV($file)
    {
        $ext = SplFileInfo::getExtension($file);
        if($ext!='csv' || $ext!='CSV')
        {
            return $this->message;
        }
        elseif(filesize($file)==null) 
        {
            return "The file your're trying to import is empty.";
        }
        else
        {
            return "The file was imported sucefull.";
        }
        
        
    }
}