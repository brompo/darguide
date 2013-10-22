<?php

include_once(dirname(__FILE__)."/../include/connection.php");

class userDAO
{
	
	function __construct()
	{
		#
	}

	function adduser($username,$password,$firstname,$middlename,$lastname,$gender)
	{
		$user = $this->getuser($username,$password);
		if ($user == null)
		{
			$insertquery = "INSERT INTO user VALUES ('','$username','$password','guest','$firstname','$middlename','$lastname','$gender','pending')";
			$result = mysql_query($insertquery);

			$message = "$username is added in the database";
		}
		else
		{
			return $user;
		}
		return $message;
	}
	function getusers()
	{
		$selectquery = "SELECT * FROM user";
		$data = mysql_query($selectquery);

		while ($result = mysql_fetch_array($data))
		{
         $users[] = $result;
		}
		return $users;
	}
	function getuserbyuserid($id)
	{
		$selectquery = "SELECT * FROM user WHERE id = '$id'";
        $result = mysql_query($selectquery);

        $user = mysql_fetch_array($result);

        return $user;
	}

	function getuser($username,$password)
	{
		$selectquery = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
		$data = mysql_query($selectquery);

		$user = mysql_fetch_array($data);

		return $user;
	}
	function updateuser($userid,$userrole)
	{
		$updatequery = "UPDATE user SET userole = '$userrole', status = 'checked' WHERE id = '$userid'";
		$result = mysql_query($updatequery);
	}

	function deleteruser($id)
	{
		$deletequery = "DELETE FROM user WHERE id = '$id'";
		$result = mysql_query($deletequery) or die(mysql_error());
	}

}
?>