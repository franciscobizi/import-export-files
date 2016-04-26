<?php

namespace App\Singleton;

class DBSingleton
{
     private static $instance = null;
     
     private function __construct(){}
     private function __wakeup(){}
     private function __clone(){}

     public static function getInstance()
     {
         if(self::$instance == null)
         {
             
             self::$instance = new \mysqli('localhost', 'root','', 'artinov');
         }
         return self::$instance ;
     }
}