<?php

namespace App\Model;
use App\Singleton\Crud;

class Model
{
   public function update($data,$param)
   {
         $str = new Crud();
         $data = $str->db_update('t_artinov',$data,$param);
        
         return $data;
   }
   public function getData()
   {
         $str = new Crud();
         $data = $str->db_read('t_artinov',null, '*');
        
         return $data;
   }
   
   public function create($data)
   {
         $str = new Crud();
         $data = $str->db_create('t_artinov',$data);
        
         return $data;
   }
   
  
}
