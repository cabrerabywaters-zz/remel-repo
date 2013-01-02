<?php 

require_once(dirname(__FILE__).'/../Capa_Datos/medico.php');


/**
* Funciones controladores CRUD
* 
* @author Germán Oviedo
**/

/**
* Funcion de creacion 
**/
function MedicoCreacion(){
	$datosCreacion = array(
				array('Medicocol',$_POST['medico_col']),
                                array('Direccion_Consulta',$_POST['idDireccion']),
                                array('Correo_Medico',$_POST['correo_medico']),
                                array('Codigo_Registro_SS',$_POST['cogido_registro_ss']),
                                array('Codigo_Registro_CM',$_POST['codigo_registro_cm']),
                                array('Medicocol1',$_POST['medicocol1']),
                                array('Fecha_ultima_edicion',NOW()),
				);
	Medico::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function MedicoEliminacion(){
	$medicoABorrar = new Medico($_POST['id']);
	$medicoABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function MedicoActualizacion(){
	$datosActualizacion = array(
				array('Medicocol',$_POST['medico_col']),
                                array('Direccion_Consulta',$_POST['idDireccion']),
                                array('Correo_Medico',$_POST['correo_medico']),
                                array('Codigo_Registro_SS',$_POST['cogido_registro_ss']),
                                array('Codigo_Registro_CM',$_POST['codigo_registro_cm']),
                                array('Medicocol1',$_POST['medicocol1']),
                                array('Fecha_ultima_edicion',NOW())
				);

	//$medicoACrear = new Medico($_POST['id']);
	$medicoAActualizar = new Medico($_POST['id']);
	$medicoAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function MedicoSeleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Nombre',
					'Numero'
					);
	$where = "";
	$resultados = Medico::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

function MedicoSeleccionNombrePorRUN($run){
	$atributosASeleccionar = array(
					'Nombre',
					'Apellido_Paterno',
					'RUN'
					);
	$where = "WHERE RUN = '$run'";
	$resultado = Medico::Seleccionar($atributosASeleccionar, $where);
	return $resultado;
}


//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
