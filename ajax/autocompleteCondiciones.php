<?php

/**
 * Descripcion: Recibe un string y entrega entradas de Condicion que contengan
 * informacion similar y relevante.
 * Input (POST):
 *      string name_startsWith
 * Output: json con entradas de Condicion relevantes
 */

session_start();
include_once('../Capa_Controladores/condicion.php');


$condicion = Condicion::BuscarCondicionLike($_POST['name_startsWith'],$_SESSION['idPaciente']);


echo json_encode($condicion);

?>
