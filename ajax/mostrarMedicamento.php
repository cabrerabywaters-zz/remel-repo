<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");

$id = $_POST['idMedicamento'];

echo json_encode(Medicamento::BuscarMedicamentoPorId($id));


?>
