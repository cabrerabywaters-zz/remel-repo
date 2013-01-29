<?php
error_reporting(0);
session_start();

$_SESSION['cantidadMedicamentoVendido'] = $_POST['cantidad'];
echo json_encode(1);
?>
