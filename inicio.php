<?php
  session_start();
  if($_SESSION['begin'] != true){
    header('Location: login.php');
  }else{
    include ("includes/header.php");

?>

    <!-- Body -->
    <div class="container padding-nule fixed-bar">
    <h1 class="col-xs-12 padding-nule page-title_locate">Tickets</h1>      
      <!-- Last Updates -->
      <h2 class="col-xs-12 padding-nule section-title_locate">Últimos Tickets</h2>

      <?php
        include ("includes/index/combobox.php");
        printCombobox();
      ?>

      <!-- Post Table -->
      <div id="tablaprin" class="col-xs-12 padding-nule post-table">
        <!-- Table -->        
            <script>
              actTabla();
            </script>          
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
  }
?>