<?php
namespace App\Fbizi;

use App\Fbizi\Message;

/**
* Class Json for manipuling import/export file
* PHP version 7
* Methods : jsonImport, jsonImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Json
{
	use Message;

	/**
	* Method for manupuling json import file
	* @param string $file, url with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
	public function jsonImport($file)
    {
        
        try {

        	$curl = curl_init($file);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $json = curl_exec($curl);
            curl_close($curl);
            $encoded = json_decode($json);
                
            foreach($encoded->usuarios as $data)
            {
                $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
                //$model->db_import('table',$arr); insert data in database
                //echo "{$data->fname} {$data->lname}<br>"; //an exemplo to display imported data
            }

            $this->getMessage('Ficheiro importado com sucessso!');

                           	
        } catch (Exception $e) {
                           	
            $this->getMessage('Não foi possível importar o ficheio!');              
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

        	$jsonString = '[
				{"fname":"Francisco","Age":38},{"fname":"John","Age":21},{"fname":"Sara","Age":24}
			]';

			$csvFileName = $file;

			//Open file pointer.
			$fp = fopen($csvFileName, 'w');

			fwrite($fp, $jsonString);

			fclose($fp);

			$this->getMessage('Ficheiro exportado com sucessso!');
                           	
        } catch (Exception $e) {
                           	
            $this->getMessage('Não foi possível exportar o ficheio!');              
        }
                
    }
}