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
	static private $class;
	static private $path;
	static private $data;

	use Message;

	// Self instance
	static public function create($class)
	{	
		self::$class = $class;
		return new self();
	}

	/**
	* This is the build method
	* @param string $class, name of class to be created
	* @return object, the object of class
	*/
	public function setPathWithFileName($path)
	{
		self::$path = $path;
		return $this;

	}

	/**
	* Method for setting export data
	* @param array $data, data to be exported
	* @return object, the object of class
	*/
	public function setDataToExport($data)
	{
		try {

            if (!is_array($data)) {

                throw new \Exception ($this->getMessage("Os dados devem estar no formato de array"));
            }

            if (empty($data)) {

                throw new \Exception ($this->getMessage("Os dados não foram fornecidos"));
            }

            self::$data = $data;
            return $this;
            
        } catch (\Exception  $e) {
            
            echo $e->getMessage();

            exit;
        }

	}
	/**
	* This is the build method
	* @param string $class, name of class to be created
	* @return object, the object of class
	*/
	public function build()
	{

		if(self::$class == "") {
			
			$this->getMessage('falta nome da class, como parametro no metódo create.');
			exit;

		}

		self::$class = 'App\Fbizi'.self::$class;

		if(class_exists(self::$class)){

			return new self::$class(self::$path, self::$data);
			
		}else{

			$this->getMessage('Class não encontrado!');
			exit;
		}

	}
}