<?php

	require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/admin_noticlaro/includes/conexion.php");

	$idSubsec = $_GET['ids'];
	$idSeccion = $_GET['idse'];

	$consulta = "SELECT * FROM subseccion WHERE id_subseccion = ".$idSubsec;
	$res = mysqli_query($conn, $consulta) or die ("ERROR in/sec/ed_sub 1 ".$consulta);
	while($fila = mysqli_fetch_array($res)){
		$nombre = $fila['name_subseccion'];
	}

	echo '<form enctype="multipart/form-data"  class="col-xs-12" id="formNewSection">';
	echo '<div class="col-xs-12 padding-nule new-post_input-container section_checkbox form-group">';
	echo '<div class="col-xs-12 position-section_lightbox">';
	echo '<label for="name_section">Nombre de la subsección:</label>';
	echo '<input value="'.html_entity_decode(utf8_encode($nombre)).'" type="text" for="name_section" class="form-control section-input" id="subsection" name="subsection" placeholder="Nombre de la Subsección">';
	echo '</div>';
	echo '</div>';
	echo '<div class="submit-post_action center" style="width: 260px; overflow: hidden;">';
	echo '<div class="col-xs-12">';
	echo '<button class="btn public-button_lightbox" type="submit">Actualizar</button>';
	echo '<button class="btn cancel-button_lightbox" type="submit">Cancelar</button>';
	echo '</div>';
	echo '</div>';
	echo '</form>';

	echo '<script>';
	echo '$(function(){';
	echo '  $("#formNewSection").on("submit", function(e){';
	echo '    e.preventDefault();';	
	echo '    var formData = new FormData(document.getElementById("formNewSection"));';
	echo '		formData.append("nameact",'."\"".$nombre."\"".');';
	echo '		formData.append("id", '.$idSubsec.');';
	echo '    $.ajax({';
	echo '          url         : "includes/inserciones/actualizar_subseccion.php",';
	echo '          type        : "POST",';
	echo '          dataType    : '.'\''.'json'.'\''.',';
	echo '          encode      : true,';
	echo '          data        : formData,';
	echo '          cache       : false,';
	echo '          contentType : false,';
	echo '          processData : false';
	echo '        }).done(function(datos){';
	echo '				console.log(datos);';
	echo '				console.log("CONSULTA: "+datos.mensaje);';
	echo '				if(datos.exito){';
	echo '					console.log("Subección actualizada");';
	echo '					swal({';
    echo '					      title: '."\"".'Actualizado!'."\"".',';
    echo '					      text: '."\"".'¡La subsección se ha actualizado!'."\"".',';
    echo ' 						  html: true,';
	echo '				          timer: 3500,';
	echo '	        			  showConfirmButton: false,';
	echo '					});';	
	echo '					var millisecondsToWait = 1000;';
	echo '						setTimeout(function() {';
	echo '							$(".fancybox-overlay",top.document).css("display", "none");';	
	echo '						}, millisecondsToWait);';
	echo '				}else{';
	echo '					swal({';
    echo '					      title: '."\"".'¡No actualizado!'."\"".',';
    echo '					      text: '."\"".'¡ "+datos.mensaje+" !'."\"".',';
    echo ' 						  html: true,';
	echo '	     			      timer: 1500,';
	echo '	       				  showConfirmButton: false,';
	echo '					});';		
	echo '				}';
	echo '       });';
	echo '    });';
	echo '});';
	echo '</script>';

?>