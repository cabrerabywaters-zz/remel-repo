<?php

/**
* 
* FUNCIONES DE RETIRADA/ACTUALIZACION/BORRADO/CREACION
* 
* @autor: German Oviedo 
***/

include "llamarQuery.php";

/*
 * Funcion que crea el string para la query de Seleccionar
 * Input:
 * 	string $where
 *	array $atributosASeleccionar
 *	string $nombreTabla
 * Output: string de query
 */
function QueryStringSeleccionar($where,$atributosASeleccionar,$nombreTabla){
	$selectString = "SELECT ";
	for($i = 0; $i < count($atributosASeleccionar); $i++){
		$selectString = $selectString.$atributosASeleccionar[$i];
		if ($i != count($atributosASeleccionar) - 1) $selectString = $selectString.",";
	} 
	$selectString = $selectString." FROM $nombreTabla $where";
	return $selectString;
} 

/*
 * Funcion que crea el string para la query de Crear
 * Input
 *	array $datos
 *	string $nombreTabla
 * Output: string de query
 */
function QueryStringAgregar($datos, $nombreTabla){
	$insertString = "INSERT INTO $nombreTabla";

	$atributos = "(";
	$valores = "(";

	for($i = 0; $i < count($datos); $i++){
		$atributos = $atributos.$datos[$i][0];
		$valores = $valores."'".$datos[$i][1]."'";
		if($i != count($datos) - 1){
			$atributos = $atributos.",";
			$valores = $valores.",";
		}
	}

	$atributos = $atributos.")";
	$valores = $valores.")";
	
	$insertString = "$insertString $atributos VALUES $valores";

	return $insertString;
}

/*
 * Funcion que crea el string para la query de Borrar
 * Input
 * 	string $nombreTabla
 *	string $nombreId
 *	int $id
 * Output: string de query
 */

function QueryStringBorrarPorId($nombreTabla,$nombreId,$id){
	$deleteString = "DELETE FROM $nombreTabla WHERE $nombreId = '$id'";
	return $deleteString;
}
/*
 * Funcion que crea el string para la query de Actualizar
 * Input:
 *	string $where
 *	array $datos
 *	string $nombreTabla
 */

function QueryStringActualizar($where, $datos, $nombreTabla){
	$updateString = "UPDATE $nombreTabla SET ";
	$final = count($datos);
	$i = 0;
	foreach ($datos as $atributo=>$valor){
		$updateString = $updateString.$atributo."='".$valor."'";
		if($i < $final - 1) $updateString = $updateString.",";
		$i++;
	}
	$updateString = $updateString." ".$where;
	return $updateString;	
}

?>
