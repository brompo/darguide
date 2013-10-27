<?php 

//require_once(dirname(__FILE__)."/../models/locationclass.php");
require(dirname(__FILE__)."/../DAO/locationDAO.php");

$locationDAO = new locationDAO();
$message = "";


//add a location
$location_name = $_REQUEST['locationname'];
if (isset($location_name))
{
$GLOBALS[$messsage] = $locationDAO->addlocation($location_name);
}


//delete a location
$locationids = $_POST['locations'];

if (isset($locationids));
{
	foreach($locationids as $locationid)
	{
    $GLOBALS[$messsage] =	$locationDAO->deletelocation($locationid);	
	}
}

//Get location by location ID

$locationvar = $locationDAO->getlocationbyid(100);

if ($locationvar == null)
{
	$message1 = "That location does not exist";
	#Write a function to ask the user to create the location;
	#kill the program
	header("location:../../admin.php?panel=locationpanel&message1 = ".$message1);
}
else
{
	$message2 = "The location exists";
}




header("location:../../admin.php?panel=locationpanel&message1=".$GLOBALS[$message]);


?>