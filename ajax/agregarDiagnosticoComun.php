<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/diagnosticoComun.php");

$idMedico = $_SESSION['idMedicoLog'];
$idDiagnostico = $_POST['idDiagnostico'];

$output = DiagnosticoComun::Insertar($idMedico, $idDiagnostico);

echo json_encode($output);

?>
