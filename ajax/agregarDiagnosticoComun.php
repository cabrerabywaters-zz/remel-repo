<?php
<<<<<<< HEAD

/* Descripcion: Insertar nuevo diagnostico favorito a base de datos y devolver
 *  el estado.
 * Input (POST)
 * 	int idDiagnostico
 * Input (SESSION)
 *	int idMedicoLog
 * Output: Json con el estado de la insercion
 */

=======
session_start();
>>>>>>> a6e60e4a35df92427161cc93ae3f32a673d3ffcf
include_once(dirname(__FILE__)."/../Capa_Controladores/diagnosticoComun.php");

$idMedico = $_SESSION['idMedicoLog'];
$idDiagnostico = $_POST['idDiagnostico'];

$output = DiagnosticoComun::Insertar($idMedico, $idDiagnostico);

if($output){
  echo 1;   
}
else{
  echo -1;  
}

?>
