<?php
	
	$archivo_actual = basename($_SERVER['PHP_SELF']);
?>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrador Tickets y Contenidos</title>
		<!-- Assets Style -->
		<!-- Normalize -->
		<link rel="stylesheet" href="assets/normalize/normalize.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Sweet Alert -->
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">
		<!-- Fancybox -->
		<link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<!-- Pick Date & Time -->
		<link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.css">
		<link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.date.css">
		<link rel="stylesheet" type="text/css" href="assets/pickadate/themes/default.time.css">
		<!-- Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,300italic,700,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- My Style -->
		<link href="css/style.css" rel="stylesheet">
		<!-- Color Bar -->
		<meta name="theme-color" content="#D63434">
		<meta name="msapplication-navbutton-color" content="#D63434">
		<meta name="apple-mobile-web-app-status-bar-style" content="#D63434">
		<!-- Scripts -->
		<!-- Jquery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Plugins -->
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/index/activo.js"></script>
	</head>
	<body>
	<!-- Header - Menu -->
	<header class="container-fluid header-admin">
		<div class="container padding-nule">
			<div class="header-top-bar">
				<img src="img/brand-color.png" class="col-xs-3 padding-nule img-reponsive brand-header" >
				<form class="col-xs-4 col-xs-offset-2 search-bar-header" role="search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Buscar">
						<span class="input-group-btn">
							<button class="btn search-btn_header" type="button"><img src="img/search-icon_header.png"></button>
						</span>
					</div><!-- /input-group -->
				</form><!-- /.col-xs-4 -->
				<div class="col-xs-2 col-xs-offset-1 padding-nule dropdown user-dropdown_header">
					<button class="dropdown-toggle user-dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USUARIO <span class="caret"></span></button>
					<ul class="dropdown-menu user-dropdown_list">
						<li><a href="#">Cambiar Contraseña</a></li>
						<li><a href="#">Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>
		<div class="admin-title_header">
			<h1 class="col-xs-12">Consulta de Información</h1>
		</div>
		</div>
	</header>
	<div class="container-fluid nav-header_container header-admin">
		<div class="container padding-nule">
		<nav class="nav-options_header">
			<ul class="nav padding-nule nav-options">
	<?php
		if($archivo_actual == "inicio.php"){
			echo '<li role="presentation"><a href="inicio.php" class="nav_header-active">Tickets</a></li>';
		}else{
			echo '<li role="presentation"><a href="inicio.php" >Tickets</a></li>';
		}		
		echo '<li role="presentation"><a href="#">Repositorio</a></li>';
		echo '<li role="presentation"><a href="#">Productos</a></li>';			
		
	?>
				<button class="new-post_button"><span style="margin-right:5px; font-weight: 700;">+</span> Nuevo</button>
				<div class="new-post_actions">
				<ul class="new-post_actions-ul">
					<li><a class="action-lightbox" data-fancybox-type="iframe" href="nuevo_ticket.php">Ticket</a></li>
					<li role="separator" class="divider"></li>
					<li><a <a class="action-lightbox" data-fancybox-type="iframe" href="nuevo_repositorio.php">Archivo</a></li>	
					<li role="separator" class="divider"></li>
					<li><a class="action-lightbox" data-fancybox-type="iframe" href="#">Cliente</a></li>						
				</ul>
				</div>
			</ul>
		</nav>
		</div>
	</div>
