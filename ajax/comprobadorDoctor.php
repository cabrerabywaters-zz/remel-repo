<?php

include_once(dirname(__FILE__).'/sessionCheck.php');

iniciarCookie();
verificarIP();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');


if($_SESSION['idMedicoLog'] != null){ 
   include_once('../Capa_Controladores/medicosHasPlazasInstituciones.php');
   
   $idMedico = $_SESSION['idMedicoLog'][0];
   
  
   $instituciones = MedicosHasPlazasInstituciones::PlazasPorIDMedico($idMedico);
   
   // falta agregar que las instituciones sean prestadoras de salud.
   
   
   $_SESSION['instituciones_doctor']= $instituciones;
    
    $page = "../Capa_Vistas/decisionDoctor.php";
    
    
    }
else $page = "../Capa_Vistas/Paciente/paginaPaciente.php";

header("Location: http://$host$uri/$page");

?>
