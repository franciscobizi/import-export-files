<?php
namespace App\Singleton;
use App\Singleton\DBSingleton;


class Crud
{
    
    public function db_create($table,array $data)
    {
        $link = DBSingleton::getInstance();
        $data = $this->escape_str($data);
        $fields = implode(',', array_keys($data));
        $values = "'".implode("','", array_values($data))."'";
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $result = @mysqli_query($link, $query);
        if(!result)
        {
            echo 'Not created sucessefull...<br>';
        }
        else
        {
            echo 'Sucessefull create...<br>';
        }
        $this->db_close();
        
    }
    // Update articule
    public function db_update($table, array $data, $where = null)
    {
        $link = DBSingleton::getInstance();
        $data = $this->escape_str($data);
        foreach ($data as $keys => $values)
        {
            $fields[] = "{$keys} = '{$values}'";
        }
        $fields = implode(',', $fields);
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "UPDATE {$table} SET {$fields}{$where}";
        $result = @mysqli_query($link, $query) or die("Alguma coisa esta indo mal na execucao da query...<br>");
        if(!$result)
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
        $link = DBSingleton::getInstance();
        
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$fields} FROM {$table}{$params}";
        $result = @mysqli_query($link, $query) or die("Alguma coisa esta indo mal na execucao da query...<br>");
        
        if(!mysqli_num_rows($result))
        {
            return "Not found any articule...<br>";
        }
        else 
        {
            while($res = mysqli_fetch_assoc($result))
            {
                echo $res['f_name'].' '.$res['l_name'].'<br>';
                
            }
           
        }
        
       
    }
    // Delete articule
    public function db_delete($table,$id)
    {
        $link = DBSingleton::getInstance();
        $query = "DELETE {$table} WHERE id = '{$id}'";
        $result = @mysqli_query($link, $query) or die("Alguma coisa esta indo mal na execucao da query...<br>");
        if(!$result)
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
    public function db_close()
    {
        $link = DBSingleton::getInstance();
        @mysqli_close($link) or die(mysqli_error($link));
    }
    // Escape SQL INJECTION;
    public function escape_str($data)
    {
        $link = DBSingleton::getInstance();
        if(!is_array($data))
        {
            $data = mysqli_real_escape_string($link,$data);
        }
        else
        {
            $arr = $data;
            foreach($arr as $keys => $values)
            {
                $keys        = mysqli_real_escape_string($link,$keys);
                $values      = mysqli_real_escape_string($link,$values);
                $data[$keys] = $values;
            }
        }
        
        $this->db_close();
        return $data;
        
    }
}
