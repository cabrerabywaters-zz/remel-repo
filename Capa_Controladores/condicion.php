<?php 

require_once '../Capa_Datos/condicion.php';

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
				array('idCondiciones',$_POST['id_condiciones']),
				array('Nombre',$_POST['nombre'])
				);
	Condicion::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function Eliminacion(){
	$condicionABorrar = new Condicion($_POST['id']);
	$condicionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function Actualizacion(){
	$datosActualizacion = array(
				'idCondiciones' => $_POST['id_condiciones'],
				'Nombre' => $_POST['nombre']
				);

	//$regionACrear = new Region($_POST['idRegion']);
	$condicionAActualizar = new Condicion($_POST['id']);
	$condicionAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function Seleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'idCondiciones',
					'Nombre'
					);
	$where = "";
	$resultados = Condicion::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
