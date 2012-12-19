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
    if ($_POST['id_Condiciones'] != '') {
        R_contraindicacionesCondiciones::CrearRelacion($idCreacion,$atributosCreacion);
    }
    
}
function Eliminacion(){
	$relacionABorrar = new R_AlergiaPaciente($_POST['id_Condiciones'],$_POST['id_Medicamento']);
	$relacionABorrar->BorrarPorIdRelacion();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['id_Alergia']),
				array('Numero',$_POST['numero_region'])
				);

	$regionACrear = new Region($_POST['idRegion']);
	$regionAActualizar->Actualizar($datosActualizacion);
}
?>
