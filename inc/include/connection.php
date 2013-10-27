<?php

//require_once('../config/config.php');


class mysqlconnection{

   protected $hostname;
   protected $databaseusername;
   protected $databasepassword; 
   protected $database;
   protected $connect;

   function __construct($host,$username,$password,$database)
   {
       $this->hostname = $host;
       $this->databaseusername = $username;
       $this->databasepassword = $password;
       $this->database = $database;

         //Connect to Class Methods
       if(isset($_POST['createdatabase'])){
        $this->connectToServer();
        $this->createDatabase();
    }
    else{
       if($this->connectToServer()){
        $this->selectDatabase(); 
    }
}
}

function connectToServer()
{
  $conn = mysql_connect($this->hostname,$this->databaseusername,$this->databasepassword);
  if ($conn)
  {
			//echo "connnection succeeded, wewe vipi?<br/>";
  }
  else
  {
   $message =  mysql_error();
   $errorcode = 1;
   header("location:install.php?message=".$message."&errorcode=".$errorcode);
}
return $conn;
}

function selectDatabase()
{
   $selectdb = mysql_select_db($this->database);
   if($selectdb)
   {
         	return true;//printf ('connection to %s successful </br>',$this->database);
         }
         else
         {

          $message = mysql_error();
          $errorcode = 2;
          header("location:install.php?message=".$message."&errorcode=".$errorcode);
      }
  }
  function createDatabase()
  {
    $createquery = "CREATE DATABASE darguide";
    $result = mysql_query($createquery);
    if($result)
    {
        $message = "database has been created";
        $errocode = 0;
        header("location:../install.php?message=".$message."&errorcode=".$errorcode);
    }
    else
    {
        $error = mysql_error();
        $errorcode = 3;
        header("location:../install.php?message=".$error."&errorcode=".$errorcode);
    }

}

function connectionclose()
{
   mysql_close($this->connect);
   echo "the world is cruel connection </br>";
}
/*  
    public function __construct(){}

    private function connectToDatabase()
    {
        $conn = mysql_connect(DB_HOST,DB_USER,DB_PASS) or die(mysql_error());
        
        mysql_select_db(DB_DB,$conn) or die(mysql_error());

        return $conn;
    }
    */

}


// Connnection to Dar Guide Database
//$darguideconnection = new mysqlconnection("localhost","root","ruth","darguide");
//$darguideconnection = new mysqlconnection("localhost","880751_admin","darguide","darguide_zzl_darguide");
$darguideconnection = new mysqlconnection('mysql16.000webhost.com','a5712235_darguid','darguid3','a5712235_darguid');


?>