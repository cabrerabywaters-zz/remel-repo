<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/favoritosRp.php");

$idMedicamento = $_POST['idMedicamento'];
$idMedico = $_SESSION['idMedicoLog'];
$nombreCorto = $_POST['nombreCorto'];
$cantidad = null; $unidadDeConsumo = null;
$frecuencia = null; $unidadDeFrecuencia = null;
$periodo = null; $unidadDePeriodo = null;

if(array_key_exists('cantidad',$_POST)){
	$cantidad = $_POST['cantidad'];
	$unidadDeConsumo = $_POST['unidadDeConsumo'];
}
if(array_key_exists('frecuencia',$_POST)){
	$frecuencia = $_POST['cantidad'];
	$unidadDeFrecuencia = $_POST['unidadDeFrecuencia'];
}
if(array_key_exists('periodo',$_POST)){
	$periodo = $_POST['periodo'];
	$unidadDePeriodo = $_POST['unidadDePeriodo'];
}
if(array_key_exists('via',$_POST)){
	$via = $_POST['via'];
}

FavoritosRP::Insertar($idMedicamento, $idMedico, $cantidad, $frecuencia, $unidadDeFrecuencia, $periodo, $unidadDeConsumo, $unidadDePeriodo, $via, $nombreCorto);


?>