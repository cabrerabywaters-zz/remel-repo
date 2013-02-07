<?php

/*
 * Descripcion: Entrega los medicamentos segun subClase y Laboratorio para
 * la funcionalidad de multiselect.
 * Input: 
 *	int subClase
 *	int laboratorio
 * Output: json con los medicamentos
 */


include_once(dirname(__FILE__)."/../Capa_Controladores/subClaseTerapeuticaHasMedicamento.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");

$subClase = $_POST['subclase'];
$laboratorio= $_POST['idLaboratorio'];






$medicamentosSubClase = SubClaseTerapeuticaHasMedicamento::Seleccionar("WHERE SubClase_Terapeutica_idSubClase = '$subClase'");



$medicamentos = array();

foreach($medicamentosSubClase as $idMedicamento){

	$medicamento = Medicamento::SeleccionarMedicamentoPorIDyLab($idMedicamento, $laboratorio);
	$medicamentos[] = $medicamento;
	
}

echo json_encode($medicamentos);

?>
