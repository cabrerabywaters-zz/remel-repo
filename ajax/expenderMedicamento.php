<?php

/*
 * Descripcion: Guardar movimiento de expender en sesion.
 * Input (POST):
 *	int cantidad
 *	int compradorRUT
 * Output: int de estado final (siempre 1)
 * TODO: Cambiar el estado para manejar errores.
 */

error_reporting(0);
session_start();

$_SESSION['cantidadMedicamentoVendido'] = $_POST['cantidad'];
$_SESSION['compradorRUT'] = $_POST['compradorRUT'];
echo json_encode(1);
?>
