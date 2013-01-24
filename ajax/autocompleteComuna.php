<?php

include_once('../Capa_Controladores/comuna.php');
include_once('../Capa_Controladores/region.php');


//$nombre_region = $_POST['nombre_region'];

$idRegion = Region::BuscarRegionPorNombre($nombre_region);

$fila = $idRegion->fetch_assoc();

print_r($fila['idRegion']);

//$idRegion = $_POST['idRegion'];

//$comuna = Comuna::BuscarComunaLike($_POST['name_startsWith'],$idRegion);
$comuna = Comuna::BuscarComunaLike($_POST['name_startsWith'],$idRegion);


echo json_encode($comuna);

?>