<?php

require_once(dirname(__FILE__)."/../include/connection.php");
/**
* 
*/
class routeDAO
{
	
	function __construct()
	{
		# code...
	}

	//add functions
	//add a place
	function addplace($name,$area,$location,$description){
		$insertquery = "INSERT INTO route_place VALUES ('','$name','$area','$location','$description')";
        //execute the query
		$result = mysql_query($insertquery) or die(mysql_error());
	}
	//function to add a bus
	function addbus($rount_name,$from,$to){
		$insertquery = "INSERT INTO route_bus VALUES ('','$route_name','$from','$to')";
		//execute the query
		$result = mysql_query($insertquery);
	}
	//function to add a bus stop
	function addstop($bus_id,$place_id,$stop_no){
		$insertquery = "INSERT INTO route_stop VALUES ('$bus_id','$place_id','$stop_no')";
		//execute the query
		$result = mysql_query($insertquery);
	}

	//select functions 

	function getplaces(){
		$selectquery = "SELECT * FROM route_place ORDER BY name";
		$result = mysql_query($selectquery) or die(mysql_error());
		$places = null;
		while($data = mysql_fetch_array($result))
		{
			$places[] = $data;
		}
		return $places;
	}

	function getplacebyid($place_id){
		$selectquery = "SELECT * FROM route_place WHERE id = '$place_id'";
		$result = mysql_query($selectquery) or die(mysql_error());

		$place = mysql_fetch_array($result);
		return $place;
	}

	function getstopdetail($bus_id,$place_id)
	{
		$selectquery = "SELECT * FROM route_stop WHERE bus_id = '$bus_id' AND place_id = '$place_id'";
		$result = mysql_query($selectquery) or die(mysql_error());
		$stop = mysql_fetch_array($result);
		return $stop;
	}

	function getbusdetails($bus_id){
		$selectquery = "SELECT * FROM route_bus WHERE id = '$bus_id'";
		$result = mysql_query($selectquery) or die(mysql_error());

		$bus = mysql_fetch_array($result);
		return $bus;
	}

	function selectstop($stop_id){}

	function findroute($from,$to)
	{
		$selectquery = "SELECT * FROM route_stop as firststop WHERE firststop.place_id = $to
		AND firststop.bus_id IN (SELECT bus_id FROM route_stop as secondstop WHERE secondstop.place_id = $from 
			AND secondstop.stop_no < firststop.stop_no)";

	$result = mysql_query($selectquery) or die(mysql_error());
	if($result != false && mysql_num_rows($result)){

		$route = mysql_fetch_array($result);
		return $route;	
	}
	else
	{
		return false;
	}
}

	//edit functions
function editplace($id,$name,$area,$location,$description){}
function editbus($id,$rount_name,$from,$to){}
function editstop($bus_id,$place_id,$stop_no){}

	//delete functions
function deleteplace($id){}
function deletebus($id){}
	//function deletestop($bus_id,$place_id,$stop_no){}


	/*
	function addroute($routename,$routepointA,$routepointB,$routeprice,$transtype,$routedistance){
		$insertquery = "INSERT into routes VALUES ('','$routename','$routepointA','$routepointB',
			'$routeprice','$transtype','$routedistance')";
	   $result = mysql_query($insertquery) or die(mysql_error()); 	
	}

	function updateroute($routeid,$routename,$routepointA,$routepointB,$routeprice,$transtype,$routedistance){
		$updatequery = "UPDATE routes SET  r_name = '$routename',
		r_pointA = '$routepointA',r_pointB = '$routepointB',r_price = '$routeprice', transType = '$transtype', r_distance = '$routedistance'
WHERE id = '$routeid'";

		$result = mysql_query($updatequery) or die(mysql_error());
	}

	function getroutes()
	{
		$selectquery = "SELECT * FROM routes";
		$result = mysql_query($selectquery);
		$routes = null;

		while($data = mysql_fetch_array($result))
		{
			$routes[] = $data;
		}
		return $routes;
	}

	function getroutebyid($id)
	{
		$selectquery = "SELECT * FROM routes WHERE id = '$id'";
		$result = mysql_query($selectquery);

		$route = mysql_fetch_array($result);
		return $route;
	}

     function getroutelocations()
     {
        $selectquery = "SELECT DISTINCT r_pointA as name FROM routes";
        $result = mysql_query($selectquery);
        $routelocations = null;

        while ($data = mysql_fetch_array($result)) {
        	$routelocations[] = $data;
        }
        return $routelocations;
     }
    function getroutesbyplaceA($routepoint)
	{
		$selectquery = "SELECT * FROM routes WHERE r_pointA = '$routepoint'";
		$result = mysql_query($selectquery) or die(mysql_error());
		$routes = null;

		while($data = mysql_fetch_array($result))
		{
			$routes[] = $data;
		}
		return $routes;
	}
	function getroutesbyplaceB($routepoint)
	{
		$selectquery = "SELECT * FROM routes WHERE r_pointB = '$routepoint'";
		$result = mysql_query($selectquery) or die(mysql_error());
		$routes = null;

		while($data = mysql_fetch_array($result))
		{
			$routes[] = $data;
		}
		return $routes;
	}
	function getroutesbyplace($routepoint)
	{
		$selectquery = "SELECT * FROM routes WHERE r_pointA = '$routepoint' or r_pointB = '$routepoint' ";
		$result = mysql_query($selectquery) or die(mysql_error());
		$routes = null;

		while($data = mysql_fetch_array($result))
		{
			$routes[] = $data;
		}
		return $routes;
	}

	function deleteroute($routeid)
	{
		$deletequery = "DELETE FROM routes WHERE id = '$routeid'";
		$result = mysql_query($deletequery) or die(mysql_error());
	}
*/
}
?>