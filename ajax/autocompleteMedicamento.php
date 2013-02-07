<?php

/*
 * Descripcion: Recibe un string y entrega entradas de Medicamento que contengan
 * informacion similar y relevante para autocompletar. 
 * Filtra segun principioActivo y/o arsenal.
 * Input (POST):
 *      string name_startsWith
 *	bool filtro (filtro principioActivo)
 *	bool filtro2 (filtro Arsenal)
 * Output: json con entradas relevantes de Medicamento.
 */

include_once(dirname(__FILE__).'/../Capa_Controladores/medicamento.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/principioActivo.php');
session_start();

if($_POST['filtro'] == "true" and $_POST['filtro2']=="false"){
	$medicamentos = PrincipioActivo::BuscarPrincipioActivoLike($_POST['name_startsWith']);
}


else if($_POST['filtro'] == "false" and $_POST['filtro2']=="false"){
	$medicamentos = Medicamento::BuscarMedicamentoLike($_POST['name_startsWith']);
}
else if($_POST['filtro'] == "false" and $_POST['filtro2']=="true")
{
    
    $medicamentos = Medicamento::BuscarMedicamentoArsenalLike($_POST['name_startsWith'], $_SESSION['logLugar']['rutSucursal']);
}
 
else if(($_POST['filtro'] == "true" and $_POST['filtro2']=="true")) {
    
  
   $medicamentos = PrincipioActivo::BuscarPrincipioActivoArsenalLike($_POST['name_startsWith'], $_SESSION['logLugar']['rutSucursal'])  ;
 
}
 


echo json_encode($medicamentos);




?>
