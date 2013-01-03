<?php 

require_once '../Capa_Datos/direccion.php';

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
				array('Calle',$_POST['calle_direccion']),
				array('Numero',$_POST['numero_direccion']),
                                array('Direccioncol',$_POST['direccioncol_direccion']),
				array('Comuna_idComuna',$_POST['idComuna'])
				);
	Direccion::Agregar($datosCreacion);	
}

/**
* Funcion de eliminacion
**/
function Eliminacion(){
	$direccionABorrar = new Direccion($_POST['idDireccion']);
	$direccionABorrar->BorrarPorId();
}

/**
* Funcion de actualizar
**/
function Actualizacion(){
	$datosActualizacion = array(
				array('Calle',$_POST['calle_direccion']),
				array('Numero',$_POST['numero_direccion']),
                                array('Direccioncol',$_POST['direccioncol_direccion']),
				array('Comuna_idComuna',$_POST['idComuna'])
				);

	//$direccionACrear = new Direccion($_POST['idDireccion']);
	$direccionAActualizar = new Direccion($_POST['idDireccion']);
	$direccionAActualizar->Actualizar($datosActualizacion);
}

/**
* Funcion de seleccionar todas las lineas
* @returns array $resultados Array con las filas
**/
function Seleccion($limit = 0, $offset = 0){
	$atributosASeleccionar = array(
					'Calle',
					'Numero',
                                        'Direccioncol',
                                        'Comuna_idComuna'
					);
	$where = "";
	$resultados = Direccion::Seleccionar($atributosASeleccionar,$where, $limit, $offset);
	return $resultados;
}

//TODO: MUCHAS MAS FUNCIONES, DEPENDIENDO DE LA ENTIDAD
