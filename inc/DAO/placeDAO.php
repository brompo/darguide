<?php

require_once(dirname(__FILE__)."/../include/connection.php");

//include(dirname(__FILE__)."/../include/session.php");
/**
* 
*/
class placeDAO
{
	
	function __construct()
	{
		# code...
	}

	function addplace($categoryid,$name,$locationid,$description,$service1,$service2,$service3,$service4,$service5,$nearestpoint,$direction,$workinghours,$longitude,$latitude,$email,$phone1,$phone2,$personid,$membership)
	{
		$selectquery = "SELECT name FROM place WHERE name = '$name'";

		$data = mysql_query($selectquery);
		$result = mysql_num_rows($data);
		if ($result == 0)
			{		$insertquery = "INSERT INTO place (category_id,person_id,name,location_id,description,service1,service2,service3,service4,
                service5,nearestPoint,direction,workingHours,longitude,latitude,email,phone1,phone2,status,membership)
             VALUES ('$categoryid','$personid','$name','$locationid','$description',
				'$service1','$service2','$service3','$service4','$service5','$nearestpoint','$direction',
				'$workinghours','$longitude','$latitude','$email','$phone1','$phone2','pending approval','$membership')";


            mysql_query($insertquery) or DIE(mysql_error());
            

            $message = "Place created in the database";
            return $message;
            }
        else
          {
	       $message = "Place already exists in the database";
	       return $message;
            }
    }

function updateplace($categoryid,$name,$locationid,$description,$service1,$service2,$service3,$service4,$service5,$nearestpoint,$direction,$workinghours,$longitude,$latitude,$email,$phone1,$phone2,$id,$status,$membership)
    {
        $updatequery = "UPDATE place SET category_id = '$categoryid',name ='$name',location_id ='$locationid',
        description = '$description',service1 = '$service1',service2 = '$service2',service3 ='$service3',
        service4 = '$service4',service5 = '$service5',nearestPoint ='$nearestpoint',direction='$direction', workingHours = '$workinghours',
        longitude = '$longitude',latitude = '$latitude',email = '$email',phone1 = '$phone1',phone2 = '$phone2',status = '$status', membership = '$membership' WHERE id = '$id'";

            mysql_query($updatequery) or DIE(mysql_error());

            $message = "Place updated in the database";
            return $message;
    }



    function getplaces()
    {
    	$selectquery = "SELECT * FROM place";
    	$data = mysql_query($selectquery);
    	$places = null;

    	while($result = mysql_fetch_array($data))
    	{
    		$places[] = $result;
    	}
    	if($places == null)
    	{
    		return "no places, please add a places";
    	}
    	else
    	{
    		return $places;
    	}
     }
     function getplacesbycategory($categoryid)
     {
        $selectquery = "SELECT * FROM place WHERE category_id = '$categoryid'";
        $data = mysql_query($selectquery);
        $places = null;
        
        while($result = mysql_fetch_array($data))
        {
            $places[] = $result;
        }
        if($places == null)
        {
            return "no places, please add a places";
        }
        else
        {
            return $places;
        }

     }

      function getplacesbyid($id)
     {
        $selectquery = "SELECT * FROM place WHERE id = '$id'";
        $data = mysql_query($selectquery);
        $place = null;
        $place = mysql_fetch_array($data);
        return $place;

     }
     function getplacesbypersonid($personid)
     {
        $selectquery = "SELECT * FROM place WHERE person_id = '$personid'";
        $result = mysql_query($selectquery);
        $place = null;
        while($data = mysql_fetch_array($result))
            {
$place[] = $data;
            }
        return $place;
     }
     
     function getnewestcreatedplace()
     {
        $selectquery = "SELECT * FROM place WHERE id = (SELECT max( id ) FROM place)";
        $data = mysql_query($selectquery);
        $place = null;
        $place = mysql_fetch_array($data); 

        return $place;
     }

     function deleteplace($id)
     {
     	$deletequery = "DELETE FROM place WHERE id = '$id'";
     	mysql_query($deletequery) or DIE(mysql_error());

     	$message = "place deleted";
     	return $message;
     }
}



?>