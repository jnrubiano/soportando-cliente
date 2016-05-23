<?php 
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php");

	function buscarIdPriority($name){
		global $conn;
		$consultaPrioridad = "SELECT * FROM ticket_priority WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaPrioridad) or die ("ERROR busquedas 1 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['priority_id'];
		}
	}

	function buscarNamePriority($id){
		global $conn;
		$consultaPrioridad = "SELECT * FROM ticket_priority WHERE priority_id = $id";
		$res = mysqli_query($conn, $consultaPrioridad) or die ("ERROR busquedas 2 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}   
	}

	function buscarIdModule($name){
		global $conn;
		$consultaModulo = "SELECT * FROM module WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaModulo) or die ("ERROR busquedas 3 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['module_id'];
		}
	}

	function buscarNameModule($id){
		global $conn;
		$consultaModulo = "SELECT * FROM module WHERE module_id = $id";
		$res = mysqli_query($conn, $consultaModulo) or die ("ERROR busquedas 4 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	function buscarIdCompany($name){
		global $conn;
		$consultaCompany = "SELECT * FROM company WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaCompany) or die ("ERROR busquedas 5 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['company_id'];
		}
	}

	function buscarNameCompany($id){
		global $conn;
		$consultaCompany = "SELECT * FROM company WHERE company_id = $id";
		$res = mysqli_query($conn, $consultaCompany) or die ("ERROR busquedas 6 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	function buscarIdTicketType($name){
		global $conn;
		$consultaTicketType = "SELECT * FROM ticket_type WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaTicketType) or die ("ERROR busquedas 7 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['ticket_type_id'];
		}
	}

	function buscarNameTicketType($id){
		global $conn;
		$consultaTicketType = "SELECT * FROM ticket_type WHERE ticket_type_id = $id";
		$res = mysqli_query($conn, $consultaTicketType) or die ("ERROR busquedas 8 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	function buscarIdTicketStatus($name){
		global $conn;
		$consultaTicketTypeStatus = "SELECT * FROM ticket_status WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaTicketTypeStatus) or die ("ERROR busquedas 9 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['ticket_status_id'];
		}
	}

	function buscarNameTicketStatus($id){
		global $conn;
		$consultaTicketTypeStatus = "SELECT * FROM ticket_status WHERE ticket_status_id = $id";
		$res = mysqli_query($conn, $consultaTicketTypeStatus) or die ("ERROR busquedas 10 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	function buscarIdEnginner($name){
		global $conn;
		$consultaEnginner = "SELECT * FROM user WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaEnginner) or die ("ERROR busquedas 11 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['uid'];
		}
	}

	function buscarNameEnginner($id){
		global $conn;
		$consultaEnginner = "SELECT * FROM user WHERE uid = $id";
		$res = mysqli_query($conn, $consultaEnginner) or die ("ERROR busquedas 12 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	function buscarPriority($name){
		global $conn;
		$consultaPriority = "SELECT * FROM ticket_priority WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaPriority) or die ("ERROR busquedas 13 $consultaPriority ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['priority_id'];
		}
	}
?>