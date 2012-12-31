<?php

require_once '../Capa_Datos/R_alergiaPaciente.php';

function Creacion() {
    $datosCreacion = array(
        array('Alergia_idAlergia', $_POST['id_Alergia']),
        array('Paciente_idPaciente', $_POST['id_Paciente'])
    );
    if ($_POST['id_Alergia'] != '' && $_POST['id_Paciente'] != '') {
        R_AlergiaPaciente::CrearRelacion($datosCreacion);
    }
    
}
function Eliminacion(){
	$relacionABorrar = new R_AlergiaPaciente($_POST['id_Alergia'],$_POST['id_Paciente']);
	$relacionABorrar->BorrarPorIdRelacion();
}
?>
