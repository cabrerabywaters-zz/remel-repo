<?php

include_once(dirname(__FILE__) . '/sessionCheck.php');
include_once(dirname(__FILE__) . '/../Capa_Controladores/medicoHasSucursal.php');

iniciarCookie();
verificarIP();

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if ($_SESSION['idMedicoLog'] != null) {
    $idMedico = $_SESSION['idMedicoLog'][0];

    $_SESSION['lugares'] = MedicoHasSucursal::SucursalesPorIdMedico($idMedico);

    $page = "../Capa_Vistas/decisionDoctor.php";
} elseif ($_SESSION['idPacienteLog'] != null) {
    $page = "../Capa_Vistas/Paciente/paginaPaciente.php";
} else {
    $page = "../Capa_Vistas/Medico/logout.php";
}

header("Location: http://$host$uri/$page");
?>
