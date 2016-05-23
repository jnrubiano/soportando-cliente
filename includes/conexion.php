<?php	

	$host = "localhost:3306"; //Host name
	$user = "root"; //User name
	$pass = ""; //Pass
	$db_name = "soportando"; //Database name
	
	$conn = mysqli_connect($host,$user, $pass, $db_name);

	mysqli_set_charset( $conn, 'utf8');

?>