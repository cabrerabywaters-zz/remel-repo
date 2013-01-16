<?php

include_once(dirname(__FILE__).'/sessionCheck.php');

iniciarCookie();
verificarIP();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


if($_SESSION['idMedicoLog'] != null){ 
   include_once('../Capa_Controladores/medicoHasSucursal.php');
   
   $idMedico = $_SESSION['idMedicoLog'][0];
   
  
   $instituciones = MedicoHasSucursal::SucursalesPorIdMedico($idMedico);
   
   // falta agregar que las instituciones sean prestadoras de salud.
   
   
   $_SESSION['instituciones_doctor']= $instituciones;
    
    $page = "../Capa_Vistas/decisionDoctor.php";
    
    
    }
elseif($_SESSION['idPacienteLog'] != null){
    $page = "../Capa_Vistas/Paciente/paginaPaciente.php";

}
else{
    $page = "../Capa_Vistas/Medico/logout.php";
}

header("Location: http://$host$uri/$page");

?>
