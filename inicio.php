<?php
  
  /***************************************
  * Archivo que construye la pantalla de *
  * inicio                               *
  * @author Juan Rubiano                 *
  * @version 1.2.2                       *
  * @see header.php                      *
  * @see combobox.php                    *
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
    <h1 class="col-xs-12 padding-nule page-title_locate">Tickets</h1>      
      <!-- Last Updates -->
      <h2 class="col-xs-12 padding-nule section-title_locate">Últimos Tickets</h2>

      <?php

        //Importo el archivo de combobox
        include ("includes/index/combobox.php");
        //Llamo el método para imprimir el combobox de las prioridades
        printCombobox();
      ?>

      <!-- Post Table -->
      <div id="tablaprin" class="col-xs-12 padding-nule post-table">
        <!-- Table -->        
            <script>
              //Llamo el método script que actualiza la tabla
              actTabla();
            </script>          
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