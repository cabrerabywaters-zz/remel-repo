<?php

/* Descripcion: Insertar nuevo diagnostico favorito a base de datos y devolver
 *  el estado.
 * Input (POST)
 * 	int idDiagnostico
 * Input (SESSION)
 *	int idMedicoLog
 * Output: Json con el estado de la insercion
 */

include_once(dirname(__FILE__)."/../Capa_Controladores/diagnosticoComun.php");

$idMedico = $_SESSION['idMedicoLog'];
$idDiagnostico = $_POST['idDiagnostico'];

$output = DiagnosticoComun::Insertar($idMedico, $idDiagnostico);

echo json_encode($output);

?>
