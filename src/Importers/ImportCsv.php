<?php

namespace FBIZI\IE\Importers;

use FBIZI\IE\Interfaces\ImportInterface;
use FBIZI\IE\Helpers\FileHelper;

class ImportCsv implements ImportInterface
{
    private $file_path;
    private $message;

    public function __construct(string $file_path)
    {
        $this->file_path = $file_path;
    }

    public function import(): array
    {
        $this->message = 'Please provide correct source path and data';
        if (!empty($this->file_path)) {
            FileHelper::checkExtention($this->file_path, "csv");
			FileHelper::isEmpty($this->file_path);
            $this->message = 'Failed to import';
			$lines = array();
			if(($fp = fopen($this->file_path, "r")) !== FALSE) {
				while(!feof($fp) && ($line = fgetcsv($fp)) !== false) {
					$lines[] = $line;
				}
				return $lines;
				fclose ($fp);
			}
            return ["message" => $this->message];
        }
        return ["message" => $this->message];
    }
}