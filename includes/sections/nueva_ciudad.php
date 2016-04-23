 <?php


  echo '<!-- New Post Form -->';
  echo '<form enctype="multipart/form-data"  class="col-xs-12" id="formNewCity">';


  echo '<!-- Group Name -->';
  echo '<div class="col-xs-12 padding-nule new-post_input-container form-group">';
  echo '<label for="city_name">Nombre de la Ciudad</label>';
  echo '<input for="city_name" name="city_name" id="city_name" type="text" class="form-control" placeholder="Nombre de la Cuidad">';
  echo '</div>';
  echo '<!-- Group Name -->';
  echo '<div class="col-xs-6 new-post_input-container form-group" style="padding-left: 0;">';
  echo '<label for="woeid">Woeid</label>';
  echo '<input for="woeid" name="woeid" id="woeid" type="text" class="form-control" placeholder="Woeid">';
  echo '<p class="help_URL">*Ingresar el número que se obtiene del siguiente link: <a target="_blank" href="http://woeid.rosselliot.co.nz/">http://woeid.rosselliot.co.nz/.</a></p>';
  echo '</div>';
  echo '<div class="col-xs-6 new-post_input-container form-group" style="padding-right: 0;">';
  echo '<label for="weather_units">Unidades</label>';
  echo '<input for="weather_units" name="units" id="weather_units" type="text" class="form-control" placeholder="°C / °F">';
  echo '<p class="help_URL">*Ingresar C para Celsius y F para Farenheit.</p>';
  echo '</div>';  

  echo '<!-- Submit Form -->';
  echo '<div class="submit-post_action center" style="width: 240px; overflow: hidden;">';
  echo '<div class="col-xs-12">';
  echo '<button class="btn public-button_lightbox" type="submit">Guardar</button>';
  echo '<button class="btn cancel-button_lightbox" type="submit">Cancelar</button>';
  echo '</div>';
  echo '</div>';
  echo '</form> <!-- /Form for New Post -->';

  echo '<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>';  
  echo '<script src="assets/sweetalert/sweetalert.min.js"></script>';
  

  echo '<script>';
  echo '$(function(){';
  echo '  $("#formNewCity").on("submit", function(e){';
  echo '    e.preventDefault();';
  echo '    var formData = new FormData(document.getElementById("formNewCity"));';  
  echo '    $.ajax({';
  echo '          url         : "includes/inserciones/agregar_ciudad.php",';
  echo '          type      : "POST",';
  echo '          dataType    : '.'\''.'json'.'\''.',';
  echo '      encode      : true,';
  echo '          data        : formData,';
  echo '          cache       : false,';
  echo '          contentType : false,';
  echo '        processData : false';
  echo '        }).done(function(datos){';
  echo '        console.log(datos);';
  echo '        if(datos.exito){';  
  echo '          swal({';
  echo '                title: '."\"".'¡Registrada!'."\"".',';
  echo '                text: '."\"".'¡La nueva Ciudad se ha registrado!'."\"".',';
  echo '              html: true,';
  echo '                  timer: 3500,';
  echo '                  showConfirmButton: false,';
  echo '          });'; 
  echo '          var millisecondsToWait = 1000;';
  echo '            setTimeout(function() {';
  echo '              $(".fancybox-overlay",top.document).css("display", "none");';
  echo '            }, millisecondsToWait);';
  echo '        }else{';
  echo '          swal({';
  echo '                title: '."\"".'¡Ciudad no Registrada!'."\"".',';
  echo '                text: '."\"".'¡Verifique los siguientes datos: "+datos.errores.mensaje+" !'."\"".',';
  echo '              html: true,';
  echo '                  timer: 1500,';
  echo '                  showConfirmButton: false,';
  echo '          });';   
  echo '        }';
  echo '       });';
  echo '    });';
  echo '});';
  echo '</script>';
?>