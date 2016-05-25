<?php
	session_start();
	session_destroy();
	$_SESSION['begin'] = false;
	header('Location: ../../login.php');

?>