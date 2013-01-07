<?php
include_once("../Capa_Controladores/historialMedico.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$diagnostico = $_REQUEST['diagnostico'];
$consulta = $_REQUEST['consulta'];
$tipo_diag = $_REQUEST['tipo'];



   $insertar =HistorialMedico::Insertar($diagnostico, $consulta, $tipo_diag);
if($insertar=TRUE)
{
    
    echo '1';
}
else{
    echo  "0";
}




?>
