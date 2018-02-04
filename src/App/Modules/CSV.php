<?php

namespace App\Modules;
use App\Model\Model;

class CSV
{
    private $message = "<span class='alert-success'>The file was succefull imported.</span>";
    public function __construct(){}

    public function import($file)
    {
        $model = new Model();
        $row = 0;
        if(($handle = fopen($file, "r")) !== FALSE)
        {
		
    		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    		{
                       
                $arr = ['f_name'=>$data[0],'l_name'=>$data[1]];
                $model->db_import('t_artinov',$arr);
    								 
                $row++;
            }

		    return $this->message;					 
            fclose ($handle);
            
        }
        
        
    }
    
    public function export($file)
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