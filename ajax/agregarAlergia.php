<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . '/../Capa_Controladores/alergiaHasPaciente.php');


$idPaciente = $_REQUEST['paciente'];
$idAlergia = $_REQUEST['alergia'];

$insercion=AlergiaHasPaciente::Insertar($idAlergia, $idPaciente);
  

    if($insercion)
    {echo '1';}
    else{
        echo '0';
    }


?>
