<?php

include_once('../Capa_Controladores/comuna.php');


$comuna = Comuna::BuscarComunaLike($_POST['name_startsWith']);

echo json_encode($comuna);

?>