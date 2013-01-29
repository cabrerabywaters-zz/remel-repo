<?php

include_once('../Capa_Controladores/comuna.php');

 $idRegion= $_POST['idRegion'];
 $letras= $_POST['name_startsWith'];

$comunas = Comuna::BuscarComunaPorRegionYNombre($idRegion, $letras);

echo json_encode($comunas);

?>