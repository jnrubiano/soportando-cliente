<?php
	
	include realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php";

	session_start();
	$idUser = $_SESSION['id'];

	$datos = array();
	$errores = array();

	//Validar los parámetros
	if(empty($_POST['before_pass']))
		$errores['bef_pass'] = true;
	else $passBefore = $_POST['before_pass'];

	if(empty($_POST['new_pass']))
		$errores['new_pass'] = true;
	else $newPass = $_POST['new_pass'];
	
	if(empty($_POST['conf_new_pass']))
		$errores['conf_new_pass'] = true;
	else $confNewPass = $_POST['conf_new_pass'];

	/*echo "BEFORE: ".$passBefore;
	echo "NEW: ".$newPass;
	echo "CONF NEW: ".$confNewPass;*/
	
	if(empty($errores)){
		$cons = "SELECT * FROM user WHERE uid = $idUser";
		$res = mysqli_query($conn, $cons) or die ("Error update_pass 1 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			$currentPass = $fila['pass'];
		}

		if($passBefore != $currentPass){
			$errores['no_current'] = true;
			$errores['mensaje'] = "La contraseña anterior no coincide";
		}else if($newPass != $confNewPass){
			$errores['no_equal'] = true;
			if(empty($errores['mensaje'])) $errores['mensaje'] = "";
			$errores['mensaje'] = $errores['mensaje']." Las nuevas contraseñas no coinciden ";
		}

		if($passBefore == $currentPass && $newPass == $confNewPass){
			$update = "UPDATE user SET pass = $newPass WHERE uid = $idUser";
			$resUpd = mysqli_query($conn, $update) or die ("Error update_pass 2 ".mysqli_error($conn));
			$datos['success'] = true;
		}
		/*echo $passBefore;
		echo $currentPass;
		echo $newPass;
		echo $confNewPass;*/
		$datos['errores'] = $errores;
	}else{
		$datos['success'] = false;
		$datos['errores'] = $errores;
	}
	
	echo json_encode($datos);

?>