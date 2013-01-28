<?php

include_once('../Capa_Controladores/seguro.php');

$nombre = $_POST['name_startsWith'];

$seguro = Seguro::BuscarSeguroLike($nombre);

echo json_encode($seguro);


?>
