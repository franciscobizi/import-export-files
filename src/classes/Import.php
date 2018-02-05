<?php
namespace App\classes;
use App\classes\Message;
use App\classes\UploadsDownloads;

/**
* Class for importing files as json, xml and csv
* PHP 7
* Methods : setFile, getFile, imported, json, xml, csv
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/
class Import extends UploadsDownloads
{
    use Message;

    public function setUrl($url)
    {
        $this->setUDFile($url, 'import');
        return $this;
    }

    public function getFile()
    {
        $this->getUDFile();
        return $this;
    }

    final public function save()
    {
        
        $this->getMessage('Ficheiro importado com sucessso!');
    }


}