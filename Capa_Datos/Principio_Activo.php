<?php

require_once 'Conexion.php';

/**
*Clase que representa y realiza todos los metodos de insercion, modificacion, seleccion y eliminacion en la tabla Principio Activo
*@param $_nombrePrincipioActivo
**/

class PrincipioActivo {

	private $_nombrePrincipioActivo;
	
	public function PrincipioActivo($nombrePrincipioActivo){
		$this->_nombrePrincipioActivo = $nombrePrincipioActivo;
	}	
	
	public function AgregarPrincipioActivo(){
		$nombrePrincipioActivo = mysql_real_escape_string($this->_nombrePrincipioActivo);
	
	$query = mysql_query("INSERT INTO Principio_Activo(Nombre) VALUES ('$nombrePrincipioActivo')");

	if($query){
		echo "Principio Activo agregado con exito";
	}
	else{
	die('Error: ' . mysql_error());
}
	}
}
