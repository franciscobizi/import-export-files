<?php

namespace App\Controller;
use App\Model\Model;
use App\View\View;
use App\Controller\Sessions;

class Controller
{
    public function index()
    {
         $model = new Model;
         $view  = new View;
         $view->render($model->getText());
        
    }
    
    public function read()
    {
         $model = new Model;
        
         return $model->getData();
        
    }
    
    public function select_user($data,$param)
    {
         $model = new Model;
        
         return $model->getData();
        
    }
    public function update($data,$param)
    {
         $model = new Model;
        
         return $model->update($data,$param);
        
    }
    
    public function create($data)
    {
         $model = new Model;
        
         return $model->create($data);
        
    }
    
    public function securit($user,$pass)
    {
        
        if(empty($user) && empty($pass))
        {
            return 'Error! Please fill all fields.';
        }
        elseif($user!='francisco' && $pass!='12345')
        {
            return "Error! Username or password it's not correct.";
        }
        else
        {
            $sessao = new Sessions();
            $sessao->start();
            $sessao->setValue('USER',$user);
            return ucfirst($sessao->getValue('USER'))."! You're logon <a href='http://localhost/fabrica/users'>Go to you profile.</a>";
        }
        
    }
    
    
}

