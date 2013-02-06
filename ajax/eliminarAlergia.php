<?php
session_start();
include_once(dirname(__FILE__).'../../Capa_Controladores/R_alergiaPaciente.php');
$idAlergia=$_POST['idAlergia'];
$eliminarAlergiasPaciente = AlergiaHasPaciente::BorrarPorId($idAlergia,$_SESSION['idPaciente']);
echo $eliminarAlergiasPaciente;
if($eliminarAlergiasPaciente==true){
echo $idAlergia;
}
else{
	echo -1;
}
?>
