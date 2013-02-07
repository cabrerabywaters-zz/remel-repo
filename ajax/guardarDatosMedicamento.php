<?php

/*
 * Descripcion: Guardar datos medicamento en sesion.
 * Input (POST):
 *      int idMedicamento
 *      int idReceta
 *	int unidad
 * Output: int de estado final (siempre 1)
 * TODO: Cambiar el estado para manejar errores.
 */

error_reporting(0);
session_start();
$_SESSION['medicamentoID'] = $_POST['idMedicamento'];
$_SESSION['recetaID'] = $_POST['idReceta'];
$_SESSION['unidadID'] = $_POST['unidad'];
echo '1';
?>
