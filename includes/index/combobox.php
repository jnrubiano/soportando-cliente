<?php

	/**************************************
	* Archivo que imprime los combobox 	  *
	* necesarios en cada una de las pan-  *
	* tallas							  *
	* @ Juan Rubiano                      *
	* @version 1.2.2                      *
	* @see Archivo de conexión.           *
	**************************************/

	//	Conexión a la base de datos
	require_once("includes/conexion.php");

	//Método que imprime el combobox de los tickets
	function printCombobox(){
		global $conn;
		echo '<!-- Filters -->';
		echo '<div class="col-xs-3 col-xs-offset-1 padding-nule dropdown user-dropdown_header">';
		echo '<select name="forma" onchange="actTabla();" class="selection-dropdown_button user-dropdown_list" id="combse">';

		echo '<option onclick="actTabla()" id="0">Todas las Prioridades</option>';
		$cons2 = "SELECT * FROM ticket_priority";
		$res2 = mysqli_query($conn, $cons2) or die ("ERROR index/nuevoTicket 1".$cons2);
		while($consSecc2 = mysqli_fetch_array($res2)){
			echo '<option onclick="actTabla()" id="'.$consSecc2['priority_id'].'">'.utf8_encode($consSecc2['name']).'</option>'; 					
		}

		echo '</select>';
		echo '</div>';		
	}

	//Método que imprime el combobox de las empresas que se tiene registradas
	function printComboCompany(){
		global $conn;

		echo '<!-- Filters -->';
		echo '<div class="col-xs-3 col-xs-offset-1 padding-nule dropdown user-dropdown_header">';
		echo '<select name="forma" class="selection-dropdown_button user-dropdown_list" id="combse">';

		echo '<option onclick="actTabla()" id="0">Todas las Empresas</option>';
		$cons2 = "SELECT * FROM company";
		$res2 = mysqli_query($conn, $cons2) or die ("ERROR index/nuevoTicket 2".$cons2);
		while($consSecc2 = mysqli_fetch_array($res2)){
			echo '<option onclick="actTabla()" id="'.$consSecc2['priority_id'].'">'.utf8_encode($consSecc2['name']).'</option>'; 					
		}

		echo '</select>';
		echo '</div>';			
	}
?>