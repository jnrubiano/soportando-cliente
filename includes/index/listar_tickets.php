<?php

	//Conexión a la base de datos
	//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php");
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/conexion.php");
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/busquedas.php");
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/hora.php");

	session_start();

	$prioridad = $_POST['prioridad'];
	
	
	$datos = array();
	$errores = array();

	$company = $_SESSION['company'];

	if($prioridad != "Todas las Prioridades") $prioridad = buscarPriority($prioridad);

	/*
		Si no es "Todas las Prioridades" y el rol no es de soporte
	*/
	
	if($prioridad != "Todas las Prioridades" && $_SESSION['rol'] != 1){		
		$consulta = "SELECT * FROM ticket WHERE priority_id = $prioridad AND company_id = $company";
	}else if($prioridad != "Todas las Prioridades" && $_SESSION['rol'] == 1){
		$consulta = "SELECT * FROM ticket WHERE priority_id = $prioridad";
	}else if($prioridad == "Todas las Prioridades" && $_SESSION['rol'] != 1){
		$consulta = "SELECT * FROM ticket WHERE company_id = $company";
	}else if($prioridad == "Todas las Prioridades" && $_SESSION['rol'] == 1){
		$consulta = "SELECT * FROM ticket";
	}

	$arrTicketId = array();
	$arrDescription = array();	
	$arrEngi = array();
	$arrCompany = array();
	$arrModule = array();
	$arrPriority = array();
	$arrStatus = array();
	$arrStatusDate = array();

	$res = mysqli_query($conn, $consulta) or die ("ERROR listarNoticias 1 ".$consulta);

	

  	while($fila = mysqli_fetch_array($res)){
		array_push($arrTicketId, $fila['ticket_id']);
		array_push($arrDescription, $fila['description']);
		array_push($arrEngi, buscarNameEnginner($fila['engineer_id']));
		array_push($arrCompany, buscarNameCompany($fila['company_id']));
		array_push($arrModule, buscarNameModule($fila['module_id']));
		array_push($arrPriority, buscarNamePriority($fila['priority_id']));
		array_push($arrStatus, buscarNameTicketStatus($fila['ticket_status_id']));
		array_push($arrStatusDate, cambiaFecNormal($fila['status_date']));
	}
	
	echo '<!-- Table -->';
	echo '<table class="table">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Número de<br>Ticket</th> ';
	echo '<th>Descripción</th>';
	echo '<th>Ingeniero</th>';
	if($_SESSION['rol'] == 1) echo '<th>Compañia</th>';	 
	echo '<th>Módulo</th>';
	echo '<th>Prioridad</th>';
	echo '<th>Estatus</th>';
	echo '<th>Fecha Estatus</th>';
	
	echo '<th></th>';
	echo '<th></th>';
	echo '<th></th>';
	echo '</tr> ';
	echo '</thead> ';
	echo '<tbody>';

	
	$tamano = count($arrTicketId);

	for ($i = 0; $i < $tamano; $i++) { 
		echo '<tr>';
	    echo '<td>'.$arrTicketId[$i].'</td> ';
	    echo '<td>'.$arrDescription[$i].'</td> ';    
	    echo '<td><span class="color-section_change">'.$arrEngi[$i].'</span></td>';
	    if($_SESSION['rol'] == 1) echo '<td><span class="color-section_change">'.$arrCompany[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrModule[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrPriority[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrStatus[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrStatusDate[$i].'</span></td>';
	    echo '<td style="display:none;">'.$arrTicketId[$i].'</td>';
	    echo '<td><a class="action-lightbox" data-fancybox-type="iframe" href="#"><i class="edit-post_icon fa fa-pencil-square-o"></i></a></td>';
	  	echo '</tr>';
	}		

	
	echo '</tbody>';
	echo '</table>';
	

   	echo ' <!-- Pagination -->';
   	//echo '<script>paginar()</script>';
   	//echo '<h1> Echo del Php </h1>';
    echo ' <div class="pagination_container">';	
	
	

	echo ' </div>';
?>