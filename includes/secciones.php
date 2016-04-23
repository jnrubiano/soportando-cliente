<?php
/**
	Puede suceder que el dato que se busca en los métodos no se encuentren dentro de los arreglos, en esos
	casos se debe informar al usuario. Evaluar la posibilidad de mostrar una imagen como los micos de google.
**/

	//Abrir conexión a la base de datos
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/admin_noticlaro/includes/conexion.php");

  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/admin_noticlaro/includes/hora.php");

    $consultaSecNew = "SELECT * FROM seccion";
    $resNew = mysqli_query($conn, $consultaSecNew) or die ("ERROR secciones 1 ".$consultaSecNew);

    $idNewSec = array();
    $nameNewSec = array();

    while ($fila = mysqli_fetch_array($resNew)) {
      array_push($idNewSec, $fila['id_seccion']);
      array_push($nameNewSec, strtolower(quitarTildes(html_entity_decode(utf8_encode($fila['name_seccion'])))));
    }

	//Consulta de secciones y subsecciones
  	$consulta = "select a.id_seccion, a.name_seccion, b.id_subseccion, b.name_subseccion from seccion a INNER JOIN subseccion b on a.id_seccion = b.id_seccion_subseccion where a.activo_seccion and b.activo_subseccion";

  	$res = mysqli_query($conn,$consulta) or die ("Error en: $consulta: " . mysqli_error($conn));
  	$cant = mysqli_num_rows($res);

  	$idSecciones = array();
  	$arregloSecciones = array();
  	$idSubsecciones = array();
  	$arregloSubsecciones = array(); 	

  	while($fila = mysqli_fetch_array($res))              
  	{
		  array_push($idSecciones, $fila['id_seccion']);
  		array_push($arregloSecciones, strtolower(quitarTildes(utf8_encode($fila['name_seccion']))));
  		array_push($idSubsecciones, $fila['id_subseccion']);
  		array_push($arregloSubsecciones, strtolower(quitarTildes(utf8_encode($fila['name_subseccion']))));
  	}
  	
	   $tamIdSecciones = count($idSecciones);  		
  	 $tamIdSubsecciones = count($idSubsecciones);	


     //Busca la sección en el formulario de creación de secciones
     function buscarIdSeccionNew($name){
      global $idNewSec;
      global $nameNewSec;
      for ($i=0; $i < $idNewSec; $i++) { 
          if($nameNewSec[$i] == $name){
            return $idNewSec[$i];
          }
      }
     }

  	function buscarSeccion($idSeccion)
  	{	
  		global $tamIdSecciones;  		  		
  		global $idSecciones;
  		global $arregloSecciones;
  		$resultado = "No se encontro la sección";  		
  		for ($i=0; $i < $tamIdSecciones; $i++) {   			
  			if($idSecciones[$i] == $idSeccion) 
  				return $arregloSecciones[$i];  			
  		}
  	}

    function buscarIdSeccion($nameSeccion)
    {      
      global $tamIdSecciones;
      global $arregloSecciones;
      global $idSecciones;

      for ($i=0; $i < $tamIdSecciones; $i++) {
        if($arregloSecciones[$i] == $nameSeccion){
          return $idSecciones[$i];
        }
      }
    }

    function buscarIdSubseccion($nameSubseccion)
    {
      global $tamIdSecciones;
      global $arregloSubsecciones;
      global $idSubsecciones;

      for ($i=0; $i < $tamIdSecciones; $i++) {
        if($arregloSubsecciones[$i] == $nameSubseccion){
          return $idSubsecciones[$i];
        }
      }
    }

  	function buscarSubseccion($idSubseccion)
  	{
  		global $tamIdSubsecciones;  		  		
  		global $idSubsecciones;
  		global $arregloSubsecciones;  		
  		$resultado = "No se encontro la sección";   		
  		for ($i=0; $i < $tamIdSubsecciones; $i++) {  
  			if($idSubsecciones[$i] == $idSubseccion)  				
  				return $arregloSubsecciones[$i];  					  			
  		}
  	}

  //Cerrar la conexión a la base de datos.
  //	mysql_close();
?>