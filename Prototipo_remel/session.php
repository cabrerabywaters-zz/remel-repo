<?php

session_start();

$_SESSION['rut'] = $_POST['rutUsuario'];
$_SESSION['pass'] = $_POST['passUsuario'];

mysql_real_escape_string($_SESSION['pass']);

/*
* Getting MAC Address using PHP
* Md. Nazmul Basher
*/
ob_start(); // Turn on output buffering
system('ipconfig /all'); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = 'Physical';
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac+36),17); // Get Physical Address
//se supone que obtiene la mac del usuario

$_SESSION['mac'] = $mac;

?>
