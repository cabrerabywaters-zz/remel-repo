<?php

/*
 * Descripcion: Recibe un string y entrega entradas de Seguro que contengan
 * informacion similar y relevante para autocompletar.
 * Input (POST):
 *      string name_startsWith
 * Output: json con entradas de Seguro relevantes.
 */

include_once('../Capa_Controladores/seguro.php');

$nombre = $_POST['name_startsWith'];

$seguro = Seguro::BuscarSeguroLike($nombre);

echo json_encode($seguro);


?>
