<?php

//Check if the user is logged in or not

/**
* 
*/

class session
{
	var $logged_in; //returns true if the user is logged in
	
	function __construct()
	{
		session_start();

		if (isset($_SESSION['username']) && isset($_SESSION['userrole']))
		{
			//Set up the session logged_in variable if the Sessions already possess
			$this->logged_in = true;
		}
		else
		{
			//Set up guest credentials when the user is not admin
			$_SESSION['username'] = "guest";
			$_SESSION['userrole'] = "guest";
		}
	}

	function login($username,$password)
	{
		//unset the errors
		unset($_SESSION['numerrors']);
		unset($_SESSION['errors']);
		//Check in the username first
		$_SESSION['errors'] = array();

		//Check if the username are not submitted
		if (!$username || Strlen(trim($username)) == 0){
			$_SESSION['errors']['username'] = "username is not set";
		}
		elseif (!$password || Strlen(trim($password)) == 0) {
			 
		}
		
		//Check the username and password in the database
		$_SESSION['numerrors'] = count($_SESSION['errors']);

        /*
        #If there are no errors on the user interface then
        #try quering the user in the database
        */
        if ($_SESSION['numerrors'] == 0){

        	$userDAO = new userDAO();
        	$user = $userDAO->getuser($username,$password);	

        	$_SESSION['user'] = $user;
			if ($user != null){ // If user exists in the database, save the info into session
				$_SESSION['username'] = $user['username'];
				$_SESSION['userrole'] = $user['userole'];
				$_SESSION['id'] = $user['id'];
			}
			else{ // If the user does not exist display error message
				$_SESSION['errors']['user'] = "user does not exist";
			}			
		}
        $_SESSION['numerrors'] = count($_SESSION['errors']); // redo the counting of errors
    }

    function register($username,$password,$firstname,$middlename,$lastname,$gender)
    {
		//Unset the error variables
    	unset($_SESSION['numerrors']);
    	unset($_SESSION['errors']);

		//Check if the fields are filled;

		//Check if the username is empty
    	if (!$username || Strlen(trim($username)) == 0){
    		$_SESSION['errors']['newusername'] = "*";
    	}
		//Check if the password is empty
    	if (!$password || Strlen(trim($password)) == 0){
    		$_SESSION['errors']['newpassword'] = "*";
    	}
		//Check if the firstname is empty
    	if (!$firstname || Strlen(trim($firstname)) == 0){
    		$_SESSION['errors']['firstname'] = "*";
    	}
		//Check if the middlename is empty
    	if (!$middlename || Strlen(trim($middlename)) == 0){
    		$_SESSION['errors']['middlename'] = "*";
    	}
		//Check if the lastnamae is empty
    	if (!$lastname || Strlen(trim($lastname)) == 0){
    		$_SESSION['errors']['lastname'] = "*";
    	}
		//Check if the gender is empty
    	if (!$gender || Strlen(trim($gender)) == 0){
    		$_SESSION['errors']['gender'] = "*";
    	}

	$_SESSION['numerrors'] = count($_SESSION['errors']); // redo the counting of errors

	if($_SESSION['numerrors'] == 0)
	{

	$userDAO = new userDAO();
	$user = $userDAO->adduser($username,$password,$firstname,$middlename,$lastname,$gender);

	$_SESSION['user'] = $user;
	    if ($user != null)
	    {
		$_SESSION['errors']['registerError'] = "user saved";
			$_SESSION['numerrors'] = count($_SESSION['errors']); // redo the counting of errors
	    }
		else{
			$this->login($username,$password);
		}		
	}
	else
	{
		$_SESSION['errors']['registerError'] = "fields left empty";
	}

}

	function logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['userrole']);
		unset($_SESSION['id']);
		$this->logged_in = false;
	}
}

//Create a session object
$session = new session();
?>