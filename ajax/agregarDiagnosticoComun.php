<?php
session_start();
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
