<?php

include(dirname(__FILE__) . "/../../Capa_Controladores/medicamentoVendido.php");

error_reporting(0);
session_start();
$_SESSION['cantidadMedicamentoVendido'] = $_POST['cantidad'];
$fechaActual = date("Y-m-d H:i:s");

MedicamentoVendido::InsertarConParametros($_SESSION['idLugar'], 
                                          $_SESSION['medicamentoID'],
                                          $_SESSION['recetaID'], 
                                          $_SESSION['cantidadMedicamentoVendido'], 
                                          $fechaActual, 
                                          $_SESSION['unidadID']);
echo '1';

?>
