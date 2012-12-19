<?php 

require_once '../Capa_Datos/comuna.php';

/**
* Funciones controladores CRUD
* @author Germán Oviedo
**/
function Creacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_comuna']),
				array('Provincias_idProvincia',$_POST['idProvincia'])
				);
	Region::Agregar($datosCreacion);	
}

function Eliminacion(){
	$regionABorrar = new Comuna($_POST['idComuna']);
	$regionABorrar->BorrarPorId();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['nombre_comuna']),
				array('Provincias_idProvincia',$_POST['idProvincia']
				);

	$regionACrear = new Comuna($_POST['idComuna']);
	$regionAActualizar->($datosActualizacion);
}

function SeleccionarTodas(){
	$atributosASeleccionar = array(
					'Nombre', 
					'Provincias_idProvincia'
					);
	$where = "";
	Region::Seleccionar($atributosASeleccionar,$where);
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD


