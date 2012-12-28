<?php

//include(dirname(__FILE__)."../Capa_Controladores/paciente.php");
//include(dirname(__FILE__)."../Capa_Controladores/persona.php");
include "../Capa_Controladores/persona.php";
include "../Capa_Controladores/paciente.php";


$rut = $_POST['RUN'];
echo $rut; 
 $rut2=str_replace(".","",$rut);//elimina puntos del rut
    $rut3=str_replace("-","",$rut2);//elimina guiones del rut
    $run=$rut3; //iguala la variable final a la variable inicial

$array1 = PacienteSeleccionIdPorRUN($run);
$array2 = PersonaSeleccionNombrePorRUN($run);

$arrayFinal = array_merge($array1[0], $array2[0]);
echo json_encode($arrayFinal);

?>
