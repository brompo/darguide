<?php

require_once("../connection.php");

class  location {
	public  $id;
	public $name;

	function __construct($id,$name)
	{
		$this->id = $id;
		$this->name = $name;

		//Call call methods;
		//$this->addlocation();
	}

	
}

?>