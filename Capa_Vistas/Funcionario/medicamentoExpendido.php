<?php

include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamentoVendido.php");

$fechaActual = date("Y-m-d H:i:s");
$med = MedicamentoVendido::InsertarConParametros($_SESSION['logLugar']['idLugar'], 
                                                                $_SESSION['medicamentoID'],
                                                                $_SESSION['recetaID'], 
                                                                $_SESSION['cantidadMedicamentoVendido'], 
                                                                $fechaActual, 
                                                                $_SESSION['unidadID']);
if ($med){
 echo 'Medicamento Expendido Exitosamente.';   
}
?>
