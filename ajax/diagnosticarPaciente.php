<?php

include_once('../Capa_Controladores/diagnostico.php');
$diagnostico = $_REQUEST['diagnostico'];

 $diagnostico_array = Diagnostico::BuscarDiagnosticoExacto($diagnostico);

echo json_encode($diagnostico_array)

?>
