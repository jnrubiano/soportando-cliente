<?php
  /*session_start();
  if($_SESSION['inicio'] != 1){
    header('Location: login.php');
  }else{
*/
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

        require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/admin_soportando/includes/conexion.php");
        require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/admin_soportando/includes/hora.php");

				$consRepository = "SELECT * FROM repository WHERE active = 1";
				$res = mysqli_query($conn, $consRepository) or die ("Error repositorio 1 ".mysqli_error($conn));

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

      <footer class="col-xs-12">Powered by ...</footer>
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
  //}
?>
