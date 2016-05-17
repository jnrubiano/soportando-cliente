<?php

    ini_set('date.timezone', 'America/Bogota');
    
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $hour = date("H");
    $minutes = date("i");

    //Get The date from Database
    function formatMsqlDate($fecha){
        $fecha = strtotime($fecha);
        $year = date("Y", $fecha);
        $month = date("m",$fecha);
        $day = date("d", $fecha);
        return $year."-".$month."-".$day;
    }

    //Get The Hour from Database
    function formatMsqlTime($fecha){
        $fecha = strtotime($fecha);
        $hour = date("h",$fecha);
        $minute = date("H",$fecha);
        $form = date("s", $fecha);
        return $hour."-".$minute."-".$form;
    }

    function obtenerFecha($fecha){
        $fecha = strtotime($fecha);
        $dayWeek = date("N", $fecha);
        $year = date("Y", $fecha);
        $month = date("n",$fecha);
        $day = date("d", $fecha);
        return retornarDia($dayWeek).", ".$day." ".retornarMes($month)." ".$year;
    }

    function obtenerHora($fecha){
        $fecha = strtotime($fecha);
        $hour = date("h",$fecha);
        $minute = date("i",$fecha);
        $form = date("a", $fecha);
        return $hour.":".$minute." ".$form;
    }
    
    function horaMovie($fecha){
        $fecha= strtotime($fecha);
        $year = date("Y", $fecha);
        $month = date("m", $fecha);
        $day = date("d", $fecha);

        return $year."-".$month."-".$day;
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

    function horaListAd($fecha){
        $day = date("d", strtotime($fecha));
        $month = date("m",strtotime($fecha));
        $year = date("Y",strtotime($fecha));
        $hour = date("g",strtotime($fecha));
        $minutes = date("i",strtotime($fecha));
        $antePost = date("A", strtotime($fecha));
        return $day."/".$month."/".$year."<br>".$hour.":".$minutes." ".$antePost;
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

    function extNameImg($nombre){
        $longitud = strlen($nombre);
        $resultado = "";
        for ($i=$longitud-1; $i > 0; $i--) { 
            if($nombre[$i] == '/'){
                $iniciar = $i;
                $i = 0;
            }
        }
        $resultado = substr($nombre, $iniciar+1);
        
        return $resultado;
    }

    function retornarDia($valor){
        if($valor == 1){
            return "Lunes";
        }if($valor == 2){
            return "Martes";
        }if($valor == 3){
            return "Miércoles";
        }if($valor == 4){
            return "Jueves";
        }if($valor == 5){
            return "Viernes";
        }if($valor == 6){
            return "Sábado";
        }if($valor == 7){
            return "Domingo";
        }
    }

    function retornarMes($valor){
        if($valor == 1){
            return "ene";
        }if($valor == 2){
            return "feb";
        }if($valor == 3){
            return "mar";
        }if($valor == 4){
            return "abr";
        }if($valor == 5){
            return "may";
        }if($valor == 6){
            return "jun";
        }if($valor == 7){
            return "jul";
        }if($valor == 8){
            return "ago";
        }if($valor == 9){
            return "sep";
        }if($valor == 10){
            return "oct";
        }if($valor == 11){
            return "nov";
        }if($valor == 12){
            return "dic";
        }
    }

?>