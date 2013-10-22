<?php

require_once(dirname(__FILE__)."/../DAO/categoryDAO.php");

$categoryDAO = new categoryDAO();
$message = "";

//add category
$name = $_POST["categoryname"];
if(isset($name))
{
$GLOBALS[$message] = $categoryDAO->addcategory($name);
}

//delete categories 
$ids = $_POST['categories'];
if($ids != null)
{
	foreach($ids as $id)
	{
		$GLOBALS[$message] = $categoryDAO->deletecategories($id);
	}
}

header("location:../../admin.php?panel=categorypanel&message=".$GLOBALS[$message]);


?>