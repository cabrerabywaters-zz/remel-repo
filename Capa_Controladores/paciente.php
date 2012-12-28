<?php 

require_once(dirname(__FILE__).'/../Capa_Datos/paciente.php');

/**
* Funciones controladores CRUD
* 
* @author Germán Oviedo
**/

/**
* Funcion de creacion 
**/
function PacienteCreacion(){
	$datosCreacion = array(
				array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])
				);
	Region::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function PacienteEliminacion(){
	$regionABorrar = new Region($_POST['id']);
	$regionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function PacienteActualizacion(){
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
function PacienteSeleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Paciente::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

function PacienteSeleccionIdPorRUN($run){
	$atributosASeleccionar = array(
					'idPaciente',
					);
	$where = "WHERE Personas_RUN = '$run'";
	$resultado = Paciente::Seleccionar($atributosASeleccionar, $where);
	return $resultado;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD