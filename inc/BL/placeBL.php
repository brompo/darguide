<?php 

require_once(dirname(__FILE__)."/../DAO/placeDAO.php");
require_once(dirname(__FILE__)."/../DAO/pictureDAO.php");

require_once(dirname(__FILE__)."/../include/session.php");

//Create objects for the Data Access Objects
$placeDAO = new placeDAO();
$pictureDAO = new pictureDAO();


//declaring user variables

//Server directory in the local machine
//$serverdirectory = "/var/www/images/";

//Server Directory in the cloud
$serverdirectory = "/home/a5712235/public_html/images/";
//$serverdirectory = "/images/";


if(isset($_POST['updatebutton'])) // If the user is updating existing place
{
	//Call the function to set common variables;

	$service2 = $_POST['service2'];
	$locationid = $_POST['locationid'];
	$description = $_POST['description'];
	$service3 = $_POST['service3'];
	$service5 = $_POST['service5'];
	$placename = $_POST['name'];
	$email = $_POST['email'];
	$categoryid = $_POST['categoryid'];
	$nearestpoint = $_POST['nearestpoint'];
	$workinghours = $_POST['workinghours'];
	$service1 = $_POST['service1'];
	$phone1 = $_POST['phone1'];
	$service4 = $_POST['service4'];
	$phone2 = $_POST['phone2'];
	$membership = $_POST['membership'];
	$direction = $_POST['direction'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];

	// Retrieve the place id from the hidden text box
	$placeid = $_POST['placeid'];
	if ($_SESSION['userrole'] != "admin"){
		$status ="pending approval";
	}
	else
	{
		$status = "checked";
	}
	
  //Update a place

	$placeDAO->updateplace($categoryid,$placename,$locationid,$description,$service1,$service2,
		$service3,$service4,$service5,$nearestpoint,$direction,$workinghours,$longitude,$latitude,$email,$phone1,$phone2,$placeid,$status,$membership);

  //Get the current picture
	$orgpicname = $_FILES["file"]["name"];
  //Get the image width and height
	if ($orgpicname != null)
	{
  	//Get the image;
		$filename = $_FILES["file"]["tmp_name"];

  	//Retrive the previous picture
		$previouspicture = $pictureDAO->getpicturebyplaceid($placeid);
		//$picturedirectory = $previouspicture["location"];
		$picturedirectory = $serverdirectory.$placeid.'/';
  	//Delete the previous picture from the file server
		$files = glob($picturedirectory.'*');
		print_r($files);
		foreach ($files as $file) {
			if(is_file($file))
			{
				unlink($file);
			}
		}
		/*
		if ($previouspicture["name"] != null)
		{
			$file = $previouspicture["location"].$previouspicture["name"];
			$thumbnail = $previouspicture["location"]."thumb_".$previouspicture["name"];
			if (file_exists($file)){
				unlink($file) or die("could not delete the picture");		
			}
			if (file_exists($thumbnail)) {
				unlink($thumbnail) or die("could not delete the picture");
			}
		}
		*/
  	//Update the picture in the database;

		$pictureDAO->updatepicture($placeid,$orgpicname,$picturedirectory);

   //Save the new picture into the fileserver;

		move_uploaded_file($filename, $picturedirectory.$orgpicname) or die("could not upload the file");

   //Check the size of the image for creation of the thumbnail
		$img = imagecreatefromjpeg($picturedirectory.$orgpicname);

		$imagewidth = imagesx($img);
		$imageheight = imagesy($img);

		$thumbwidth = 100;
		$thumbheight = 100;

		$thumbnail = imagecreatetruecolor($thumbwidth, $thumbheight);

   //copy the big image to the thumbnail image

		imagecopyresized($thumbnail, $img, 0, 0, 0, 0, $thumbwidth, $thumbheight, $imagewidth, $imageheight);

  //save the thumbnail. 
		imagejpeg($thumbnail,$picturedirectory."thumb_".$orgpicname);

	}


	$message = "place has been updated";

	header("location:../../admin.php?panel=placepanel&message=".$message);

}

