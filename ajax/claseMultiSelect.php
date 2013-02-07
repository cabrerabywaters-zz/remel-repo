<?php

/*
 * Descripcion: Entregar las clases terapeuticas para completar la funcionalidad
 * de multiselect.
 * Output: json con las clases terapeuticas.
 */

include_once(dirname(__FILE__)."/../Capa_Controladores/claseTerapeutica.php");

$array = ClaseTerapeutica::Seleccionar("");

echo json_encode($array);

?>
