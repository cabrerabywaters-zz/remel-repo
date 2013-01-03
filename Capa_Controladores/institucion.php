<?php

include_once('../Capa_Datos/generadorStringQuery.php');

class Institucion{

static $nombreTabla = "Instituciones";

public static function BuscarNombreArrayRUT($arrayRUT){
	$instituciones = array();

	$where = "WHERE RUT IN (".implode(",",$arrayRUT).")";

        $queryString = "SELECT RUT, Nombre FROM ".self::$nombreTabla." ".$where;
	$resultado = callQuery($queryString);

	while($row = $resultado->fetch_assoc()){
		$instituciones[] = $row;
	}

	return $instituciones;
}

}
