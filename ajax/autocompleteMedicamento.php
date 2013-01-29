<?php

include_once(dirname(__FILE__).'/../Capa_Controladores/medicamento.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/principioActivo.php');


if($_POST['filtro'] == "true" and $_POST['filtro2']=="false"){
	$medicamentos = PrincipioActivo::BuscarPrincipioActivoLike($_POST['name_startsWith']);
}

/*
else if($_POST['filtro'] == "false" and $_POST['filtro2']=="false"){
	$medicamentos = Medicamento::BuscarMedicamentoLike($_POST['name_startsWith']);
}
else if($_POST['filtro'] == "false" and $_POST['filtro2']=="true")
{
    
    $medicamentos = Medicamento::BuscarMedicamentoArsenalLike($_POST['name_startsWith']);
}
else if(($_POST['filtro'] == "true" and $_POST['filtro2']=="true")) {
    
  
   $medicamentos = PrincipioActivo::BuscarPrincipioActivoArsenalLike($_POST['name_startsWith'],$_POST['sucursal']);  
 
}
 
 */
echo json_encode($medicamentos);




?>
