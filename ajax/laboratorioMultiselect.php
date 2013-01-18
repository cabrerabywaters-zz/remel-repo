<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
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
