<?php

namespace FBIZI\IE\Exporters;

use FBIZI\IE\Helpers\ArrayHelper;
use FBIZI\IE\Interfaces\ExportInterface;
use FBIZI\IE\Helpers\FileHelper;

class ExportXml implements ExportInterface
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
            FileHelper::checkExtention($this->file_path, "xml");
            $this->message = 'Failed to export';

            $xml_objet = new \SimpleXMLElement("<root />");

			if (ArrayHelper::isMultiDimension($this->data)) {
					
				$keys = array_keys($this->data[0]);

				foreach($this->data as $row) {
					$xml_child_object = $xml_objet->addChild('object');
					foreach ($keys as $key) {
						$xml_child_object->addChild("{$key}","{$row[$key]}");
					}
				}
                $this->message = 'Exported successful!';
			}else{
				$xml_child_object = $xml_objet->addChild('object');
				foreach($this->data as $key => $row){
					$xml_child_object->addChild("{$key}","{$row}");
				}
                $this->message = 'Exported successful!';
			}	
			file_put_contents($this->file_path, $xml_objet->asXML());
            return $this->message;
        }
        return $this->message;
    }
}
