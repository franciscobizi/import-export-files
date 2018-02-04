<?php

namespace App\Build;

/**
* Class to build other class
* Using pattern Builder
*/
class Build 
{
	private $class;

	static public function create($class)
	{
		$this->class = $class;
		return new static;
	}

	public function build()
	{
		return new $this->class();
	}


}