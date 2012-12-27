<?php

include(dirname(__FILE__)."/../../Capa_Controladores/paciente.php");
include(dirname(__FILE__)."/../../Capa_Controladores/persona.php");

$run = $_POST['RUN'];

$array1 = PacienteSeleccionIdPorRUN($run);
$array2 = PersonaSeleccionNombrePorRUN($run);

$arrayFinal = array_merge($array1[0], $array2[0]);
echo json_encode($arrayFinal);

?>
