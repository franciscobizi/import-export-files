<?php

namespace App\Singleton;

class DBSingleton
{
     private static $instance = null ;

     private function __construct()
     { 
         
     }
     private function _wakeup(){}
     private function _clone(){}

     public static function getInstance()
     {
         if(self::$instance == null)
         {
             //self::$instance = new self();
             self::$instance = @mysqli_connect('localhost','root','','artinov') or die('Naoooooooooooooo');
         }
         return self::$instance ;
     }
}