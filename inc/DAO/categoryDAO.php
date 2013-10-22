<?php

require_once(dirname(__FILE__).'/../include/connection.php');

/**
* 
*/
class categoryDAO
{
	
	function __construct()
	{
		# code...
	}

	function addcategory($name)
	{
		$selectquery = "SELECT name FROM category WHERE name = '$name'";
		$categoryresult = mysql_query($selectquery) or die(mysql_error());

		$data = mysql_fetch_array($categoryresult);
		if ($data == null)
		{
        $categoryquery = "INSERT INTO category VALUES ('','$name')";

		mysql_query($categoryquery) or DIE(mysql_error());
		$message = "Category '$name' is saved in the database";
		return $message;
		}
		else
		{
			$message = "$name category already exists";
			return $message;
		}

	}
	function getcategories()
	{
		$getcategoriesquery = "SELECT * FROM category";

		$categoriesresult = mysql_query($getcategoriesquery) or DIE(mysql_error());
		$categories = null;
		while($data = mysql_fetch_array($categoriesresult))
		{
			$categories[] = $data;
		}

		if ($categories == null)
		{
			echo "There are no categories, please add new categories";
		}
		else
		{
			return $categories;
		}

	}

	function getcategorybyid($id)
	{
		$getcategoryquery = "SELECT * FROM category WHERE id = '$id'";
		$result = mysql_query($getcategoryquery);

		$category = mysql_fetch_array($result);
		return $category;
	}

	function deletecategories($id)
	{
		$deletequery = "DELETE FROM category WHERE id = '$id'";
		mysql_query($deletequery) or die(mysql_error());
		$message = "category(s) has been deleted";
		return $message;
	}

}

?>