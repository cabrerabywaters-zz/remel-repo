<?php

/**
 * Descripcion: Entrega informacion de diagnostico segun id.
 * Input (POST)
 * 	int diagnostico
 * Output: json con datos de diagnostico
 */

include_once('../Capa_Controladores/diagnostico.php');
$diagnostico = $_REQUEST['diagnostico'];

$diagnostico_array = Diagnostico::BuscarDiagnosticoExacto($diagnostico);

echo json_encode($diagnostico_array)

?>
