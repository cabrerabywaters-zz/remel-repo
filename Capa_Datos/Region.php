<?php



/**
 * La clase personas realiza todas las llamadas a la base de datos requeridas para agregar, leer, modificar y eliminar
 * registros de personas.
 *
 * @author Ignacio Cabrera
 */
require_once 'interfazDatos.php';

class Region {
    // Se declaran las variables que se utilizarán, nombre y número de región
    private $_datos;
    private $_id;
    
    /**
    * Instanciacion
    **/
    public function Region($id){
       	// Se apuntan las variables a los constructores de la clase
    	$this->_id=$id;
    }
      
    /**
    * Metodo para agregar funciones a la tabla
    * @param array $datos Vienen del controlador
    **/      
    public static function Agregar($datos){
    	$queryString = QueryStringAgregar($datos,"Regiones");
    	$query = CallQuery($queryString);
    }

    /**
    * Metodo para agregar funciones a la tabla
    **/
    public function BorrarPorId(){
	$queryString = QueryStringBorrarPorId("Regiones","idRegion",$_id);
	$query = CallQuery($queryString);
    }        
    
    /**
    * Metodo para agregar funciones a la tabla
    * @param array $datos Vienen del controlador
    **/
    public function Actualizar($datos){
	// Frase WHERE
	$where = "WHERE ...";
	$queryString = QueryStringActualizar($where,$datos,"Regiones");
	$query = CallQuery($queryString);
    }
    
    /**
    * Metodo para agregar funciones a la tabla
    * @param array $atributosASeleccionar Vienen del controlador
    **/
    public function Seleccionar($atributosASeleccionar){
        // Frase WHERE
	$where = "WHERE ...";
	$queryString = QueryStringSeleccionar($where,$atributosASeleccionar,"Regiones");
	$query = CallQuery($queryString);
	//TODO: Falta el proceso de llenado de populado del objeto
    }
}


?>
