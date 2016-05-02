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
    
    public function ImportFile($class,$files)
    {
        $arq = new Import();
        
        if($class == 'CSV')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ImportCVS($files);
            return $result;
        }
        elseif($class == 'JSON')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ImportJSON($files);
            return $result;
        }
        elseif($class == 'XML')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ImportXML($files);
            return $result;
        }
    }
    /*
     * Export files
     */
    public function ExportFile($class,$files)
    {
        $arq = new Export();
        
        if($class == 'CSV')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ExportCVS($files);
            return $result;
        }
        elseif($class == 'JSON')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ExportJSON($files);
            return $result;
        }
        elseif($class == 'XML')
        {
            $arquivo = $arq->ICreate($class);
            $result = $arquivo->ExportXML($files);
            return $result;
        }
    }
}

