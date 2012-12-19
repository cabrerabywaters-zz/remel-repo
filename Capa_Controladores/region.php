<?php 

require_once '../Capa_Datos/region.php';

/**
* Funciones controladores CRUD
* @author Germán Oviedo
**/
function Creacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])
				);
	Region::Agregar($datosCreacion);	
}

function Eliminacion(){
	$regionABorrar = new Region($_POST['idRegion']);
	$regionABorrar->BorrarPorId();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])
				);

	$regionACrear = new Region($_POST['idRegion']);
	$regionAActualizar->Actualizar($datosActualizacion);
}

function SeleccionarTodas(){
	$atributosASeleccionar = array(
					'Nombre', 
					'Numero'
					);
	$where = "";
	Region::Seleccionar($atributosASeleccionar,$where);
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD

Creacion();
