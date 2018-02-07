<?php
namespace App\Fbizi;

use App\Fbizi\Message;

/**
* Class Csv for manipuling import/export file
* PHP version 7
* Methods : csvImport, csvImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/
class Csv
{
	use Message;

	/**
	* Method for manupuling csv import file
	* @param string $file, url with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
	public function csvImport($file)
    {
                           
        try {

        	$row = 0;

	        if(($handle = fopen($file, "r")) !== FALSE)
	        {
	                
	            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
	            {
	                               
	                $arr = ['f_name'=>$data[0],'l_name'=>$data[1]];
	                //$model->db_import('table',$arr); insert data in database
	                echo "{$data[0]} {$data[1]}<br>"; //an exemplo to display imported data
	                                             
	                $row++;
	            }
	                   
	            fclose ($handle);
	                    
	        }

	        $this->getMessage('Ficheiro importado com sucessso!');       
                	
        } catch (Exception $e) {
            
            $this->getMessage('Não foi possível exportar o ficheio!');
               	
        }        
    }

    /**
	* Method for manupuling csv export file
	* @param string $file, path with file source
	* @return string, a success or unsuccess message advising if the file was imported
	*/
    public function csvExport($file)
    {
        
        try {
        	
			//An example JSON string.
			$jsonString = '[{"name":"Fancisco","age":38},{"name":"Sandra","age":21},{"name":"Sara","age":16}]';

			//Decode the JSON and convert it into an associative array.
			$jsonDecoded = json_decode($jsonString, true);

			//Give our CSV file a name.

			$csvFileName = $file;

			//Open file pointer.
			$fp = fopen($csvFileName, 'w');

			//Loop through the associative array.
			foreach($jsonDecoded as $row){
			    //Write the row to the CSV file.
			    fputcsv($fp, $row);
			}

			//Finally, close the file pointer.
			fclose($fp);

			$this->getMessage('Ficheiro exportado com sucessso!');


        } catch (Exception $e) {
        	
        	$this->getMessage('Não foi possível exportar o ficheio!');

        }
                
    }
}