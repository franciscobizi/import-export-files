<?php

namespace App\Modules;
use App\Model\Model;

class JSON
{
    private $message = "<span class='alert-success'>The file was succefull imported.</span>";
    public function __construct(){}

    public function import($file)
    {
        $model = new Model();
        
	$curl = curl_init($file);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$json = curl_exec($curl);
	curl_close($curl);
        $encoded = json_decode($json);
        
	foreach($encoded->usuarios as $data)
	{
            $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
            $model->db_import('t_artinov',$arr);
	}
        
        return $this->message;
    }
    
    public function export($file)
    {
       
        
    }
}