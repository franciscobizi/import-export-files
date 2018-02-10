<?php

namespace App\Fbizi;

/**
* Class Csv for manipuling import/export file
* PHP version 7
* Methods : csvImport, csvImport
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @param array $data, array of data to export
* @copyright Taylorsoft,lda  
*/
class Csv
{
	private $data;
	use Message;

	public function __construct($data)
	{
		$this->data = $data;
	}

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
	                
	                foreach ($data as $value) {
	                	
	                	$arr[] = $value;
	                }

	                $row++;

	            } 

	            return $arr;

	            fclose ($handle);
	                    
	        }else{

	        	throw new \Exception($this->getMessage('Arquivo está sendo usado por outro programa!'));
	        	
	        }       
                	
        } catch (\Exception $e) {
            
            $e->getMessage();
               	
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
        	
			$csvFileName = $file;

			if($fp = fopen($csvFileName, 'w')){

		        foreach($this->data as $row){
				    
				    fputcsv($fp, $row); 
				}

				$this->getMessage('Arquivo exportado com sucesso!');

		    }else{

		        throw new \Exception($this->getMessage('Arquivo está sendo usado por outro programa!'));

		    }

			fclose($fp);

        } catch (\Exception $e) {
        	
        	echo $e->getMessage();
        	exit;

        }
                
    }
}