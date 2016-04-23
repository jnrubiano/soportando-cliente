<?php

	//Conexión a la base de datos
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/admin_soportando/includes/conexion.php");

	$prioridad = $_POST['prioridad'];
	
	
	$datos = array();
	$errores = array();


	
	if($prioridad != "Todas las Prioridades"){
		$consulta = "SELECT  * FROM ticket WHERE ticket_type_id = '$prioridad'";		
	}else{
		$consulta = "SELECT * FROM ticket";
	}

	$arrTicketId = array();
	$arrDescription = array();
	$arrContact = array();
	$arrPhone = array();
	$arrEngi = array();
	$arrCompany = array();
	$arrModule = array();
	$arrPriority = array();
	$res = mysqli_query($conn, $consulta) or die ("ERROR listarNoticias 1 ".$consulta);

	

  	while($fila = mysqli_fetch_array($res)){
		array_push($arrTicketId, $fila['ticket_id']);
		array_push($arrDescription, $fila['description']);
		array_push($arrContact, $fila['contact']);
		array_push($arrPhone, $fila['phone']);
		array_push($arrEngi, $fila['engineer_id']);
		array_push($arrCompany, $fila['company_id']);
		array_push($arrModule, $fila['module_id']);
		array_push($arrPriority, $fila['priority_id']);	
	}
	
	echo '<!-- Table -->';
	echo '<table class="table">';
	echo '<thead> ';
	echo '<tr>';
	echo '<th>Número de<br>Ticket</th> ';
	echo '<th>Descripción</th>';
	echo '<th>Contacto</th>';
	echo '<th>Teléfono</th>';
	echo '<th>Ingeniero</th>';
	echo '<th>Compañia</th>';
	echo '<th>Modulo</th>';
	echo '<th>Prioridad</th>';
	echo '<th></th>';
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
	    echo '<td><span class="color-section_change">'.$arrContact[$i].'</td> ';
	    echo '<td><span class="color-section_change">'.$arrPhone[$i].'</td> ';	    
	    echo '<td><span class="color-section_change">'.$arrEngi[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrCompany[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrModule[$i].'</span></td>';
	    echo '<td><span class="color-section_change">'.$arrPriority[$i].'</span></td>';
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