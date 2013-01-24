<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include_once(dirname(__FILE__) . '/../Capa_Controladores/pacienteHasCondicion.php');


$idPaciente = $_REQUEST['paciente'];
$idCondicion = $_REQUEST['condicion'];

$insercion= PacienteHasCondicion::Insertar($idPaciente, $idCondicion);
  

    if($insercion)
    {echo '1';}
    else{
        echo '0';
    }



?>
