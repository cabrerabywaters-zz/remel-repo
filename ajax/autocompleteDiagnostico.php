<?php

include_once('../Capa_Controladores/diagnostico.php');


$diagnosticos = Diagnostico::BuscarDiagnosticoLike($_REQUEST['name_startsWith']);


var_dump($diagnosticos);
  //echo json_encode($diagnosticos);

?>
