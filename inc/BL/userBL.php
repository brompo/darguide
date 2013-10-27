<?php

/**
* 
*/
require_once(dirname(__FILE__)."/../DAO/userDAO.php");
//
require_once(dirname(__FILE__)."/../include/session.php");

class userBL
{
    //setting up variables	
	protected $username; //Submitted username from the form
	protected $password; //Submitted password from the form
	protected $userids = array();
	protected $userid;
	protected $userrole;
	var $errors = array();
	var $numerrors;

    // Class Constructor
	function __construct()
	{
		global $session;

		//check if the user has submitted the login form
		if (isset($_POST['login']))	{
			$this->username = $_POST['username'];
			$this->password = $_POST['password'];

			// Call the function to login user
			$this->loginUser();
		}

		//check if the user has submitted the registration form
		else if (isset($_POST['newuser'])){
			$this->username = $_POST['newusername'];
			$this->password = $_POST['newpassword'];

			$this->registerUser();
		}
		//check if the admin wants to delete users
		else if(isset($_POST['deletebutton']))
		{
			$this->userids = $_POST['users'];
			if($this->userids != null)
			{
				foreach($this->userids as $userid)
				{
					$this->deleteuser($userid);
				}
			}
			header("location:../../admin.php?panel=userpanel");
		}
		//check if the admin wants to approve users
		else if (isset($_POST['approve']))
		{

			$this->userid = $_POST['id'];
			$this->userrole = $_POST['userrole'];

			$this->updateuser($this->userid,$this->userrole);

			header("location: ../../admin.php?panel=userpanel");
		}
		//The only other reason that a person 
		else if($session->logged_in){
			$this->logoutUser();
		}
	}
	
    // function to login in user
	function loginUser(){
		//Attempt Login
		global $session;
		$loginResult = $session->login($this->username,$this->password);


		/*
		# If there are errors then redirect to user.php
        # If there are no errors then redirect to admin.php
		*/
		$_SESSION['numerrors']>0 ? header("location:../../user.php") : header("location:../../admin.php");

	}

    //register user function
	function registerUser(){

		global $session;

		//retrive values posted from the form
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		
		$registerResult = $session->register($this->username,$this->password,$firstname,$middlename,$lastname,$gender);
		/*
		#
		#
		*/
		$_SESSION['numerrors'] > 0 ? header("location:../../user.php") : header("location:../../admin.php");
	}
	function updateuser($userid,$userrole){
		$userDAO = new userDAO();
		$userDAO->updateuser($userid,$userrole);
	}

	function logoutUser(){
		global $session;
		$retval = $session->logout();
		header("Location: ../../user.php");
	}


	function deleteUser($id)
	{
		$userDAO = new userDAO();
       $userDAO->deleteruser($id);
	}

}// Class UserBL

#Create a userBL object
$userBL = new UserBL();



?>