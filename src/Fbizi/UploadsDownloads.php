<?php
namespace App\Fbizi;
use App\Fbizi\Xml;
use App\Fbizi\Json;
use App\Fbizi\Csv;
use App\Fbizi\Message;

/**
* Class parent with global methos
* PHP 7
* Methods : setFile, getFile, imported
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/
class UploadsDownloads
{
	private $file, $extension;
    use Message;

    /**
    * Method for setting file
    * @param string $file with url, file with these extensions json, xml, csv
    * @return object $this, file and extension 
    */
    protected function setUrlOrPath($file)
    {
        
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $this->extension = strtoupper($ext);

        $this->file = $file;

        return $this;

    }

    /**
    * Private methos for checking if file exists and not null
    * @param string $file with url, file with these extensions json, xml, csv
    * @return boolean true or false, true if file exists not null  
    */
    private function isFileAndNotNull($file)
    {
        
        if (file_exists($file) && filesize($file) !== 0) {
            
            return true;

        }else{

            return false;
        }

    }

    /**
    * Method for getting file(csv, xml, json) and import it to App
    * @return object $this, Object with imported data 
    */
    protected function executeImport()
    {
        if ($this->isFileAndNotNull($this->file)) {
            
            switch($this->extension)
            {
                case 'CSV':
                    $csv = new Csv();
                    $this->file = $csv->csvImport($this->file);
                    return $this->file;
                    break;

                case 'JSON':
                    $json = new Json();
                    $this->file = $json->jsonImport($this->file);
                    return $this->file;
                    break;

                case 'XML':
                    $xml = new Xml();
                    $this->file = $xml->xmlImport($this->file);
                    return $this->file;
                    break;
                
                default:
                    $this->getMessage('Arquivo não compatível');
                    break;
                    
            }

        }else{

            $this->getMessage('Arquivo ou pasta não encontrado!');

        }
                 
    }
    
    /**
    * Method for exporting data from json to csv, json and xml
    * @return string, export data to given path 
    */
    public function executeExport()
    {
        
        switch($this->extension)
        {
            case 'CSV':
                $csv = new Csv();
                $this->file = $csv->csvExport($this->file);
                return $this->file;
                break;
            case 'JSON':
                $json = new Json();
                $this->file = $json->jsonExport($this->file);
                return $this->file;
                break;
            case 'XML':
                $xml = new Xml();
                $this->file = $xml->xmlExport($this->file);
                return $this->file;
                break;
                
            default:
                $this->getMessage('Arquivo não compatível');
                break;
                    
        }
          
    }

}