<?php

namespace App\Model;
use App\Singleton\DBSingleton;

class Model
{
    private function getConnection()
    {
        $link = DBSingleton::getInstance();
        return $link;
    }

    public function db_create($table,array $data)
    {
        
        $data = $this->escape_str($data);
        $fields = implode(',', array_keys($data));
        $values = "'".implode("','", array_values($data))."'";
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $result = $this->getConnection()->query($query);
        if(!count($result))
        {
            echo 'Not created sucessefull...<br>';
        }
        else
        {
            echo 'Sucessefull created...<br>';
        }
        $this->db_close();
        
    }
    // Update articule
    public function db_update($table, array $data, $where = null)
    {
       
        $data = $this->escape_str($data);
        foreach ($data as $keys => $values)
        {
            $fields[] = "{$keys} = '{$values}'";
        }
        $fields = implode(',', $fields);
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "UPDATE {$table} SET {$fields}{$where}";
        $result = $this->getConnection()->query($query);
        if(!count($result))
        {
            return "Wasn't possible to update row...<br>";
        }
        else 
        {
            
            return 'Sucessefull updated...<br>';
        }
        $this->db_close();
    }
    // Reading articules
    public function db_read($table,$params=null, $fields = '*')
    {
        
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$fields} FROM {$table}{$params}";
        $result = $this->getConnection()->query($query);
        
        if(!count($result))
        {
            return "Not found any articule...<br>";
        }
        else 
        {
            while($obj = mysqli_fetch_object($result))
            {
                
                $data[] = $obj;
                
            }
            return $data;
        }
        $this->db_close();
       
    }
    // Delete articule
    public function db_delete($table,$id)
    {
        
        $query = "DELETE FROM {$table} WHERE id = '{$id}'";
        $result = $this->getConnection()->query($query);
        if(!count($result))
        {
            return "Wasn't possible to delete...<br>";
        }
        else 
        {
            
            return 'Sucessefull Deleted...<br>';
        }
        $this->db_close();
        
    }
    // Close connection
    private function db_close()
    {
        @mysqli_close($this->getConnection()) or die(mysqli_error($this->getConnection()));
        
    }
    // Escape SQL INJECTION;
    private function escape_str($data)
    {
        
        if(!is_array($data))
        {
            $data = mysqli_real_escape_string($this->getConnection(),$data);
        }
        else
        {
            $arr = $data;
            foreach($arr as $keys => $values)
            {
                $keys        = mysqli_real_escape_string($this->getConnection(),$keys);
                $values      = mysqli_real_escape_string($this->getConnection(),$values);
                $data[$keys] = $values;
            }
        }
        
        return $data;
        
    }
    /*
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
   */
  
}
