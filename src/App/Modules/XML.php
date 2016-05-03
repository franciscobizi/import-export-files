<?php

namespace App\Modules;
use App\Model\Model;

class XML
{
    private $message = "<span class='alert-success'>The file was succefull imported.</span>";
    public function __construct(){}

    public function import($file)
    {
            $model = new Model();
            $xml = simplexml_load_file($file);
 
            foreach ($xml as $data)
            {
                $arr = ['f_name'=>$data->fname,'l_name'=>$data->lname];
                $model->db_import('t_artinov',$arr);
            }
            
            return $this->message;					 
                
    }
    
    public function export($file)
    {
        
        
    }
}