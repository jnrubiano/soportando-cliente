
/***********************************************
* Archivo JavaScript que realiza actualización *
* de la tabla de acuerdo al cambio del combobox*
* @ author Juan Rubiano                   	   *
* @ version 1.2.2                              *
***********************************************/

function actTabla(){
	//Capturo la opción del combobox
	var prioridadBox = document.getElementById("combse");
    var prioridad = prioridadBox.options[prioridadBox.selectedIndex].value;	

    //Ingreso la opción en una variable
	var datosEnviados = 
	{
		'prioridad'    : prioridad	
	}	

	//Envio el datos por AJAX y ejecuto el php listar_tickets.php
	$.ajax({
		type      : 'POST',
		url       : 'includes/index/listar_tickets.php',
		data      : datosEnviados,
		success: function(html){
	        $("#tablaprin").html(html);                      
	      }
	});
}