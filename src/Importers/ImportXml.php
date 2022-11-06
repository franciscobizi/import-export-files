<?php

namespace FBIZI\IE\Importers;

use FBIZI\IE\Interfaces\ImportInterface;
use FBIZI\IE\Helpers\FileHelper;

class ImportXml implements ImportInterface
{
    private $file_path;
    private $message;

    public function __construct(string $file_path)
    {
        $this->file_path = $file_path;
    }

    public function import(): array
    {
        $this->message = 'Please provide correct source path';
        if (!empty($this->file_path)) {
            FileHelper::checkExtention($this->file_path, "xml");
            FileHelper::isEmpty($this->file_path);
            $this->message = 'Failed to import';
            if($xml = simplexml_load_file($this->file_path)) {
				return (array)$xml;
			}
            return ["message" => $this->message];
        }
        return ["message" => $this->message];
    }
}