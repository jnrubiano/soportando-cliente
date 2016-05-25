<?php
  
  /***************************************
  * Archivo que construye la pantalla del*
  * repositorio                          *
  * @author Juan Rubiano                 *
  * @version 1.2.2                       *
  * @see conexion.php                    *
  * @see hora.php                        *
  ***************************************/
  
  session_start();

  //Si no se inicio sesión se redirije a la pantalla login
  if($_SESSION['begin'] != true){
    header('Location: login.php');
  }else{
    //Si la sesión está iniciada se crea el header y el resto del template
    include ("includes/header.php");

?>

    <!-- Body -->
    <div class="container padding-nule fixed-bar">
    <h1 class="col-xs-12 padding-nule page-title_locate">Repositorio</h1>      
      <!-- Last Updates -->
      <h2 class="col-xs-12 padding-nule section-title_locate"></h2>
      <!-- Post Table -->
      <div id="tablaprin" class="col-xs-12 padding-nule post-table">
        <!-- Table -->
		<table class="table">
			<thead> 
				<tr>
					<th>Descripción del archivo</th>
					<th>Nombre del archivo</th>
					<th>Fecha de actualización</th>
					<th>Descargar</th>
					<th></th>
					<th></th>
					<th></th>
				</tr> 
			</thead> 
		<tbody>
			<tr>
			<?php
        //Importo el archivo de conexión
        require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/conexion.php");
        //Importo el archivo de hora
        require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/serviceteam/includes/hora.php");

        //Traigo los archivos del repositorio
				$consRepository = "SELECT * FROM repository WHERE active = 1";
				$res = mysqli_query($conn, $consRepository) or die ("Error repositorio 1 ".mysqli_error($conn));

        //Imprimo los archivos que tiene asignado el cliente
				while($fila = mysqli_fetch_array($res)){
          echo '<tr>';
					echo '<td><span class="color-section_change">'.$fila['description']."</span></td>";
					echo '<td><span class="color-section_change">'.extNameImg($fila['url'])."</span></td>";
					echo '<td><span class="color-section_change">'.cambiaFecNormal($fila['date'])."</span></td>";
          echo '<td style="display:none;">'.$fila['id_repository'].'</td>';
          echo '<td><a class="edit-post_icon glyphicon glyphicon-save " href="http://localhost:81/admin_soportando/includes/repository/descargar_archivo.php?archivo='.extNameImg($fila['url']).'"></a></td>';
          echo '</tr>';
				}
			?>
			</tr>
		</tbody>
		</table>
      </div>

      <footer class="col-xs-12">Powered by NFF</footer>
    </div><!-- /Container -->
  <!-- Scripts -->
      <!-- Plugins -->
        <!-- Retina -->
        <script src="assets/retina/retina.min.js"></script>
        <!-- Sweet Alert -->
        <script src="assets/sweetalert/sweetalert.min.js"></script>
        <!-- Fancybox -->
        <script src="assets/fancybox/jquery.fancybox.js"></script>
        <!-- Sweet Alert -->
        <script src="assets/fileupload/bootstrap-filestyle.min.js"></script>
        <!-- Pick Date & Time -->
        <script src='assets/pickadate/picker.js'></script>
        <script src='assets/pickadate/picker.date.js'></script>
        <script src='assets/pickadate/picker.time.js'></script>
        <script src='assets/pickadate/translations/es_ES.js'></script>
      <!-- Main -->
      <script src="js/main.js"></script>    
  </body>
</html>
<?php 
  }
?>
