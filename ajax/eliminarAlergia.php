<?php

/*
 * Descripcion: Elimina una relacion Alergia-Paciente, y devuelve estado.
 * Input (POST):
 * 	int idAlergia
 * Input (SESSION):
 *	int idPaciente
 * Output: int de estado final.
 */

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
