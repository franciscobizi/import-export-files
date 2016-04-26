<?php
namespace App\Singleton;
use App\Singleton\DBSingleton;


class Crud 
{
    private $id;
    private $f_name;
    private $l_name;

    protected function info()
    {
        return '#'.$this->id.': '.$this->f_name.' '.$this->l_name;
    }
    
    

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
                
                echo $obj->f_name.' '.$obj->l_name.' | <a href="?id='.$obj->id.'">Edit</a><br>';
                
            }
           
        }
        $this->db_close();
       
    }
    // Delete articule
    public function db_delete($table,$id)
    {
        
        $query = "DELETE {$table} WHERE id = '{$id}'";
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
}
