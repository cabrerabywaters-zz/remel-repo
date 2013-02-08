<?php

/**
 * Descripcion: Entrega las subclases de una clase dada para la funcionalidad
 * de multiselect
 * Input (POST)
 *	int clase
 * Output: json con las subclases
 */


include_once(dirname(__FILE__)."/../Capa_Controladores/subClaseTerapeutica.php");

$id = $_POST['clase'];
$array = SubClaseTerapeutica::Seleccionar("WHERE Clases_Terapeuticas_idClase_Terapeutica = '$id'");

echo json_encode($array);

?>
