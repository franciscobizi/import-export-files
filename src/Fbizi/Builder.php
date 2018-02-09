<?php

namespace App\Fbizi;
require "/../../config/config.php";

/**
* Builder class for creating another class
* PHP 7
* Methods : create, build
* @author Francisco Bizi, <taylorsoft28@gmail.com>
* @copyright Francisco Bizi  
*/
class Builder 
{
	private $class;
	use Message;

	// Self instance
	static public function create()
	{	
		return new self();
	}

	/**
	* This is the build method
	* @param string $class, name of class to be created
	* @return object, the object of class
	*/
	public function build($class = "")
	{
		$this->class = $class;

		if($this->class == "") {
			
			$this->getMessage('falta nome da class, como parametro no metódo build.');
			exit;

		}

		$this->class = 'App\Fbizi'.$this->class;

		if(class_exists($this->class)){

			return new $this->class();
			
		}else{

			$this->getMessage('Class não encontrado!');
			exit;
		}

	}
}