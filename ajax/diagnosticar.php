<?php

include_once(dirname(__FILE__).'/../Capa_Controladores/consulta.php');


$idMedico = $_SESSION['idMedico'];
$idPaciente = $_SESSION['idPaciente'];
$idPrestadorSalud;
$idPlaza;

$fecha = date('d-m-Y');
$hora = time();

$consulta = new Consulta();
$consulta->InsertarAlternativo($fecha, $hora, $idMedico, $idPaciente, $idPrestadorSalud, $idPlaza);


?>
