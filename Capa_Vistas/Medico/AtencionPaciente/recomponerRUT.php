<?php

$lugar=(strlen($cadena)-1);
$insertar = "-"; 
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
$cadena=$resultado;
$lugar=(strlen($cadena)-5);
$insertar = ".";
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
$cadena=$resultado;
$lugar=(strlen($cadena)-9);
$insertar = ".";
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
?>