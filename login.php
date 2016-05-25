<!DOCTYPE html>
<html lang="es" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Login Soportando</title>
    <!-- Assets Style -->  
      <!-- Normalize -->
      <link rel="stylesheet" href="assets/normalize/normalize.css">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <!-- Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">   
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,300italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- My Style -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Color Bar -->
    <meta name="theme-color" content="#D63434">
    <meta name="msapplication-navbutton-color" content="#D63434">
    <meta name="apple-mobile-web-app-status-bar-style" content="#D63434">
  </head>
  <body style="height: 100%;">
    <section class="login-container_index">    
      <div class="container container-center-outter" style="height: 100%;">
        <div class="container-center-middle">
          <div class="container-center-inner">
            <section class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 padding-nule login-container">
              <h1 class="col-xs-12 login-logo"><img src="img/brand-color.png" class="img-responsive block center"></h1>
              <form method="post" name="login_admin" id="formLogin" class="col-xs-12 login-form">
                <div class="login-form-group">
                  <label for="user">Usuario</label>
                  <input type="text" name="user" for="user" class="form-control" id="user">
                </div>
                <div class="login-form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" name="pass" for="password" class="form-control" id="password">
                </div>
                <button type="submit" value="login" id="btnLogin" class="btn" >Ingresar</button>
                <p id="respuesta"></p>
              </form>
            </section>
          </div><!-- Closed - container-center-inner -->
        </div><!-- Closed - container-center-middle -->
      </div><!-- Closed - container-center-outter -->
      <p class="powered-by">Powered by ... </p>
    </section><!-- Closed - Container Login -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <!--<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
      <!-- Plugins -->
        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Retina -->
        <script src="assets/retina/retina.min.js"></script>
        <!-- Fye Style -->
        <script src="assets/fileupload/bootstrap-filestyle.min.js"></script>
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
      <script src="js/main2.js"></script>
  </body>
</html>