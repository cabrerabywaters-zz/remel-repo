<?php

include_once('../Capa_Controladores/alergia.php');


$alergias = Alergia::BuscarAlergiaLike($_POST['name_startsWith']);

echo json_encode($alergias);

?>
