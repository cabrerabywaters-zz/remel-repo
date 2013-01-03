<?php 

require_once '../Capa_Datos/alergia.php';

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
				array('Descripcion',$_POST['descripcion_alergia'])
				);
	Alergia::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function Eliminacion(){
	$alergiaABorrar = new Alergia($_POST['id']);
	$alergiaABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function Actualizacion(){
	$datosActualizacion = array(
				'Descripcion' => $_POST['descripcion_alergia']
				);

	//$regionACrear = new Region($_POST['idRegion']);
	$alergiaAActualizar = new Alergia($_POST['id']);
	$alergiaAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function Seleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Descripcion'
					);
	$where = "";
	$resultados = Alergia::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
