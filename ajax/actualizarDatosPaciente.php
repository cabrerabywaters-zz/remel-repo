<?php

include_once(dirname(__FILE__) . '/../Capa_Controladores/persona.php');

$run = $_POST['run'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$calle = $_POST['calle'];
$comuna = $_POST['comuna'];
$nCalle = $_POST['ncalle'];
$nCelular = $_POST['ncelular'];
$nFijo = $_POST['nFijo'];

$actualizado = Persona::MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo);

echo json_encode($actualizado);


if ($actualizado != datos){
    
    return true;
}
else
{
    
        return false;
}


?>