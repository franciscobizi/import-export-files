<?php
namespace App\classes;
use App\classes\Message;

/**
* Class for importing files as json, xml and csv
* PHP 7
* Methods : setFile, getFile, imported, json, xml, csv
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/
class Import
{
    private $file, $extension, $imported;
    use Message;

    /**
    * Method for setting file
    * @param string $file with url, file with these extensions json, xml, csv
    * @return object $this, file and extension 
    */
    public function setFile($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $this->extension = strtoupper($ext);
        
        switch($this->extension)
        {
            case 'CSV':
                $this->file = $file;
                return $this;
                break;
            case 'JSON':
                $this->file = $file;
                return $this;
                break;
            case 'XML':
                $this->file = $file;
                return $this;
                break;
            
            default:
                
        }
    }

    /**
    * Method for getting file and import it to App
    * @return object $this, Object with imported data 
    */
    public function getFile()
    {
        
        switch($this->extension)
        {
            case 'CSV':
                $this->imported = $this->csv($this->file);
                return $this;
                break;
            case 'JSON':
                $this->imported = $this->json($this->file);
                return $this;
                break;
            case 'XML':
                $this->imported = $this->xml($this->file);
                return $this;
                break;
            
            default:
                
        }
        
        
    }

    /**
    * Private methods for importing each type of file
    * methods: json, xml, csv 
    */
    final public function Imported()
    {
        
        $this->getMessage('Ficheiro importado com sucessso!');
        //return $this->imported;
    }

    ####################################################
    /**
    * Private methods for importing each type of file
    * methods: json, xml, csv 
    */
    ####################################################
    private function json($file)
    {
        
        $curl = curl_init($file);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($curl);
        curl_close($curl);
        $encoded = json_decode($json);
            
        foreach($encoded->usuarios as $data)
        {
            $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
            //$model->db_import('table',$arr); insert data in database
            //echo "{$data->fname} {$data->lname}<br>"; an exemplo to display imported data
        }
        
    }

    private function xml($file)
    {
        
        $xml = simplexml_load_file($file);
 
        foreach ($xml as $data)
        {
            $arr = ['f_name'=>$data->fname,'l_name'=>$data->lname];
            //$model->db_import('table',$arr); insert data in database
            //echo "{$data->fname} {$data->lname}<br>"; // an exemplo to display imported data
        }                   
                
    }

    private function csv($file)
    {
        
        $row = 0;

        if(($handle = fopen($file, "r")) !== FALSE)
        {
                
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                               
                $arr = ['f_name'=>$data[0],'l_name'=>$data[1]];
                //$model->db_import('table',$arr); insert data in database
                //echo "{$data[0]} {$data[1]}<br>"; an exemplo to display imported data
                                             
                $row++;
            }
                   
            fclose ($handle);
                    
        }                   
                
    }
}