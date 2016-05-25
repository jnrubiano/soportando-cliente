<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Assets Style -->  
      <!-- Normalize -->
      <link rel="stylesheet" href="assets/normalize/normalize.css">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <!-- Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">
      <!-- Pick Date & Time -->
      <link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.css">
      <link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.date.css">
      <link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.time.css">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,300italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- My Style -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

  <!-- Title for Action -->
  <h1 class="col-xs-12 title-action_lightbox">Actualizar Contraseña</h1>

  <!-- Hightlight Post Button -->

  <!-- New Post Form -->
  <form enctype="multipart/form-data"  class="new-post_form col-xs-12" id="formChangePass"> 

  <?php
	include (realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/conexion.php");
	// include (realpath($_SERVER["DOCUMENT_ROOT"]) ."/serviceteam/includes/hora.php");

	$url = $_SERVER['REQUEST_URI'];
	$url = substr($url, 35);
  ?>

	<div class="col-xs-12 padding-nule new-post_input-container form-group" style="margin-top: 15px">
		<label for="before_pass">Contraseña anterior:</label>
		<input type="text" class="form-control" name="before_pass" id="before_pass" placeholder="*************">
	</div>    

    <!--New Pass -->
    <div class="col-xs-12 padding-nule new-post_input-container form-group" style="margin-top: 15px">
      <label for="new_pass">Nueva contraseña:</label>
      <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="*************">
    </div>

    <!--Confirm New Pass --> 
    <div class="col-xs-12 padding-nule new-post_input-container form-group" style="margin-top: 15px">
      <label for="conf_new_pass">Confirma la nueva contraseña:</label>
      <input type="password" class="form-control" name="conf_new_pass" id="conf_new_pass" placeholder="*************">
    </div>
    
    <!-- Submit Form -->
    <div class="submit-post_action center" style="width: 170px; overflow: hidden;">
      <div class="col-xs-12">
        <button title="Close" class="btn public-button_lightbox col-xs-12 fancybox-item fancybox-close" type="submit" name="guardar"  href="javascript:;" >Guardar</button>
      </div>
    </div>
  </form> <!-- /Form for New Post -->

  <!-- Jquery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <!-- Plugins -->
       <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
        <!-- File Style -->
        <script src="assets/fileupload/bootstrap-filestyle.min.js"></script>
        <!-- Fancybox -->
        <script src="assets/fancybox/jquery.fancybox.js"></script>
        <!-- TinyMCE -->
        <script src='assets/tinymce/jquery.tinymce.min.js'></script>
        <script src='assets/tinymce/tinymce.min.js'></script>
        <script src='assets/tinymce/plugins/colorpicker/plugin.min.js'></script>
        <!-- Sweet Alert -->
        <script src="assets/sweetalert/sweetalert.min.js"></script>
        <!-- Pick Date & Time -->
        <script src='assets/pickadate/picker.js'></script>
        <script src='assets/pickadate/picker.date.js'></script>
        <script src='assets/pickadate/picker.time.js'></script>
        <script src='assets/pickadate/translations/es_ES.js'></script>
  <!-- Out Script-->
  <script src="js/main.js"></script>
  <script src="js/index/activo.js"></script>
    
  <script>
  tinymce.init({
    language : "es_MX",
    selector: '#post-body_editor',
    height: 350,
    skin: 'noticlaro',
    entity_encoding: "raw",
    plugins: [
      'textcolor colorpicker autolink fullscreen link code wordcount paste',
    ],
    menubar: "edit insert tools",
    paste_as_text: true,
    toolbar1: 'undo redo | bold italic | forecolor | link',
    textcolor_map: [
      "B7202E", "Red",
      "414141", "Black",
    ],
    setup: function (editor) {
      editor.on('change', function () {
        editor.save();
      });
    }
  });
  </script>
  <script>
      $("#formChangePass").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("formChangePass"));
        $.ajax({
          url: "includes/inserciones/update_pass.php",
          type: "POST",
          dataType: "json",
          encode: true,
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        }).done(function(datos){
          console.log("DATOS: "+datos);
          if(datos.success){
            console.log("Contrasena cambiada");
            swal({
              title: "¡Actualizada!",
              text: '¡Tu contraseña ha sido <span style="color:#F8BB86">actualizada</span>!',
              html: true,
              timer: 750,
              showConfirmButton: false
            });
            setTimeout(function() {
              parent.$.fancybox.close();
            }, 750);
          }else{
            console.log("Ticket no almacenado");
            swal({
              title: "¡No actualizada!",
              text: '¡Tu contraseña no ha podido ser actualidad. <span style="color:#F8BB86">'+datos.errores.mensaje+'</span>!',
              html: true,
              showConfirmButton: true
            });
          };
        });
      });
  </script>
  </body>
</html>
