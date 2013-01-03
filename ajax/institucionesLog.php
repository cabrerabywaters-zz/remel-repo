<?php

include_once(dirname(__FILE__).'/Capa_Controladores/medicosHasInstituciones.php');

session_start();

$instituciones =  MedicosHasInstituciones::InstitucionesPorID($_SESSION['idMedicoLog']);

echo json_encode($instituciones);

?>
