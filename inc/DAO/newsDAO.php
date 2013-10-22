<?php
/**
* 
*/
require_once(dirname(__FILE__).'/../include/connection.php');

class newsDAO
{
	
	function __construct()
	{
		# code...
	}
    
    //add new news into the database
	function addnews($heading,$description,$link){
		$addquery = "INSERT INTO news values('','$heading','$description','$link')";
		$result = mysql_query($addquery) or die(mysql_error());
	}

	function getnews()
	{
		$getnewsquery = "SELECT * FROM news";
		$result = mysql_query($getnewsquery);

		while ($data = mysql_fetch_array($result)) {
			$news[] = $data;
		}
		return $news;
	}
     
    //edit news in the database
	function editnews($id,$heading,$description,$link){
		//$editquery = "UPDATE news SET ";

	}
    
    //delete news from the database
	function deletenews($id){
		$deletequery = "DELETE FROM news WHERE id = '$id'";
		$result = mysql_query($deletequery) or die(mysql_error());
	}
}

?>