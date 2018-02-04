<?php

namespace App\Controller;
use App\Model\Model;
use App\Modules\Import;
use App\Modules\Export;
use App\Controller\Sessions;

class Controller
{
    
    /*
     * Import files
     */
    
    public function ImportFile($files)
    {
        $ext = pathinfo($files, PATHINFO_EXTENSION);
        $exts = strtoupper($ext);
        $class = Import::Create($exts);
        if(!empty($class))
        {
            return $class->import($files);
        }
        
        return "<span class='alert-danger'>The file you're trying to import dosn't correct. Please choose other with correct extension.</span>";
        
    }
    /*
     * Export files
     */
    public function ExportFile($files)
    {
        $ext = pathinfo($files, PATHINFO_EXTENSION);
        $exts = strtoupper($ext);
        $class = Import::Create($exts);
        if(!empty($class))
        {
            return $class->export($files);
        }
        
        return "<span class='alert-danger'>The file or table you're trying to export dosn't correct. Please choose other.</span>";
    }
}

