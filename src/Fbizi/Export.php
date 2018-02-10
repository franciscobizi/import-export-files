<?php

namespace App\Fbizi;

/**
* Class for exporting files as json, xml and csv
* PHP 7
* Methods : setPathWithFileName, export
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Export extends UploadsDownloads
{
    private $data = array();
    private $path;

    public function __construct($path, $data)
    {
        $this->data = $data;
        $this->path = $path;
    }

    /**
    * Export file and return a message 
    * @return string, an message about the operation status.
    */
    public function export()
    {
        parent::setUrlOrPath($this->path);
        parent::executeExport($this->data);
        return $this;
    }

}