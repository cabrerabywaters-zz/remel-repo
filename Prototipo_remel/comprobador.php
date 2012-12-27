<?php

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

session_start();
if($_SESSION['idMedico'] != null) $page = "decisionDoctor.php";
else $page = "paginaPaciente.php";

header("Location: http://$host$uri/$page");

?>
