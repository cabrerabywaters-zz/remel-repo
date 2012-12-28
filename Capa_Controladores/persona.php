<?php 

require_once(dirname(__FILE__).'/../Capa_Datos/persona.php');
require_once '/../Capa_Datos/persona.php';


/**
* Funciones controladores CRUD
* 
* @author Germán Oviedo
**/

/**
* Funcion de creacion 
**/
function PersonaCreacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])
				);
	Region::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function PersonaEliminacion(){
	$regionABorrar = new Region($_POST['id']);
	$regionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function PersonaActualizacion(){
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
function PersonaSeleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Persona::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

function PersonaSeleccionNombrePorRUN($run){
	$atributosASeleccionar = array(
					'Nombre',
					'Apellido_Paterno',
					'Apellido_Materno',
					'RUN'
					);
	$where = "WHERE RUN = '$run'";
	$resultado = Persona::Seleccionar($atributosASeleccionar, $where);
	return $resultado;
}


//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
