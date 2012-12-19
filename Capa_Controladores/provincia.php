<?php 

require_once '../Capa_Datos/provincia.php';

/**
* Funciones controladores CRUD
* @author Germán Oviedo
**/
function Creacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_provincia']),
				array('Regiones_idRegion',$_POST['idRegion'])
				);
	Region::Agregar($datosCreacion);	
}

function Eliminacion(){
	$regionABorrar = new Provincia($_POST['idProvincia']);
	$regionABorrar->BorrarPorId();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Regiones_idRegion',$_POST['idRegion']);
				);

	$regionACrear = new Provincia($_POST['idProvincia']);
	$regionAActualizar->($datosActualizacion);
}

function SeleccionarTodas(){
	$atributosASeleccionar = array(
					'Nombre', 
					'Regiones_idRegion'
					);
	$where = "";
	Region::Seleccionar($atributosASeleccionar,$where);
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD


