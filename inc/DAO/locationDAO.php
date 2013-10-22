<?php

require_once(dirname(__FILE__).'/../include/connection.php');
/**
* 
*/
class locationDAO
{
	function __construct()
	{
		# code...
	}

	function addlocation($name)
	{
		$selectquery = "SELECT name FROM location WHERE name = '$name'";
		$locationresult = mysql_query($selectquery) or die(mysql_error());

		$data = mysql_fetch_array($locationresult);
		if ($data == null)
		{
        $locationquery = "INSERT INTO location VALUES ('','$name')";

		mysql_query($locationquery) or DIE(mysql_error());
		$message = "Location'$name' is saved in the database";
		return $message;
		}
		else
		{
			$message = "$name location already exists";
			return $message;
		}
	}
	
	function getlocations()
	{
		$locationquery = "SELECT * FROM location";
		$locationsresult = mysql_query($locationquery) or die(mysql_error());
		$locations = null;
        

		while($data = mysql_fetch_array($locationsresult))
		{
			$locations[] = $data;
		}

		if ($locations == null)
		{
			echo "no locations found in the database, add new";
		}
		else
		{
		 return $locations;
		}
	}

	function getlocationbyid($id)
	{
		$locationquery = "SELECT * FROM location WHERE id = '$id'";
		$locationsresult = mysql_query($locationquery) or die(mysql_error());
		$location = null;

		$location = mysql_fetch_array($locationsresult);
		return $location;
	}

	function deletelocation($id)
	{
		$deletequery = "DELETE FROM location WHERE id = '$id'";
		mysql_query($deletequery) or DIE(mysql_error());
		$message = "location(s) has been deleted";
		return $message;
	}

}
?>