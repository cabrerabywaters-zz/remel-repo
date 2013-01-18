<?php

include_once('../Capa_Controladores/condicion.php');


$condicion = Condicion::BuscarCondicionLike($_POST['name_startsWith']);

echo json_encode($condicion);

?>
