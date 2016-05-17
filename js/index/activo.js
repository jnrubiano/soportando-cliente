//Actualiza la tabla de tickets por prioridad
function actTabla(){

	var prioridadBox = document.getElementById("combse");
    var prioridad = prioridadBox.options[prioridadBox.selectedIndex].value;
	console.log(prioridad);
	var datosEnviados = 
	{
		'prioridad'    : prioridad	
	}

	console.log(datosEnviados);

	$.ajax({
		type      : 'POST',
		url       : 'includes/index/listar_tickets.php',
		data      : datosEnviados,
		success: function(html){
	        $("#tablaprin").html(html);                      
	      }
	});
}