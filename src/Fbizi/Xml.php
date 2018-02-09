<?php

namespace App\Fbizi;

/**
* Class xml for manipuling import/export file
* PHP version 7
* Methods : xmlImport, xmlImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
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

				foreach ($xml->dpessoal as $data){

				    $arr = ['f_name'=>$data->fname,'l_name'=>$data->lname];

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
	* Method for manupuling xml export file
	* @param string $file, path with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
    public function xmlExport($file)
    {

		$xmlFileName = $file;

        try{

				$xml = new \SimpleXMLElement('<Users></Users>');
 				
				foreach($this->data as $row){

					$user = $xml->addChild('user');
					$user->addChild("name","{$row['name']}");
					$user->addChild("age","{$row['age']}");
					$user->addChild("role","{$row['role']}");
				}
				
				file_put_contents($xmlFileName, $xml->asXML());

				$this->getMessage('Arquivo exportado com sucesso!');
			  	
        }catch(\Exception $e){

           	$e->getMessage();
           	exit;
        }   
        
    }
}
