<?php
include_once('../Capa_Controladores/Region.php');

$idComuna = $_POST['idComuna'];

$region = Region::BuscarRegionPorIDComuna($idComuna);

echo json_encode($region);

?>
