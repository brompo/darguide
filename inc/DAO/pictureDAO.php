<?php

/**
* 
*/
require_once(dirname(__FILE__).'/../include/connection.php');

class pictureDAO
{
	
	function __construct()
	{
		# code...
	}

	function savepicture($placeID,$pictureName,$pictureLocation)
	{
		$query = "INSERT INTO picture VALUES('','$placeID','$pictureLocation','$pictureName')";
		$result = mysql_query($query);
	}
	function updatepicture($placeID,$pictureName,$pictureLocation)
	{
		$updatequery = "UPDATE picture SET location = '$pictureLocation', name = '$pictureName'	WHERE place_id = '$placeID' " or die(mysql_error());
		$result = mysql_query($updatequery);
	}
	function getpicturebyplaceid($placeID)
	{
		$query = "SELECT * FROM picture WHERE place_id = '$placeID'";
		$result =  mysql_query($query);

		$picture = mysql_fetch_array($result);
		return $picture;
	}
	function deletepicture($id)
	{
		$query = "DELETE FROM picture WHERE id = '$id'";
		$result = mysql_query($query);
	}
	function deletepicturebyplaceID($placeID)
	{
		$query = "DELETE FROM picture WHERE place_id = '$placeID'";
		$result = mysql_query($query);
	}
}

?>