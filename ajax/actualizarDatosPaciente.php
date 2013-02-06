    <?php

include_once(dirname(__FILE__) . '/../Capa_Controladores/persona.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/comuna.php');
session_start();
$run = $_POST['RUN'];
$peso = $_POST['Peso'];
$altura = $_POST['Altura'];
$calle = $_POST['Direccion'];
$comuna = $_POST['Comuna'];
$nCalle = $_POST['Numero'];
$nCelular = $_POST['N_celular'];
$nFijo = $_POST['N_fijo'];
$prevision = $_POST['Prevision'];
$seguro = $_POST['Seguro'];

$comuna = Comuna::BuscarComunaPorNombre($comuna);
$comuna = $comuna['idComuna'];

$actualizado = Persona::MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo, $prevision, $seguro);
if ($actualizado==1){
    
    echo '1';
}
else
{
    
        echo '0';
}

?>