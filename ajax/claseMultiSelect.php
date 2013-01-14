<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/claseTerapeutica.php");

$array = ClaseTerapeutica::Seleccionar("");

echo json_encode($array);

?>
