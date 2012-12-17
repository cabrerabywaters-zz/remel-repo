<?php 

require_once '../Capa_Datos/Region.php';

$nombre= $_POST['nombre_region'];
$numero= $_POST['numero_region'];

if($nombre!="" and $numero!="")
{

 $region= new Region($nombre,$numero);
$region->Agregar_Regiones();
}
 else {
 echo "<h5>* Faltan campos por completar</h5>"  ;
}
 

  
?>
