<?php

/**
 * Descripcion: Elimina una relacion Condicion-Paciente, y devuelve estado.
 * Input (POST):
 *      int idCondicion
 * Input (SESSION):
 *      int idPaciente
 * Output: int de estado final.
 */

session_start();
include_once('../Capa_Controladores/pacienteHasCondicion.php');
$idCondicion=$_POST['idCondicion'];
$eliminarCondicionesPaciente = PacienteHasCondicion::BorrarPorId($_SESSION['idPaciente'],$idCondicion);

if($eliminarCondicionesPaciente){
echo 0;	
}
else{
echo 1;
}
?>
