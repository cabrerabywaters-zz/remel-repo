<?php

include_once(dirname(__FILE__).'/../Capa_Controladores/medicamento.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/principioActivo.php');

if($_POST['filtro'] == "true"){
	$medicamentos = PrincipioActivo::BuscarPrincipioActivoLike($_POST['name_startsWith']);
}
else{
	$medicamentos = Medicamento::BuscarMedicamentoLike($_POST['name_startsWith']);
}


echo json_encode($medicamentos);

?>
