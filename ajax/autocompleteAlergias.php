<?php

/*
 * Descripcion: Recibe un string y entrega entradas de Alergia que contengan
 * informacion similar y relevante.
 * Input (POST):
 *	string name_startsWith
 * Output: json con entradas de Alergia relevantes
 */

session_start();
include_once('../Capa_Controladores/alergia.php');

$alergias = Alergia::BuscarAlergiaLike($_POST['name_startsWith'],$_SESSION['idPaciente']);

echo json_encode($alergias);

?>
