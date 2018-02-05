<?php
namespace App\classes;
use App\classes\Message;
/**
* Class parent with global methos
* PHP 7
* Methods : setFile, getFile, imported
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/

/**
* 
*/
class UploadsDownloads
{
	private $file, $action, $extension;
	use Message;

    /**
    * Method for setting file
    * @param string $file with url, file with these extensions json, xml, csv
    * @return object $this, file and extension 
    */
    public function setUDFile($file, $action = null)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $this->extension = strtoupper($ext);
        $this->action = $action;
        
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
    public function getUDFile()
    {
        
        switch($this->extension)
        {
            case 'CSV':
                $this->file = $this->csv($this->file, $this->action);
                return $this;
                break;
            case 'JSON':
                $this->file = $this->json($this->file, $this->action);
                return $this;
                break;
            case 'XML':
                $this->file = $this->xml($this->file, $this->action);
                return $this;
                break;
            
            default:
                
        }
             
    }

    ####################################################
    /**
    * Private methods for importing each type of file
    * methods: json, xml, csv 
    */
    ####################################################
    private function json($file, $action = '')
    {
        if ($action == "import") {

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

            $this->getMessage('Ficheiro exportado com sucessso!');

        }elseif($action == "export"){

			$jsonString = '[
				{"fname":"Francisco","lname":28},{"fname":"John","lname":21},{"fname":"Sara","lname":24}
			]';

			$csvFileName = $file;

			//Open file pointer.
			$fp = fopen($csvFileName, 'w');

			fwrite($fp, $jsonString);

			fclose($fp);

			$this->getMessage('Ficheiro exportado com sucessso!');

        }else{

            $this->getMessage('Insira acção a ser executada');
        }
        
        
    }

    private function xml($file, $action = '')
    {
        if ($action == "import") {

            $xml = simplexml_load_file($file);
 
	        foreach ($xml as $data)
	        {
	            $arr = ['f_name'=>$data->fname,'l_name'=>$data->lname];
	            //$model->db_import('table',$arr); insert data in database
	            //echo "{$data->fname} {$data->lname}<br>"; // an exemplo to display imported data
	        }

	        $this->getMessage('Ficheiro importado com sucessso!');

        }elseif($action == "export"){

        	//An example JSON string.
			$jsonString = '[{"name":"Wayne","age":28},{"name":"John","age":21},{"name":"Sara","age":24}]';

			//Decode the JSON and convert it into an associative array.
			$jsonDecoded = json_decode($jsonString, true);

			//Give our CSV file a name.

			$csvFileName = $file;

			$x = new \XMLWriter();
			$x->openMemory();
			$x->startDocument('1.0','UTF-8');
			$x->startElement('Users');

			//Open file pointer.
			$fp = fopen($csvFileName, 'w');

			//Loop through the associative array.
			foreach($jsonDecoded as $row){
			    //Write the row to the CSV file.
			    fputcsv($fp, $x->writeAttribute($row));
			}

			$x->endElement(); // users
			$x->endDocument();
			$xml = $x->outputMemory();
			//Finally, close the file pointer.
			fclose($fp);

			$this->getMessage('Ficheiro exportado com sucessso!');

        }else{

            $this->getMessage('Insira acção a ser executada');
        }                   
                
    }

    private function csv($file, $action = '')
    {
        if ($action == "import") {

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
	        
        }elseif($action == "export"){

			//An example JSON string.
			$jsonString = '[{"name":"Wayne","age":28},{"name":"John","age":21},{"name":"Sara","age":24}]';

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

        }else{

            $this->getMessage('Insira acção a ser executada');
        }                   
                
    }

    
}