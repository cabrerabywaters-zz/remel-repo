<?php
error_reporting(0);
session_start();
$_SESSION['medicamentoID'] = $_POST['idMedicamento'];
$_SESSION['recetaID'] = $_POST['idReceta'];
$_SESSION['unidadID'] = $_POST['unidad'];
echo '1';
?>
