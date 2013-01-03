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
	$provinciaABorrar = new Provincia($_POST['idProvincia']);
	$provinciaABorrar->BorrarPorId();
}

function Actualizar(){
	$datosActualizacion = array(
				array('Nombre',$_POST['nombre_provincia']),
				array('Regiones_idRegion',$_POST['idRegion'])
				);

	$provinciaAActualizar = new Provincia($_POST['idProvincia']);
	$provinciaAActualizar ->Actualizar($datosActualizacion);
}

function SeleccionarTodas(){
	$atributosASeleccionar = array(
					'Nombre', 
					'Regiones_idRegion'
					);
	$where = "";
	Provincia::Seleccionar($atributosASeleccionar,$where);
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD


