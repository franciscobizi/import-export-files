<?php

namespace App\Controller;
use App\Model\Model;
use App\Modules\Import;
use App\Modules\Export;
use App\Controller\Sessions;

class Controller
{
    /*
     * Geting users from the table
     */
    public function read()
    {
         $model = new Model;
        
         return $model->db_read('t_artinov');
        
    }
    /*
     * Delete user from the table
     */
    public function delete($param)
    {
         $model = new Model;
        
         return $model->db_delete('t_artinov',$param);
        
    }
    /*
     * Select user from the table
     */
    public function select_user($id)
    {
         $model = new Model;
        
         return $model->db_read('t_artinov', "WHERE id = $id", "*");
        
    }
    /*
     * Update user in the table
     */
    public function update($data,$id)
    {
         $model = new Model;
        
         return $model->db_update('t_artinov',$data,"id = $id");
        
    }
    /*
     * Create user in the table
     */
    public function create($data)
    {
         $model = new Model;
        
         return $model->db_create('t_artinov',$data);
        
    }
    /*
     * Verify authentication
     */
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
    
    /*
     * Import files
     */
    
    public function ImportFile($files)
    {
        $ext = pathinfo($files, PATHINFO_EXTENSION);
        $exts = strtoupper($ext);
        $class = Import::Create($exts);
        if(!empty($class))
        {
            return $class->import($files);
        }
        
        return "<span class='alert-danger'>The file you're trying to import dosn't correct. Please choose other with correct extension.</span>";
        
    }
    /*
     * Export files
     */
    public function ExportFile($files)
    {
        $ext = pathinfo($files, PATHINFO_EXTENSION);
        $exts = strtoupper($ext);
        $class = Export::Create($exts);
        if('CSV' == $exts)
        {
            $result = $class->ExportCSV($files);
            return $result;
        }
        elseif('JSON' == $exts)
        {
            $result = $class->ExportJSON($files);
            return $result;
        }
        elseif('XML' == $exts)
        { 
            $result = $class->ExportXML($files);
            return $result;
        }
        else
        {
          return "The file you're trying to import ins't correct.";  
        }
    }
}

