<?php
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/admin_soportando/includes/conexion.php");

	$errores = array();
	$datos = array();
	//Validar los parámetros
	if(empty($_POST['user']))
		$errores['usuario'] = true;
	else $user = $_POST['user'];


	if(empty($_POST['pass']))
		$errores['contrasena'] = true;
	else $pass = $_POST['pass'];

	$user = mysqli_real_escape_string($conn, $user);
	$pass = mysqli_real_escape_string($conn, $pass);

	//Respuesta
	if(empty($errores))
	{
		$consulta = "SELECT * FROM user WHERE login = '$user' and pass = '$pass' AND active = 1";
		$result = mysqli_query($conn, $consulta) or die ("Error en el login ".mysqli_error($conn));
		$count = mysqli_num_rows($result);

		while($fila = mysqli_fetch_array($result)){
			$datos['rol'] = $fila['rid'];			
			$datos['name'] = $fila['name'];
			$datos['company'] = $fila['ucompany_id'];
		}

		if($count == 1){
			session_start();
			$_SESSION['begin'] = true;
			$_SESSION['name'] = $datos['name'];
			$_SESSION['rol'] = $datos['rol'];
			$_SESSION['company'] = $datos['company'];
			$datos['exito'] = true;
			$datos['mensaje'] = $consulta;
			$errores['usuario'] = true;
			$errores['contrasena'] = true;
			$datos['errores'] = $errores;
		}else {
			$datos['exito'] = false;
			$datos['mensaje'] = $consulta;
			$errores['usuario'] = false;
			$errores['contrasena'] = false;
			$datos['errores'] = $errores;
		}


	}else{
		$_SESSION['inicio'] = 0;
		$datos['exito'] = false;
		$datos['errores'] = $errores;
	}

	echo json_encode($datos);
?>