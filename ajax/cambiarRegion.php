<?php

/**
 * Descripcion: Entregar la region donde pertenece una comuna dada
 * Input (POST):
 *	int idComuna
 * Output: json con informacion de Region.
 */

include_once('../Capa_Controladores/Region.php');

$idComuna = $_POST['idComuna'];

$region = Region::BuscarRegionPorIDComuna($idComuna);

echo json_encode($region);

?>
