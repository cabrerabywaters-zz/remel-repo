<?php

include_once('../Capa_Controladores/medicamento.php');

$medicamentos = Medicamento::BuscarMedicamentoLike($_POST['name_startsWith']);

echo json_encode($medicamentos);

?>
