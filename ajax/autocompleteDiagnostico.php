<?php

/*
 * Descripcion: Recibe un string y entrega entradas de Diagnostico que contengan
  * informacion similar y relevante.
  * Input (POST):
  *      string name_startsWith
  * Output: json con entradas de Diagnostico relevantes
  */

include_once('../Capa_Controladores/diagnostico.php');


$diagnosticos = Diagnostico::BuscarDiagnosticoLike($_POST['name_startsWith']);

 echo json_encode($diagnosticos);

?>
