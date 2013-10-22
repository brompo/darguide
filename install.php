<html>
<h2>Dar City Guide</h2>	
<h4>Installation Process</h4>
<?php 
if(array_key_exists('message', $_GET)){

	$message = $_GET['message'];
	if($_GET['errorcode']== 1){
		echo "Please fix the error below<br/><br/>";
		echo "<i><text style='color:red'>".$message."</text></i>";	
	}
	elseif($_GET['errorcode'] == 2){
	echo "<i><text style='color:red'>".$message."</text></i>";	
		?>
		<form action="include/connection.php" method="POST">
		<br/>
		<input type="submit" value="create the database" name="createdatabase">
		</form>
		<?php	
	}
	elseif ($_GET['errorcode'] == 0 ) {
		echo "<i><text style='color:green'>".$message."</text></i><br/><br/>";

		echo "Import the darquide.sql file using phpmyadmin and you are good to go.<br/>";

		echo "<br/>After that, Access the page via <a href='index.php'>localhost/darquide/inc/index.php</a>";
	}
}

if(array_key_exists('createdatabase', $_POST)){

if(isset($_POST['createdatabase']))
{
require_once(dirname(__FILE__)."/inc/include/connection.php");
echo "i am here";
}	
}

?>
</html>