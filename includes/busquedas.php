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

	/*************************************************
	* Método que recibe el nombre de la prioridad y  *
	* retorna el id de la prioridad.				 *
	* @param El nombre de la prioridad 		 		 *
	* @return Id de la prioridad ingresada			 *
	*************************************************/
	function buscarIdPriority($name){
		global $conn;
		$consultaPrioridad = "SELECT * FROM ticket_priority WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaPrioridad) or die ("ERROR busquedas 1 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['priority_id'];
		}
	}

	/**********************************************
	* Método que recibe el id de la prioridad y   *
	* retorna el nombre de la prioridad.		  *
	* @param El id de la prioridad 			 	  *
	* @return Nombre de la prioridad ingresada    *
	**********************************************/
	function buscarNamePriority($id){
		global $conn;
		$consultaPrioridad = "SELECT * FROM ticket_priority WHERE priority_id = $id";
		$res = mysqli_query($conn, $consultaPrioridad) or die ("ERROR busquedas 2 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}   
	}

	/*************************************************
	* Método que recibe el nombre del módulo y       *
	* retorna el id del módulo.						 *
	* @param El nombre del módulo	 		 		 *
	* @return Id del módulo ingresado 				 *
	*************************************************/
	function buscarIdModule($name){
		global $conn;
		$consultaModulo = "SELECT * FROM module WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaModulo) or die ("ERROR busquedas 3 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['module_id'];
		}
	}

	/*******************************************
	* Método que recibe el id del módulo y     *
	* retorna el nombre del módulo.	     	   *
	* @param El id del módulo	 		 	   *
	* @return Nombre de la prioridad ingresada *
	*******************************************/
	function buscarNameModule($id){
		global $conn;
		$consultaModulo = "SELECT * FROM module WHERE module_id = $id";
		$res = mysqli_query($conn, $consultaModulo) or die ("ERROR busquedas 4 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	/***********************************************
	* Método que recibe el nombre de la empresa y  *
	* retorna el id de la empresa.			   *
	* @param El nombre de la empresa 		 	   *
	* @return Id de la empresa ingresada		   *
	***********************************************/
	function buscarIdCompany($name){
		global $conn;
		$consultaCompany = "SELECT * FROM company WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaCompany) or die ("ERROR busquedas 5 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['company_id'];
		}
	}

	/********************************************
	* Método que recibe el id de la empresa y   *
	* retorna el nombre de la empresa.		    *
	* @param El id de la empresa 			 	*
	* @return Nombre de la empresa ingresada    *
	********************************************/
	function buscarNameCompany($id){
		global $conn;
		$consultaCompany = "SELECT * FROM company WHERE company_id = $id";
		$res = mysqli_query($conn, $consultaCompany) or die ("ERROR busquedas 6 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	/*******************************************************
	* Método que recibe el nombre dedel tipo de ticket y   *
	* retorna el id del tipo de ticket.				       *
	* @param El nombre del tipo de ticket	 		       *
	* @return Id del tipo de ticket ingresada			   *
	*******************************************************/
	function buscarIdTicketType($name){
		global $conn;
		$consultaTicketType = "SELECT * FROM ticket_type WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaTicketType) or die ("ERROR busquedas 7 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['ticket_type_id'];
		}
	}

	/***********************************************
	* Método que recibe el id del tipo de ticket y *
	* retorna el nombre ddel tipo de ticket        *
	* @param El id del tipo de ticket		 	   *
	* @return Nombre del tipo de ticket ingresada  *
	***********************************************/
	function buscarNameTicketType($id){
		global $conn;
		$consultaTicketType = "SELECT * FROM ticket_type WHERE ticket_type_id = $id";
		$res = mysqli_query($conn, $consultaTicketType) or die ("ERROR busquedas 8 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	/****************************************************
	* Método que recibe el nombre del estado del ticket *
	* y retorna el id del estado del ticket.		    *
	* @param El nombre del estado del ticket 		    *
	* @return Id del estado del ticket ingresada		*
	****************************************************/
	function buscarIdTicketStatus($name){
		global $conn;
		$consultaTicketTypeStatus = "SELECT * FROM ticket_status WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaTicketTypeStatus) or die ("ERROR busquedas 9 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['ticket_status_id'];
		}
	}

	/****************************************************
	* Método que recibe el id del estado del ticket     *
	* y retorna el nomre del estado del ticket.		    *
	* @param El id del estado del ticket 		        *
	* @return Nombre del estado del ticket ingresada    *
	****************************************************/
	function buscarNameTicketStatus($id){
		global $conn;
		$consultaTicketTypeStatus = "SELECT * FROM ticket_status WHERE ticket_status_id = $id";
		$res = mysqli_query($conn, $consultaTicketTypeStatus) or die ("ERROR busquedas 10 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	/***********************************************
	* Método que recibe el nombre del ingeniero y  *
	* retorna el id del ingeniero.			       *
	* @param El nombre del ingeniero 		 	   *
	* @return Id del ingeniero					   *
	***********************************************/
	function buscarIdEnginner($name){
		global $conn;
		$consultaEnginner = "SELECT * FROM user WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaEnginner) or die ("ERROR busquedas 11 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['uid'];
		}
	}

	/**********************************************
	* Método que recibe el id ddel ingeniero y    *
	* retorna el nombre del ingeniero    		  *
	* @param El id del ingeniero 			 	  *
	* @return Nombre del ingeniero ingresado      *
	**********************************************/
	function buscarNameEnginner($id){
		global $conn;
		$consultaEnginner = "SELECT * FROM user WHERE uid = $id";
		$res = mysqli_query($conn, $consultaEnginner) or die ("ERROR busquedas 12 ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['name'];
		}	
	}

	/**********************************************
	* Método que recibe el id de la prioridad y   *
	* retorna el nombre de la prioridad.		  *
	* @param El id de la prioridad 			 	  *
	* @return Nombre de la prioridad ingresada    *
	**********************************************/
	function buscarPriority($name){
		global $conn;
		$consultaPriority = "SELECT * FROM ticket_priority WHERE name = '$name'";
		$res = mysqli_query($conn, $consultaPriority) or die ("ERROR busquedas 13 $consultaPriority ".mysqli_error($conn));
		while($fila = mysqli_fetch_array($res)){
			return $fila['priority_id'];
		}
	}
?>