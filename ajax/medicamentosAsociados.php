<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/uso.php");

$idDiagnostico = $_POST['idDiagnostico'];
$medicamentos = Uso::SeleccionarPorIdDiagnostico($idDiagnostico);

echo json_encode($medicamentos);

?>
