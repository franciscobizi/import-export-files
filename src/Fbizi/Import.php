<?php
namespace App\Fbizi;
use App\Fbizi\UploadsDownloads;

/**
* Class for importing files as json, xml and csv
* PHP Version 7
* Methods : setUrlWithFileName, import
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Import extends UploadsDownloads
{   

    /**
    * Set url with the file name
    * @param string $url, an url with source file
    * @return object $this, with url
    */
    public function setUrlWithFileName($url)
    {
        parent::setUrlOrPath($url);
        return $this;
    }

    /**
    * Import file and return a message 
    * @return string, an message about the operation status.
    */
    final public function import()
    {
        
        parent::executeImport();
        return $this;
    }


}