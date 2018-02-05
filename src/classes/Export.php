<?php
namespace App\classes;
use App\classes\Message;

/**
* Class for importing files as json, xml and csv
* PHP 7
* Methods : setFile, getFile, imported, json, xml, csv
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Taylorsoft,lda  
*/
class Export extends UploadsDownloads
{
	private $response;
    use Message;

    public function setPathWithFile($url)
    {
        $this->setUDFile($url, 'export');
        return $this;
    }

    public function getFile()
    {
        $this->response = $this->getUDFile();
        return $this;
    }

    final public function save()
    {
        $this->response;
    }


}