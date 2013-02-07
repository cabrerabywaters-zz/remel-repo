<?php

 /*
  * Descripcion: Busca los datos y el nombre de un paciente segun su rut.
  * NO PERMITE ATENDERSE A SI MISMO
  * Input (POST)
  * 	int RUN (a atender)
  * Input (SESSION)
  *	int RUT (atendiendo)
  * Output: json con datos de paciente o un error. 
  */
session_start();
include_once(dirname(__FILE__)."/../Capa_Controladores/persona.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
include_once(dirname(__FILE__)."/utilidades.php");

$rut = validadorRUT($_POST['RUN']);
if ($_SESSION['RUT'] != $rut){
$array1 = Paciente::EncontrarPacienteAssoc($rut);
$array2 = Persona::BuscarNombre($rut);

$arrayFinal = array_merge($array1, $array2);
echo json_encode($arrayFinal);
} else echo 'error';
?>
