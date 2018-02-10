<?php

namespace App\Fbizi;

/**
* Class xml for manipuling import/export file
* PHP version 7
* Methods : xmlImport, xmlImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @param array $data, array of data to export
* @copyright Francisco Bizi  
*/
class Xml
{
	private $data;
	use Message;

	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	* Method for manupuling xml import file
	* @param string $file, url with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
	public function xmlImport($file)
    {
        
    	try {
    		
	        if($xml = simplexml_load_file($file)){

				return $xml;

			}else{

				throw new \Exception($this->getMessage('Arquivo está sendo usado por outro programa!'));	
			}
			                             	
    	} catch (\Exception $e) {
    		
    		$e->getMessage();
    	}
    }

    /**
	* Method for manupuling xml export file
	* @param string $file, path with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
    public function xmlExport($file)
    {

		$xmlFileName = $file;

        try{

			$xml = new \SimpleXMLElement('<Users></Users>');

			if ($this->isMultiArray($this->data)) {
					
				$keys = array_keys($this->data[0]);

				foreach($this->data as $row){

					$user = $xml->addChild('user');

					foreach ($keys as $key) {
							
						$user->addChild("{$key}","{$row[$key]}");

					}
						
				}

			}else{

				$user = $xml->addChild('user');

				foreach($this->data as $key => $row){

					$user->addChild("{$key}","{$row}");
						
				}
			}
 				
			file_put_contents($xmlFileName, $xml->asXML());

			$this->getMessage('Arquivo exportado com sucesso!');
			  	
        }catch(\Exception $e){

           	$e->getMessage();
           	exit;
        }   
        
    }
	
	// Checking if array is multi, return true if it is 
    private function isMultiArray($array) 
    {
	    $array = array_filter($array,'is_array');

	    if(count($array) > 0) return true;

	    return false;
	}
}
