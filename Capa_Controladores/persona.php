<?php 

require_once(dirname(__FILE__).'/../Capa_Datos/persona.php');


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
				array('Nombre',$_POST['nombre_Persona']),
				array('Numero',$_POST['numero_Persona'])
				);
	Persona::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function PersonaEliminacion(){
	$PersonaABorrar = new Persona($_POST['id']);
	$PersonaABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function PersonaActualizacion(){
	$datosActualizacion = array(
				'Nombre' => $_POST['nombre_Persona'],
				'Numero' => $_POST['numero_Persona']
				);

	//$PersonaACrear = new Persona($_POST['idPersona']);
	$PersonaAActualizar = new Persona($_POST['id']);
	$PersonaAActualizar->Actualizar($datosActualizacion);
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
					'RUN',
					'Direccion_idDireccion',
					'sexo',
					'n_celular',
					'Fecha_Nac',
					'n_fijo'
					);
	$where = "WHERE RUN = '$run'";
	$resultado = Persona::Seleccionar($atributosASeleccionar, $where);
	return $resultado;
}


//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
