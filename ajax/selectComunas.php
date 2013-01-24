<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/comuna.php");

$nombre = $_

$comuna = Comuna::BuscarComunaLike($nombre, $idRegion);

echo json_encode($comuna);

?>
