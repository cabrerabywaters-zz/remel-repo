<?php

/**
 * Descripcion: Elimina una relacion Alergia-Paciente, y devuelve estado.
 * Input (POST):
 * 	int idAlergia
 * Input (SESSION):
 *	int idPaciente
 * Output: int de estado final.
 * @package ajaxController
 */

include_once(dirname(__FILE__).'../../Capa_Controladores/alergiaHasPaciente.php');

session_start();
eliminarAlergiaPaciente($_POST['idAlergia'],$_SESSION['idPaciente']);

/**
 * Elimina una relacion Alergia-Paciente, y devuelve estado.
 *
 * @param int $idAlergia Identificador alergia a eliminar
 * @param int $idPaciente Identificador paciente al que se le modificara sus alergias
 * @return int Estado final
 */
function eliminarAlergiaPaciente($idAlergia, $idPaciente){
	$eliminarAlergiasPaciente = AlergiaHasPaciente::BorrarPorId($idAlergia,$idPaciente);
	if($eliminarAlergiasPaciente==true){
		echo -1;
	}
	else{
		echo $idAlergia;
	}
}

?>
