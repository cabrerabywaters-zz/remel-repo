<?php
// agarra el rut y le inserta el guion y los puntos cada 3 digitos
$lugar=(strlen($cadena)-1);
$insertar = "-"; 
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
$cadena=$resultado;
$valor=$cadena;
$lugar=(strlen($cadena)-5);
$insertar = ".";
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
$cadena=$resultado;
$lugar=(strlen($cadena)-9);
$insertar = ".";
$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
$valorfinal=$resultado;
?>