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
	$omunaABorrar = new Comuna($_POST['idComuna']);
	$ComunaABorrar->BorrarPorId();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['nombre_comuna']),
				array('Provincias_idProvincia',$_POST['idProvincia']
				));

	$comunaACrear = new Comuna($_POST['idComuna']);
	$comunaAActualizar -> ($datosActualizacion);
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


