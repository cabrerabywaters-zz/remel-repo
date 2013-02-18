<?php

/** Descripcion: Insertar nuevo diagnostico favorito a base de datos y devolver
 *  el estado.
 * Input (POST)
 * 	int idDiagnostico
 * Input (SESSION)
 *	int idMedicoLog
 * Output: Json con el estado de la insercion
 */


session_start();
include_once(dirname(__FILE__)."/../Capa_Controladores/diagnosticoComun.php");

$idMedico = $_SESSION['idMedicoLog'][0];
$idDiagnostico = $_POST['idDiagnostico'];

$output = DiagnosticoComun::Insertar($idMedico, $idDiagnostico);

if($output){
  echo 1;   
}
else{
  echo -1;  
}

?>
