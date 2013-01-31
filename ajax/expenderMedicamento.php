<?php
error_reporting(0);
session_start();

$_SESSION['cantidadMedicamentoVendido'] = $_POST['cantidad'];
$_SESSION['compradorRUT'] = $_POST['compradorRUT'];
echo json_encode(1);
?>
