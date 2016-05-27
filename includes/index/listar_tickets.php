<?php

	/**************************************
	* Archivo que lista los tickets en la *
	* venta inicial del aplicativo		  *	
	* @ author Juan Rubiano               *
	* @ version 1.2.2                     *
	* @ see Archivo de conexión.          *
	* @ see Archivo de búsquedas.         *
	* @ see Archivo de hora.	          *
	**************************************/

	//Conexión a la base de datos	
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/conexion.php");
	//Importación del archivo para la búsqueda de id y/o nombres
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/busquedas.php");
	//Importación del archivo hora para el formateo de las fechas y horas.
	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/hora.php");

	session_start();
	$prioridad = $_POST['prioridad'];
	
	
	$datos = array();
	$errores = array();

	//Capturo la opción seleccionada en el combobox
	$company = $_SESSION['company'];

	//Si la opción seleccionada en el combobox no es "Todas las Prioridades"
	if($prioridad != "Todas las Prioridades") $prioridad = buscarPriority($prioridad);

	//Valido la opción del combobox y de acuerdo a eso realizo la consulta
	if($prioridad != "Todas las Prioridades" && $_SESSION['rol'] != 1){		
		$consulta = "SELECT * FROM ticket WHERE priority_id = $prioridad AND company_id = $company";
	}else if($prioridad != "Todas las Prioridades" && $_SESSION['rol'] == 1){
		$consulta = "SELECT * FROM ticket WHERE priority_id = $prioridad";
	}else if($prioridad == "Todas las Prioridades" && $_SESSION['rol'] != 1){
		$consulta = "SELECT * FROM ticket WHERE company_id = $company";
	}else if($prioridad == "Todas las Prioridades" && $_SESSION['rol'] == 1){
		$consulta = "SELECT * FROM ticket";
	}

	//Creo los arreglos que contendrán los datos de la consulta
	$arrTicketId = array();
	$arrDescription = array();	
	$arrEngi = array();
	$arrCompany = array();
	$arrModule = array();
	$arrPriority = array();
	$arrStatus = array();
	$arrStatusDate = array();

	//Se ejecuta el query y se meten los datos en cada uno de los arreglos creados
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

	//Si el rol es igual a uno imprimo la columna de la compañia
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

	//Defino el tamaño del arreglo de acuerdo a los datos ingresados.
	$tamano = count($arrTicketId);

	//Imprimo todos los datos en la tabla
	for ($i = 0; $i < $tamano; $i++) { 
		echo '<tr>';
	    echo '<td>'.$arrTicketId[$i].'</td> ';
	    echo '<td>'.$arrDescription[$i].'</td> ';    
	    echo '<td><span class="color-section_change">'.$arrEngi[$i].'</span></td>';
	    //Si el rol es 1 imprimo los datos de la compañia.
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
	
	//Si es mas de 20 tickets realizo paginación
   	echo ' <!-- Pagination -->';
   	//echo '<script>paginar()</script>';
   	//echo '<h1> Echo del Php </h1>';
    echo ' <div class="pagination_container">';	
	echo ' </div>';
?>