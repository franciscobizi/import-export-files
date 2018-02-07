<?php
namespace App\Fbizi;

use App\Fbizi\Message;

/**
* Class xml for manipuling import/export file
* PHP version 7
* Methods : xmlImport, xmlImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Xml
{
	use Message;

	/**
	* Method for manupuling xml import file
	* @param string $file, url with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
	public function xmlImport($file)
    {
        
    	try {
    		
	        $xml = simplexml_load_file($file);
	 
			foreach ($xml as $data){

			    $arr = ['f_name'=>$data->fname,'l_name'=>$data->lname];

			}

			$this->getMessage('Ficheiro importado com sucessso!');                   
	                	
    	} catch (Exception $e) {
    		
    		$this->getMessage('Não foi possível importar o ficheio!');
    	}
    }

    /**
	* Method for manupuling xml export file
	* @param string $file, path with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
    public function xmlExport($file)
    {
        
        $jsonString = '[{"name":"Fancisco","age":38},{"name":"Sandra","age":21},{"name":"Sara","age":16}]';

		$jsonDecoded = json_decode($jsonString, true);

		$xmlFileName = $file;

        try{
	
			$x = new \XMLWriter();
			$x->openMemory();
			$x->startDocument('1.0','UTF-8');
			$x->startElement('Users');

			$fp = fopen($xmlFileName, 'w');

			foreach($jsonDecoded as $row)
			{
			    
			    fputxml($fp, $x->writeAttribute($row));
					
			}

			$x->endElement();
			$x->endDocument();
			$xml = $x->outputMemory();

			fclose($fp);
			$this->getMessage('Ficheiro exportado com sucessso!');
           	
        }catch(Exception $e){

           	$this->getMessage('Não foi possível exportar o ficheio!');
        }   
        
    }
}
