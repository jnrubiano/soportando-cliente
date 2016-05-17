<?php

	/*$archivo = "archivos/$archivo";

	// Definimos el nombre de archivo a descargar.
	$filename = $_GET['archivo'];
	// Ahora guardamos otra variable con la ruta del archivo
	$file = "archivos/".$filename;
	// Aquí, establecemos la cabecera del documento
	//header("Content-Description: Descargar imagen");
	//header("Expires: 0");
	header("Content-Type: force-download");
	header("Content-Length: " . filesize($file));
	header("Content-Disposition: attachment; filename='$filename'");
	//header("Content-Transfer-Encoding: binary");
	
	//set_time_limit(6000);
	readfile($file);*/

	$file = $_GET['archivo'];
	//$file = realpath($_SERVER["DOCUMENT_ROOT"])."/admin_soportando/archivos/".$file;
	echo $file;
    header("Content-Disposition: attachment; filename=\"".$file."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Type: force-download");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
	    
	
?>