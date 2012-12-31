<?php

require_once '../Capa_Datos/R_condicionesPaciente.php';

function Creacion() {
    $datosCreacion = array(
        array('Paciente_idPaciente', $_POST['id_Paciente']),
        array('Paciente_Personas_RUN', $_POST['run']),
        array('Condiciones_idCondiciones', $_POST['id_Condicion'])
    );
    if ($_POST['id_Paciente'] != '' && $_POST['run'] != '' && $_POST['id_Condicion']) {
        R_CondicionesPaciente::CrearRelacion($datosCreacion);
    }
    
}
function Eliminacion(){
	$relacionABorrar = new R_CondicionesPaciente($_POST['id_Paciente'],$_POST['run'],$_POST['id_Condicion']);
	$relacionABorrar->BorrarPorIdRelacion();
}
?>