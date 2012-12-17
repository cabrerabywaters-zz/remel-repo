<?php 

require_once '../Capa_Datos/Region.php';

$nombre= $_POST['nombre_region'];
$numero= $_POST['numero_region'];

 $region= new Region($nombre,$numero);
$region->Agregar_Regiones();

 

  
?>
