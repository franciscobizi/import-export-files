<?php
namespace App\Fbizi;
use App\Fbizi\UploadsDownloads;

/**
* Class for exporting files as json, xml and csv
* PHP 7
* Methods : setPathWithFileName, export
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Export extends UploadsDownloads
{

    /**
    * Set path with the file name
    * @param string $path, an path with source file
    * @return object $this, with path
    */
    public function setPathWithFileName($path)
    {
        parent::setUrlOrPath($path);
        return $this;
    }

    /**
    * Import file and return a message 
    * @return string, an message about the operation status.
    */
    final public function export()
    {
        parent::executeExport();
        return $this;
    }


}