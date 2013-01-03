<?php 

require_once '../Capa_Datos/tratamientoGES.php';

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
				);

	//$regionACrear = new Region($_POST['idRegion']);
	$regionAActualizar = new Region($_POST['id']);
	$regionAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function Seleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Region::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD

