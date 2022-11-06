<?php

namespace FBIZI\IE\Helpers;

class ArrayHelper
{
    public static function isMultiDimension($array) 
    {
	    $array = array_filter($array,'is_array');

	    if(count($array) > 0) return true;

	    return false;
	}
    
}
