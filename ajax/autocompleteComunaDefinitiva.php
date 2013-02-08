<?php

/**
 * Descripcion: Recibe un string y la region, para entregar entradas de Comuna a * que contengan informacion similar y relevante.
 * Input (POST):
 *      string name_startsWith
 *	int idRegion
 * Output: json con entradas de Comuna relevantes
 */

include_once('../Capa_Controladores/comuna.php');

 $idRegion= $_POST['idRegion'];
 $letras= $_POST['name_startsWith'];

$comunas = Comuna::BuscarComunaPorRegionYNombre($idRegion, $letras);

echo json_encode($comunas);

?>
