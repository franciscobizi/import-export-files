<?php

namespace App\Fbizi;

/**
* Class for importing files as json, xml and csv
* PHP Version 7
* Methods : setUrlWithFileName, import
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Import extends UploadsDownloads
{   
    
    private $path; 
    private $result = array();

    use Message;

    public function __construct($path, $data = null)
    {
        $this->path = $path;
    }

    /**
    * Import file and return a message 
    * @return string, an message about the operation status.
    */
    public function import()
    {
        parent::setUrlOrPath($this->path);
        $this->result = parent::executeImport();
        $this->getMessage("Arquivo importado com successo!");
        return $this;
    }

    /**
    * Import file and return a message 
    * @return string, an message about the operation status.
    */
    final public function get()
    {
        return $this->result;
    }

}