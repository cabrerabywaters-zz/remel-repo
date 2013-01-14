<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/subClaseTerapeuticaHasMedicamento.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");

$subClase = $_POST['subclase'];
$medicamentosSubClase = SubClaseTerapeuticaHasMedicamento::Seleccionar("WHERE SubClase_Terapeutica_idSubClase = '$subClase'");

$medicamentos = array();

foreach($medicamentosSubClase as $idMedicamento){

	$medicamento = Medicamento::BuscarMedicamentoPorId($idMedicamento);
	$medicamentos[] = $medicamento;
	
}

echo json_encode($medicamentos);


?>
