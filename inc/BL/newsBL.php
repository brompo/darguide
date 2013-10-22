<?php

require_once (dirname("__FILE__")."/../DAO/newsDAO.php");
/**
* 
*/
class newsBL
{
	
	protected $heading;
	protected $description;
	protected $link;

	function __construct()
	{
		# code...
		if(isset($_POST["addnews"]))
		{
			$this->heading = $_POST["heading"];
			$this->description = $_POST["description"];
			$this->link = $_POST["link"];

			$this->addnews();
			$message = "news has been added";


			header("location: ../admin.php?panel=newspanel&message=".$message);
		}
	}
	function addnews(){

		$newsDAO = new newsDAO();
		$newsDAO->addnews($this->heading,$this->description,$this->link);
	}
}

$newsBL = new newsBL();
?>