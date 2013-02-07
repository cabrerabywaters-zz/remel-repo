<?php

/*
 * Descripcion: Recibe un string y entrega entradas de Prevision que contengan
 * informacion similar y relevante para autocompletar.
 * Input (POST):
 *      string name_startsWith
 * Output: json con entradas de Prevision relevantes
 */

include_once('../Capa_Controladores/prevision.php');

$nombre = $_POST['name_startsWith'];

$prevision = Prevision::BuscarPrevisionLike($nombre);

echo json_encode($prevision);

?>
