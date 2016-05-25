<?php	

	/**********************************
	* Archivo que realiza la conexión *
	* a la base de datos			  *	
	* @author Juan Rubiano            *
	* @version 1.2.2                  *
	* @see Archivo de conexión.       *
	**********************************/

	//$db['db_host'] = "172.27.57.7:3306";
	$db['db_host'] = "localhost:3306"; //Host name
	$db['db_user'] = "root"; //User name
	$db['db_pass'] = "123456"; //Pass
	$db['db_name'] = "soportando"; //Database name

	foreach ( $db as $key => $value){
		define (strtoupper($key), $value);
	}

	$conn = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);

	if (!$conn) {
		die("connexion fail");
	}

	mysqli_set_charset( $conn, 'utf8');

?>