//Check if the user is adding new place

if (isset($_POST['addbutton'])) 
{
	$filename = $_FILES["file"]["tmp_name"];
	$orgpicname = $_FILES["file"]["name"];
	$filesize = $_FILES["file"]["size"];
	$filetype = $_FILES["file"]["type"];

//call the function to set common variables

	$service1 = $_POST['service1'];
	$service2 = $_POST['service2'];
	$service3 = $_POST['service3'];
	$service4 = $_POST['service4'];
	$service5 = $_POST['service5'];
	$locationid = $_POST['locationid'];
	$description = $_POST['description'];
	$placename = $_POST['name'];
	$email = $_POST['email'];
	$categoryid = $_POST['categoryid'];
	$nearestpoint = $_POST['nearestpoint'];
	$workinghours = $_POST['workinghours'];
	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$direction = $_POST['direction'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$membership = 0;

	$personid = $_SESSION['id'];
/*
	if (isset($_SESSION['id']))
	{

    $userid = $_SESSION['id'];
    echo $userid;
    return false;
	}
	else
	{
		echo "session not set";
		return false;
	}
*/
   //add the place

	$message = $placeDAO->addplace($categoryid,$placename,$locationid,$description,$service1,$service2,$service3,$service4,$service5,$nearestpoint,$direction,$workinghours,$longitude,$latitude,$email,$phone1,$phone2,$personid,$membership);
   //select the last created place;
	$place = $placeDAO->getnewestcreatedplace();

   //make directory for the new picture
	$picturedirectory = $serverdirectory.$place['id']."/";
	mkdir($picturedirectory,0777) or die("could not create the directory");

   //save a picture for the database;
	$pictureDAO->savepicture($place['id'],$orgpicname,$picturedirectory);

    //copy the uploaded picture to the fileserver
	if ($filename != null){
		move_uploaded_file($filename, $picturedirectory.$orgpicname) or die("could not upload the file");

	//Check the size of the image for creation of the thumbnail
		$img = imagecreatefromjpeg($picturedirectory.$orgpicname);

		$imagewidth = imagesx($img);
		$imageheight = imagesy($img);

		$thumbwidth = 100;
		$thumbheight = 100;

		$thumbnail = imagecreatetruecolor($thumbwidth, $thumbheight);

   //copy the big image to the thumbnail image

		imagecopyresized($thumbnail, $img, 0, 0, 0, 0, $thumbwidth, $thumbheight, $imagewidth, $imageheight);

  //save the thumbnail. 
		imagejpeg($thumbnail,$picturedirectory."thumb_".$orgpicname);
	}
	header("location:../../admin.php?panel=placepanel&message=".$message);
}

//check if the delete button is pressed
if (isset($_POST['deletebutton'])) {
	$placeIDs = $_POST['places'];
	if ($placeIDs != null)
	{
		foreach ($placeIDs as $placeID) {
        //delete place from the place table
			$placeDAO->deleteplace($placeID);

       //delete all the pictures from the picture table, related to the placeID
			$pictureDAO->deletepicturebyplaceID($placeID);

		//delete the picture folder from the file server
			rmdir($serverdirectory.$placeID."/");
		}
	}
	else
	{
		echo "no places to delete";
		return false;
	}
	$message = "place(s) has been removed";
	header("location:../../admin.php?panel=placepanel&message=".$message);
}

// This function sets common variables;
function setcommonvariables()
{
	$service2 = $_POST['service2'];
	$locationid = $_POST['locationid'];
	$description = $_POST['description'];
	$service3 = $_POST['service3'];
	$service5 = $_POST['service5'];
	$placename = $_POST['name'];
	$email = $_POST['email'];
	$categoryid = $_POST['categoryid'];
	$nearestpoint = $_POST['nearestpoint'];
	$workinghours = $_POST['workinghours'];
	$service1 = $_POST['service1'];
	$phone1 = $_POST['phone1'];
	$service4 = $_POST['service4'];
	$phone2 = $_POST['phone2'];
	$membership = $_POST['membership'];
	$direction = $_POST['direction'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];

}

?>