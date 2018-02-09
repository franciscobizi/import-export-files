<?php

namespace App\Fbizi;

/**
* Class Json for manipuling import/export file
* PHP version 7
* Methods : jsonImport, jsonImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Json
{
	private $data;
    use Message;

    public function __construct($data)
    {
        $this->data = $data;
    }

	/**
	* Method for manupuling json import file
	* @param string $file, url with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
	public function jsonImport($file)
    {
        
        try {

        	if($curl = curl_init($file)){

                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $json = curl_exec($curl);
                curl_close($curl);
                $encoded = json_decode($json);
                    
                foreach($encoded->usuarios as $data)
                {
                    $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
                    //$model->db_import('table',$arr); insert data in database
                }

                $this->getMessage('Arquivo importado com sucesso!');

            }else{

                throw new \Exception($this->getMessage('Arquivo está sendo usado por outro programa!'));
                
            }
                           	
        } catch (\Exception $e) {
                           	
            $e->getMessage();              
        }                   
                
    }

    /**
	* Method for manupuling json export file
	* @param string $file, path with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
    public function jsonExport($file)
    {
        
        try {

			$csvFileName = $file;

			if($fp = fopen($csvFileName, 'w')){

    			fwrite($fp, json_encode($this->data));

    			fclose($fp);

    			$this->getMessage('Arquivo exportado com sucesso!');

            }else{

                throw new \Exception($this->getMessage('Arquivo está sendo usado por outro programa!'));    
            }
                           	
        } catch (\Exception $e) {
                           	
            $e->getMessage();              
        }
                
    }
}