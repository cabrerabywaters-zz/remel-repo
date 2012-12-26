<?php 

require_once '../Capa_Datos/region.php';

/**
* Funciones controladores CRUD
* 
* @author Germán Oviedo
**/

/**
* Funcion de creacion 
**/
function Creacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])
				);
	Region::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function Eliminacion(){
	$regionABorrar = new Region($_POST['id']);
	$regionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function Actualizacion(){
	$datosActualizacion = array(
				'Nombre' => $_POST['nombre_region'],
				'Numero' => $_POST['numero_region']
w				);

	//$regionACrear = new Region($_POST['idRegion']);
	$regionAActualizar = new Region($_POST['id']);
	var_dump($regionAActualizar);
	$regionAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function Seleccion(){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Region::Seleccionar($atributosASeleccionar,$where);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
