<?php

namespace FBIZI\IE\Exporters;

use FBIZI\IE\Interfaces\ExportInterface;
use FBIZI\IE\Helpers\FileHelper;

class ExportJson implements ExportInterface
{
    private $data;
    private $file_path;
    private $message;

    public function __construct(array $data, string $file_path)
    {
        $this->data = $data;
        $this->file_path = $file_path;
    }

    public function export()
    {
        $this->message = 'Please provide correct target path and data';
        if (!empty($this->data) && !empty($this->file_path)) {
            FileHelper::checkExtention($this->file_path, "json");
            $this->message = 'Failed to export';
            if ($fp = fopen($this->file_path, 'w')) {
                fwrite($fp, json_encode($this->data));
                fclose($fp);
                $this->message = 'Arquivo exportado com sucesso!';
            }
            return $this->message;
        }
        return $this->message;
    }
}
