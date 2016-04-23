<?php

namespace App\Model;
//use App\Singleton\Singleton;
use App\Singleton\Crud;

class Model
{
   public function getText()
   {
         //$str = Singleton::getInstance();
         
         //return $str;
   }
   public function getData()
   {
         $str = new Crud();
         $data = $str->db_read('t_artinov',null, 'f_name, l_name');
        
         return $data;
   }
   
   
  
}
