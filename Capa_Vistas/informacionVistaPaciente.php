<?php

include(dirname(__FILE__) . "/../Capa_Controladores/alergia.php");
include(dirname(__FILE__) . "/../Capa_Controladores/condicion.php");
include(dirname(__FILE__) . "/../Capa_Controladores/paciente.php");
include(dirname(__FILE__) . "/../Capa_Controladores/persona.php");
include(dirname(__FILE__) . "/../Capa_Controladores/direccion.php");
include(dirname(__FILE__) . "/../Capa_Controladores/comuna.php");
include(dirname(__FILE__) . "/../Capa_Controladores/provincia.php");
include(dirname(__FILE__) . "/../Capa_Controladores/region.php");
include(dirname(__FILE__) . "/../Capa_Controladores/etnia.php");
include(dirname(__FILE__) . "/../Capa_Controladores/prevision.php");


$RUTPaciente = $_SESSION['RUT'];
//son diferentes informaciones la del paciente y la persona, acorde a la BDD
$infoPaciente = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTPaciente'");
$infoPersona = Persona::Seleccionar("WHERE RUN = '$RUTPaciente'");

$infoPaciente = $infoPaciente[0];
$infoPersona = $infoPersona[0];

$prevision = $infoPersona['Prevision_rut'];
$prevision = Prevision::Seleccionar("WHERE rut = '$prevision'");
$prevision = $prevision[0];

$direccion = $infoPersona['Direccion_idDireccion'];
$direccion = Direccion::Seleccionar("WHERE idDireccion = '$direccion'");
$direccion = $direccion[0];

$comuna = $direccion['Comuna_idComuna'];
$comuna = Comuna::Seleccionar("WHERE idComuna = '$comuna'");
$comuna = $comuna[0];

$provincia = $comuna['Provincias_idProvincia'];
$provincia = Provincia::Seleccionar("WHERE idProvincia = '$provincia'");
$provincia = $provincia[0];

$region = $provincia['Regiones_idRegion'];
$region = Region::Seleccionar("WHERE idRegion = '$region'");
$region = $region[0];

$etnia = $infoPaciente['Etnias_idEtnias'];
$etnia = Etnia::Seleccionar("WHERE idEtnias = '$etnia'");
$etnia = $etnia[0];

$idPaciente = $infoPaciente['idPaciente'];


$diagnosticosPaciente = Paciente::R_DiagnosticoPaciente($idPaciente);
$condicionesPaciente = Paciente::R_CondicionPaciente($idPaciente);
$alergiasPaciente = Paciente::R_AlergiaPaciente($idPaciente);

$paciente = array_merge($infoPaciente, $infoPersona, $direccion);

?>
