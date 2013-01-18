<?php

include_once(dirname(__FILE__) . '/../Capa_Controladores/paciente.php');
$idPaciente = 

$actualizado = Paciente::ActualizarPorId($idPaciente);

echo json_encode($actualizado);


if ($actualizado != datos){
    
    return true;
}
else
{
    
        return false;
}


?>