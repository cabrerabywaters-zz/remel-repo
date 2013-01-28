<?php
include_once('../Capa_Controladores/prevision.php');

$nombre = $_POST['name_startsWith'];

$prevision = Prevision::BuscarPrevisionLike($nombre);

echo json_encode($prevision);

?>
