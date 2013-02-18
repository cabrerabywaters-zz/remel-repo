<?php

/**
 * Descripcion: Borra una combinacion Medico-Diagnostico (diagnosticoComun) y
 * entrega el estado final de la operacion
 * Input (POST):
 *      int idDiagnostico
 * Input (SESSION):
 *	int idMedicoLog
 * Output: json con estado final.
 */

include_once(dirname(__FILE__)."/../Capa_Controladores/diagnosticoComun.php");

$idMedico = $_SESSION['idMedicoLog'][0];
$idDiagnostico = $_POST['idDiagnostico'];

$output = DiagnosticoComun::BorrarPorId($idMedico, $idDiagnostico);

echo json_encode($output);

?>
