<?php

	/********************************
	* Archivo que realiza el login  *
	* de la contraseñas				*	
	* @author Juan Rubiano          *
	* @version 1.2.2                *
	* @see Archivo de conexión.     *
	*********************************/

	//Conexión a la base de datos
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php");

	//Creo los dos arreglos para enviar los datos y los errores al AJAX
	$errores = array();
	$datos = array();

	//Valido que se haya ingresado el usuario
	if(empty($_POST['user']))
		$errores['usuario'] = true;
	else $user = $_POST['user'];

	//Valido que se haya ingresado el contraseña
	if(empty($_POST['pass']))
		$errores['contrasena'] = true;
	else $pass = $_POST['pass'];

	//Verifico que los que se haya ingresado no sea un query
	$user = mysqli_real_escape_string($conn, $user);
	$pass = mysqli_real_escape_string($conn, $pass);

	//Si se ingresaron todos los datos
	if(empty($errores)){
		//Traigo los datos de acuerdo al usuario y contraseña ingresado
		$consulta = "SELECT * FROM user WHERE login = '$user' and pass = '$pass' AND active = 1";
		$result = mysqli_query($conn, $consulta) or die ("Error en el login ".mysqli_error($conn));
		$count = mysqli_num_rows($result);
		while($fila = mysqli_fetch_array($result)){
			//Almaceno los datos en el arreglo datos
			$datos['rol'] = $fila['rid'];
			$datos['id'] = $fila['uid'];
			$datos['name'] = $fila['name'];
			$datos['company'] = $fila['ucompany_id'];
		}

		//Si la consulta trajo una línea, significa que el usuario está en la base de datos
		if($count == 1){
			//Inicio una sesión y le doy parámetros
			session_start();
			$_SESSION['begin'] = true;
			$_SESSION['id'] = $datos['id'];
			$_SESSION['name'] = $datos['name'];
			$_SESSION['rol'] = $datos['rol'];
			$_SESSION['company'] = $datos['company'];

			//Asigno true al campo éxito del arreglo datos
			$datos['exito'] = true;
			//Asigno la consulta al campo mensaje
			$datos['mensaje'] = $consulta;
			$errores['usuario'] = true;
			$errores['contrasena'] = true;
			$datos['errores'] = $errores;
		}else{
			//Si la consulta no trajo filas no se encuentra registrado el usuario y la contraseña
			$datos['exito'] = false;
			$datos['mensaje'] = $consulta;
			$errores['usuario'] = false;
			$errores['contrasena'] = false;
			//Asigno el arreglo
			$datos['errores'] = $errores;
		}


	}else{
		$_SESSION['begin'] = false;
		$datos['exito'] = false;
		$datos['errores'] = $errores;
	}
	//Codifico a Json el arreglo datos
	echo json_encode($datos);
?>