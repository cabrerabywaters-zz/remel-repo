<?php

include_once('../Capa_Controladores/diagnostico.php');


$diagnosticos = Diagnostico::BuscarDiagnosticoLike($_POST['name_startsWith']);

 echo json_encode($diagnosticos);

?>
