<?php

/**
 * Descripcion: Comprobar si el usuario es doctor/funcionario, y en caso 
 * de que sea guardar informacion en SESSION y manejar las instituciones
 * correspondientes
 * Input (SESSION):
 * 	int idMedicoLog
 *	int idFuncionarioLog
 * Output: No hay, redireccion según ruteo correspondiente.
 */

include_once(dirname(__FILE__) . '/sessionCheck.php');
include_once(dirname(__FILE__) . '/../Capa_Controladores/medicoHasSucursal.php');
include_once(dirname(__FILE__) . '/../Capa_Controladores/sucursalesHasFuncionarios.php');

iniciarCookie();
verificarIP();

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if ($_SESSION['idMedicoLog'] != null || $_SESSION['idFuncionarioLog'] != null) {
    if ($_SESSION['idMedicoLog'] != null) {
        $idMedico = $_SESSION['idMedicoLog'][0];

        $_SESSION['lugares'] = MedicoHasSucursal::SucursalesPorIdMedico($idMedico);
    }
    if ($_SESSION['idFuncionarioLog'] != null) {
        $idFuncionario = $_SESSION['idFuncionarioLog'];

        $_SESSION['expendedores'] = SucursalesHasFuncionarios::SucursalesPorIdFuncionario($idFuncionario);

    }
        $page = "../Capa_Vistas/decision.php";

} elseif ($_SESSION['idPacienteLog'] != null) {
    $page = "../Capa_Vistas/Paciente/paginaPaciente.php";
} else {
    $page = "../Capa_Vistas/Medico/logout.php?error=1";
}

header("Location: http://$host$uri/$page");
?>
