<?php
session_start();
include_once('../Capa_Controladores/R_condicionesPaciente.php');
$idCondicion=$_POST['idCondicion'];
$eliminarCondicionesPaciente = PacienteHasCondicion::BorrarPorId($idCondicion,$_SESSION['idPaciente']);

if($eliminarCondicionesPaciente)
{
echo $idCondicion;	
}
else
{
	echo -1;
}
?>
