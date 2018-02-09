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
    * Setting data to be exported
    * @param array $data, with data
    * @return array $this->data, with data to be exported
    */
    public function setDataToExport(array $data)
    {
        
        try {

            if (!is_array($data)) {

                throw new \Exception ($this->getMessage("Os dados devem estar no formato de array"));
            }

            if (empty($data)) {

                throw new \Exception ($this->getMessage("Os dados não foram fornecidos"));
            }

            $this->data = $data;
            return $this;
            
        } catch (\Exception  $e) {
            
            echo $e->getMessage();

            exit;
        }

    }

    /**
    * Import file and return a message 
    * @return string, an message about the operation status.
    */
    final public function export()
    {
        parent::executeExport($this->data);
        return $this;
    }


}