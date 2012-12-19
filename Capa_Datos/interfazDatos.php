<?php

/**
* 
* FUNCIONES DE RETIRADA/ACTUALIZACION/BORRADO/CREACION
* 
* @autor: German Oviedo 
***/


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

function CallQuery($queryString){
		include('dbconfig.php');
		$mysqlCon = new mysqli($servidor,$nombre_usuario,$contrasena,$base_de_datos);

		if($mysqlCon->errno) {
			printf("Conexion fallida: %s\n", $mysqli->connect_error);
			exit();
		}
		
		if($result = $mysqliCon->query($queryString)){
			$mysqlCon->close();
			return $result;
		}     
		else{
			$mysqlCon->close();
			return $false;
		}  
}

