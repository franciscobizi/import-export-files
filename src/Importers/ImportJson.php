<?php

namespace FBIZI\IE\Importers;

use FBIZI\IE\Interfaces\ImportInterface;
use FBIZI\IE\Helpers\FileHelper;

class ImportJson implements ImportInterface
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
            FileHelper::checkExtention($this->file_path, "json");
            FileHelper::isEmpty($this->file_path);
            $this->message = 'Failed to import';
            if($json = file_get_contents($this->file_path)) {
                return json_decode($json, true);
            }
            return ["message" => $this->message];
        }
        return ["message" => $this->message];
    }
}