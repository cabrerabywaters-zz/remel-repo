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
	$regionABorrar = new Region('2');
	$regionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function Actualizar(){
	$datosActualizacion = array(
				'Nombre' => $_POST['nombre_region'],
				'Numero' => $_POST['numero_region']
				);

	//$regionACrear = new Region($_POST['idRegion']);
	$regionAActualizar = new Region('2');
	var_dump($regionAActualizar);
	$regionAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function SeleccionarTodas(){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Region::Seleccionar($atributosASeleccionar,$where);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD

Eliminacion();
