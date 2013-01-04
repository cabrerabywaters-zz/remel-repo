<?php

include_once('../Capa_Controladores/diagnosticos.php');


$diagnosticos = Diagnostico::BuscarDiagnosticoLike($_REQUEST['name_startsWith']);


?>
