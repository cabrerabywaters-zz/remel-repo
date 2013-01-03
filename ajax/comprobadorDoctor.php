<?php

include 'sessionCheck.php';

iniciarCookie();
verificarIP();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


if($_SESSION['idMedicoLog'] != null) $page = "Capa_Vistas/decisionDoctor.php";
else $page = "Capa_Vistas/Paciente/paginaPaciente.php";

header("Location: http://$host$uri/$page");

?>
