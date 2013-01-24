<?php

include_once(dirname(__FILE__) . '/../Capa_Controladores/persona.php');

$run = $_POST['RUN'];
$peso = $_POST['Peso'];
$altura = $_POST['altura'];
$calle = $_POST['Direccion'];
$comuna = $_POST['Comuna'];
$nCalle = $_POST['Numero'];
$nCelular = $_POST['n_celular'];
$nFijo = $_POST['n_fijo'];

$actualizado = Persona::MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo);



if ($actualizado){
    
    echo "1";
}
else
{
    
        echo '0';
}


?>