<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/subClaseTerapeutica.php");

$id = $_POST['clase'];
$array = SubClaseTerapeutica::Seleccionar("WHERE Clases_Terapeuticas_idClase_Terapeutica = '$id'");

echo json_encode($array);

?>
