<?php 
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/admin_soportando/includes/conexion.php");

	$consultaPrioridad = "SELECT * FROM ticket_priority";
	$res = mysqli_query($conn, $consultaPrioridad) or die ("ERROR busquedas ".$consultaPrioridad);

	$arrName = array();
	$arrPriority = array();

	while($fila = mysqli_fetch_array($res)){
		array_push($arrName, $fila['name']);
		array_push($arrPriority, $fila['priority_id']);
	}

	function buscarIdPriority($name){
		global $arrName;
		global $arrPriority;
		$tamano = count($arrName);
		for ($i=0; $i < $tamano; $i++) { 
			if($name == $arrName[$i])
				return $arrPriority[$i];
		}

	}

?>