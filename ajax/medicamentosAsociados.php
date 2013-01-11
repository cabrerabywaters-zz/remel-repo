<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/uso.php");

//$idDiagnostico = $_POST['id'];
$idDiagnostico = "1";
$medicamentos = Uso::SeleccionarPorIdDiagnostico($idDiagnostico);

echo json_encode($medicamentos);

?>
