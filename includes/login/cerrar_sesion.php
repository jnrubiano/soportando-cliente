<?php

	/******************************************
	* Archivo que realiza el cierre de sesión *
	* de la contraseñas					      *	
	* @ author Juan Rubiano                   *
	* @ version 1.2.2                         *
	******************************************/

	//Inicio la sesión para la referenciación
	session_start();
	//Destruyo la sesión
	session_destroy();
	//Asigno un false al begin de inicio de la sesión
	$_SESSION['begin'] = false;
	//Redirijo a la pantalla del login
	header('Location: ../../login.php');

?>