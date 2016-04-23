<?php

namespace App\Controller;
use App\Model\Model;
use App\View\View;

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
         $view  = new View;
         $view->renderData($model->getData());
        
    }
    
    
    
}

