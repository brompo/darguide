<?php

require_once(dirname(__FILE__)."/../DAO/routeDAO.php");
/**
* 
*/
class routeBL
{
	protected $place_id;
	protected $place_name;
	protected $place_area;
	protected $place_location;
	protected $place_description;
	protected $route_name;
	protected $bus_id;
	protected $from;
	protected $to;
	protected $stop_number;


	function __construct()
	{
		if(isset($_POST['findroute']))
		{
			$this->from = $_POST['routefrom'];
			$this->to = $_POST['routeto'];
			$id = $_POST['id'];
			if($this->from == ""){
				$message = "Please select where do you want directions from";
				header("location:../../individual.php?placeid=".$id."&error=".$message);
			}
			if($this->from == $this->to){
				//$message = "From and To can not be the same location, please change and search again";
				//header("location:../../individual.php?placeid=".$id."&error=".$message);
				header("location:../../individual.php?placeid=".$id);
			}
			else{
				// Find Direct Route;
				$directroute = $this->findroute($this->from,$this->to);
				if($directroute != null){
				$to = $directroute['place_id'];
				$bus = $directroute['bus_id'];
				$deststop = $directroute['stop_no'];
				$from = $this->from;
				header("location:../../individual.php?placeid=".$id."&to=".$to."&from=".$from."&bus=".$bus."&deststop=".$deststop);
				}
				else{
					$changingplaces = array (1,2,8,21);
					foreach ($changingplaces as $changingplace) {
						if(($directroute1 = $this->findroute($this->from,$changingplace)) != false)
						{
							if(($directroute2 = $this->findroute($changingplace,$this->to)) != false){
							$to1 = $directroute1['place_id'];
							$bus1 = $directroute1['bus_id'];
							$deststop1 = $directroute1['stop_no'];
							$from1 = $this->from;


							$to2 = $directroute2['place_id'];
							$bus2 = $directroute2['bus_id'];
							$deststop2 = $directroute2['stop_no'];
							$from2 = $changingplace;

				header("location:../../individual.php?placeid=".$id."&to1=".$to1."&from1=".$from1."&bus1=".$bus1."&deststop1=".$deststop1.
				"&to2=".$to2."&from2=".$from2."&bus2=".$bus2."&deststop2=".$deststop2);			
							}
						}


					}
				}
			}
		}
	}

	function addplace()
	{
		$routeDAO = new routeDAO();
		$routeDAO->addplace($this->place_name,$this->$place_area,$this->place_location,$this->place_description);
	}
	function getplaces()
	{
		$routeDAO = new routeDAO();
		$places = $routeDAO->getplaces();
		return $places;
	}
	function getplacebyid($placeid){
		$routeDAO = new routeDAO();
		$place = $routeDAO->getplacebyid($placeid);
		return $place;
	}
	function findroute($from,$to)
	{
		$routeDAO = new routeDAO();
		$directroute = $routeDAO->findroute($from,$to);
		return $directroute;
	}
	function getbusdetails($bus_id){
		$routeDAO = new routeDAO();
		$routeDAO->getbusdetails();
	}
}

$routeBL = new routeBL();

?>