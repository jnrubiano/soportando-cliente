<?php

    ini_set('date.timezone', 'America/Bogota');

    $horaCons = date("G");
    $minCons = date("i");
    $segCons = date("s");

    $dateCons = date("d");
    $monthCons = date("m");

	$consultaDate = date("w");
	$consultaMonth = date("n");

    $day = date("j");
    $year = date("Y");

	//Día	
    if($consultaDate == 0){
      $name = "Domingo";
    }if($consultaDate == 1){
      $name = "Lunes";
    }if($consultaDate == 2){
      $name = "Martes";
    }if($consultaDate == 3){
      $name = "Miércoles";
    }if($consultaDate == 4){            
      $name = "Jueves";
    }if($consultaDate == 5){
      $name = "Viernes";
    }if($consultaDate == 6){
      $name = "Sábado";
    }

    //Mes
    if($consultaMonth == 1){
    	$month = "Enero";
    }if($consultaMonth == 2){
    	$month = "Febrero";
    }if($consultaMonth == 3){
    	$month = "Marzo";
    }if($consultaMonth == 4){
    	$month = "Abril";
    }if($consultaMonth == 5){
    	$month = "Mayo";
    }if($consultaMonth == 6){
    	$month = "Junio";
    }if($consultaMonth == 7){
    	$month = "Julio";
    }if($consultaMonth == 8){
    	$month = "Agosto";
    }if($consultaMonth == 9){
    	$month = "Septiembre";
    }if($consultaMonth == 10){
    	$month = "Octubre";
    }if($consultaMonth == 11){
    	$month = "Novimebre";
    }if($consultaMonth == 12){
    	$month = "Diciembre";
    }

    function cambiaFecNormal($fecha){ 
     
        $fecha= strtotime($fecha);
        
        $dia=date("d",$fecha);
        $mes=date("m",$fecha);
            switch($mes) 
            { 
            case "01": 
                $mes="Ene"; 
                break; 
            case "02": 
                $mes="Feb"; 
                break; 
            case "03": 
                $mes="Mar"; 
                break; 
            case "04": 
                $mes="Abr"; 
                break; 
            case "05": 
                $mes="May"; 
                break; 
            case "06": 
                $mes="Jun"; 
                break; 
            case "07": 
                $mes="Jul"; 
                break; 
            case "08": 
                $mes="Ago"; 
                break; 
            case "09": 
                $mes="Sep"; 
                break; 
            case "10": 
                $mes="Oct"; 
                break; 
            case "11": 
                $mes="Nov"; 
                break; 
            case "12": 
                $mes="Dic"; 
                break; 
            } 
        $ano = date("y",$fecha); 
        $hora = date("H",$fecha);
        $minuto = date("i",$fecha);
        $fecha = $mes." ".$dia."/".$ano." | ".$hora.":".$minuto;
        return $fecha;
    
    } 

    function cambiaFecDeporte($fecha){ 
     
        $fecha= strtotime($fecha);
        
        $dia=date("d",$fecha);
        $mes=date("m",$fecha);

        switch($mes){ 
            case "01": 
                $mes="Enero"; 
                break; 
            case "02": 
                $mes="Febrero"; 
                break; 
            case "03": 
                $mes="Marzo"; 
                break; 
            case "04": 
                $mes="Abril"; 
                break; 
            case "05": 
                $mes="Mayo"; 
                break; 
            case "06": 
                $mes="Junio"; 
                break; 
            case "07": 
                $mes="Julio"; 
                break; 
            case "08": 
                $mes="Agosto"; 
                break; 
            case "09": 
                $mes="Septiembre"; 
                break; 
            case "10": 
                $mes="Octubre"; 
                break; 
            case "11": 
                $mes="Noviembre"; 
                break; 
            case "12": 
                $mes="Diciembre"; 
                break; 
            } 
        $ano = date("y",$fecha); 
        /*$hora = date("H",$fecha);
        $minuto = date("i",$fecha);*/
        $fecha = $mes." ".$dia."/".$ano;
        return $fecha;
    
    } 

    function cambiaHoraDeporte($fecha){ 
     
        $fecha= strtotime($fecha);

        $hora = date("G", $fecha);
        $minuto = date("i", $fecha);

        return $hora.":".$minuto;

    }

    function cambiaFecMysql($fecha){ 
        ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha); 
        $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
        return $lafecha; 
    }

    function quitarTildes($frase){
        $vowels = array();
        if((strpos($frase,'á') !== false) || (strpos($frase,'Á') !== false)){
            array_push($vowels, "á");
            array_push($vowels, "Á");
            $resultado = str_replace($vowels,"a",$frase);
            $frase = $resultado;
        }if((strpos($frase,'é') !== false) || (strpos($frase,'É') !== false)){
            unset($vowels);
            $vowels = array();
            array_push($vowels, "é");
            array_push($vowels, "É");
            $resultado = str_replace($vowels,"e",$frase);
            $frase = $resultado;
        }if((strpos($frase,'í') !== false) || (strpos($frase,'Í') !== false)){
            unset($vowels);
            $vowels = array();
            array_push($vowels, "í");
            array_push($vowels, "Í");
            $resultado = str_replace($vowels,"i",$frase);
            $frase = $resultado;
        }if((strpos($frase,'ó') !== false) || (strpos($frase,'Ó') !== false)){
            unset($vowels);
            $vowels = array();
            array_push($vowels, "ó");
            array_push($vowels, "Ó");
            $resultado = str_replace($vowels,"o",$frase);
            $frase = $resultado;
        }if((strpos($frase,'ú') !== false) || (strpos($frase,'Ú') !== false)){
            unset($vowels);
            $vowels = array();
            array_push($vowels, "ú");
            array_push($vowels, "Ú");
            $resultado = str_replace($vowels,"u",$frase);
            $frase = $resultado;
        }
        $frase = str_replace(" ","-",$frase);
        return $frase;
    }  

    function ponerEspacios($frase){
        $resultado = str_replace("-", " ", $frase);
        return $resultado;

    }

?>