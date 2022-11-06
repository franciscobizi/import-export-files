<?php

namespace FBIZI\IE\Helpers;

class FileHelper
{
    public static function checkExtention($file, $ext)
    {
        $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if($file_ext != $ext){
            throw new \Exception("Not allowed file type. Make sure that the file is type of {$ext}.");
        } 
    }

    public static function isEmpty($file)
    {
        if (file_exists($file) && filesize($file) !== 0) {
            return;
        }
        throw new \Exception("File not exits or is empty!");
    }
}
