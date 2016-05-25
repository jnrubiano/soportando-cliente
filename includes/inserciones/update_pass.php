<?php

	/***************************************
	* Archivo que realiza la actualización *
	* de la contraseñas					   *	
	* @ author Juan Rubiano                *
	* @ version 1.2.2                      *
	* @ see Archivo de conexión.           *
	***************************************/

	//Conexión a la base de datos	
	include realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php";

	//Inicio la sesión y capturo el id del usuario que se encuentra actualmente logeado.
	session_start();
	$idUser = $_SESSION['id'];

	//Creo los dos arreglos para enviar los datos y los errores al AJAX
	$datos = array();
	$errores = array();

	//Valido que se haya ingresado la contraseña actual
	if(empty($_POST['before_pass']))
		$errores['bef_pass'] = true;
	else $passBefore = $_POST['before_pass'];

	//Valido que se haya ingresado la nueva contraseña
	if(empty($_POST['new_pass']))
		$errores['new_pass'] = true;
	else $newPass = $_POST['new_pass'];
	
	//Valido que se haya ingresado la confirmarción de la nueva contraseña
	if(empty($_POST['conf_new_pass']))
		$errores['conf_new_pass'] = true;
	else $confNewPass = $_POST['conf_new_pass'];

	
	//Si se ingresaron todos los datos
	if(empty($errores)){
		//Traigo los datos del usuario actual
		$cons = "SELECT * FROM user WHERE uid = $idUser";
		$res = mysqli_query($conn, $cons) or die ("Error update_pass 1 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			//Creo la variable que contendrá la contraseña actual
			$currentPass = $fila['pass'];
		}

		/*Si la contraseña anterior ingresada no coincide con la contraseña de la base de datos
		 almaceno un msj de error*/
		if($passBefore != $currentPass){
			$errores['mensaje'] = "La contraseña anterior no coincide";
		}else if($newPass != $confNewPass){
			/*Si la contraseña nueva ingresada no es igual a la que se ingreso en la confirmación
			almaceno un mensaje de error en el arreglo errores.*/
			if(empty($errores['mensaje'])) $errores['mensaje'] = "";
			$errores['mensaje'] = $errores['mensaje']." Las nuevas contraseñas no coinciden ";
		}

		/*Si la contraseña anterior ingresada coincide con la contraseña de la base de datos
		 y la contraseña nueva ingresada es igual a la que se ingreso en la confirmación realizo 
		 el update en la base de datos y asigno en el campo success del arreglo datos un true*/
		if($passBefore == $currentPass && $newPass == $confNewPass){
			$update = "UPDATE user SET pass = $newPass WHERE uid = $idUser";
			$resUpd = mysqli_query($conn, $update) or die ("Error update_pass 2 ".mysqli_error($conn));
			$datos['success'] = true;
		}
		//Asigno en el campo errores del arreglo datos el arreglo de errores
		$datos['errores'] = $errores;
	}else{
		/*Si no se ingresó alguno de los datos, asigno un false en el campo success y asigno
		 el arreglo errores en el campo correspondiente*/
		$datos['success'] = false;
		$datos['errores'] = $errores;
	}
	
	//Codifico el arreglo datos a JSON para ser enviado al AJAX
	echo json_encode($datos);

?>