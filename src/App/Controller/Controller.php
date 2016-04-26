<?php

namespace App\Controller;
use App\Model\Model;
//use App\View\View;
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
        
         return $model->db_read('t_artinov');
        
    }
    
    public function delete($param)
    {
         $model = new Model;
        
         return $model->db_delete('t_artinov',$param);
        
    }
    
    public function select_user($id)
    {
         $model = new Model;
        
         return $model->db_read('t_artinov', "WHERE id = $id", "*");
        
    }
    public function update($data,$id)
    {
         $model = new Model;
        
         return $model->db_update('t_artinov',$data,"id = $id");
        
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

