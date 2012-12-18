<?php

/**
* 
* FUNCIONES DE RETIRADA/ACTUALIZACION/BORRADO/CREACION
* 
* @autor: German Oviedo 
***/

require_once 'Conexion.php';

/**
* Funcion que crea el string para la query de Seleccionar
**/
function QueryStringSeleccionar($where,$atributosASeleccionar,$nombreTabla){
	$selectString = "SELECT";
	foreach($atributosASeleccionar as $nombreAtributo){
		$selectString = $selectString." ".$nombreAtributo;
	} 
	$selectString = selectString." FROM $nombreTabla $where";
	return $selectString;
} 

/**
* Funcion que crea el string para la query de Crear
**/
function QueryStringCrear($datos, $nombreTabla){
	$insertString = "INSERT INTO $nombreTabla (";
	for($i = 0; $i < count($datos); $i++){
		$insertString = $insertString.$datos[$i][0];
		if($i != count($datos) - 1) $insertString = $insertString.",";
	}
	$insertString = $insertString.") VALUES (";
	for($i = 0; $i < count($datos); $i++){
                $insertString = $insertString.$datos[$i][1];
		if($i != count($datos) - 1) $insertString = $insertString.",";
        }
	return $insertString.")";
}

/**
* Funcion que crea el string para la query de Borrar
**/

function QueryStringBorrarPorId($nombreTabla,$nombreId,$id){
	$deleteString = "DELETE FROM $nombreTabla WHERE $nombreId = '$id'";
	return $deleteString;
}
/**
* Funcion que crea el string para la query de Actualizar
**/

function QueryStringActualizar($where, $datos, $nombreTabla){
	$updateString = "UPDATE $nombreTabla SET ";
	foreach ($datos as $atributo=>$valor){
		$updateString = $updateString.$atributo."='".$valor."' ";
	}
	$updateString = $updateString.$where;
	return $updateString;	
}

function CallQuery($queryString, $nombreTabla){
		$con = new ConexionDB();
       		$con->ConexionDB();
	
		$query = mysql_query($queryString);
                if($query){
                        echo "Principio Activo agregado con exito";
                }
                else{
                        die('Error: ' . mysql_error());
                }

		$con->desconectar();
		return $query;
}
