<?php

namespace App\Fbizi;

/**
* Class Json for manipuling import/export file
* PHP version 7
* Methods : jsonImport, jsonImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @param array $data, array of data to export
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

        	if($json = file_get_contents($file)){

                return $json;

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