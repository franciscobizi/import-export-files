<?php
namespace App\classes;

trait Message{

	public function getMessage($message = ''){

		echo"<h3>$message</h3>";
	}

}