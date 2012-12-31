<?php

require_once '../Capa_Datos/R_contraindicacionesCondiciones.php';

function Creacion() {
    $idCreacion = array(
        array('Condiciones_idCondiciones', $_POST['id_Condiciones']),
        array('Medicamentos_idMedicamento', $_POST['id_Medicamento'])
    );
    $atributosCreacion = array(
        array('Descripcion', $_POST['desc'])
    );
    if ($_POST['id_Condiciones'] != '' && $_POST['id_Medicamento']) {
        R_contraindicacionesCondiciones::CrearRelacion($idCreacion,$atributosCreacion);
    }
    
}
function Eliminacion(){
	$relacionABorrar = new R_contraindicacionesCondiciones($_POST['id_Condiciones'],$_POST['id_Medicamento'],$_POST['Descripcion']);
	$relacionABorrar->BorrarPorIdRelacion();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Condiciones_idCondiciones',$_POST['id_Condiciones']),
				array('Medicamentos_idMedicamento',$_POST['id_Medicamento']),
                                array('Descripcion',$_POST['Descripcion'])
				);

	$relacionAActualizar = new R_contraindicacionesCondiciones($_POST['id_Condiciones'],$_POST['id_Medicamentos']);
	$relacionAActualizar->ActualizarRelacion($datosActualizacion);
}
?>
