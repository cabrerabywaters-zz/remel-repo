<?php

/*
 * Archivo de pruebas para verificar envío de formulario de ingreso vía ajax
 * @author: Cesar Gonzalez
 */

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$dias = $_POST['dias'];

if($nombre != "" && $fecha !="" && $dias != ""){
    echo "<span class='label label-success'>Ingresado!</span>nombre: $nombre, fecha: $fecha, dias: $dias.";
}

?>
