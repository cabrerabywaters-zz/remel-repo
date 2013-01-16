<?php

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Sucursal{

static $nombreTabla = "Sucursales";
static $nombreIdTabla = "RUT";

 public static function Insertar() {
    	$datosCreacion = array(
                                array('Nombre',$_POST['nombre']),
                                array('Direccion_idDireccion',$_POST['idDireccion']),
                                array('RUN_Administrador',$_POST['run_administrador']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Telefono',$_POST['medicamentocol']),
                                array('Tipo_Sucursales_idTipo_Sucursal',$_POST['idTipo_Sucursal']),
                                array('Fecha_creacion_REMEL','NOW()'),
                                array('RED_RUT',$_POST['RUT'])
                                );
        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    
      /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }
    
    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
					'Nombre',
                                        'Direccion_idDireccion',
                                        'RUN_Administrador',
                                        'Email_Administrador',
                                        'Telefono',
                                        'Tipo_Sucursales_idTipo_Sucursal',
                                        'Fecha_creacion_REMEL',
                                        'RED_RUT',
      );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

	    if($limit != 0){
	       $queryString = $queryString." LIMIT $limit";
	    }
	    if($offset != 0){
		  $queryString = $queryString." OFFSET $offset ";
	    }

        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
    }
    
    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    public static function Actualizar() {
    	$id = $_POST['RUT'];
    	$datosActualizacion = array(
                               array('Nombre',$_POST['nombre']),
                                array('RUN_Administrador',$_POST['run_administrador']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Telefono',$_POST['medicamentocol']),
                                array('Tipo_Sucursales_idTipo_Sucursal',$_POST['idTipo_Sucursal']),
                                array('Fecha_creacion_REMEL','NOW()')
                                );
        
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    
public static function SucursalesPorDoctorRUT($doctorRUT){
	$atributosASeleccionar = array(
                                        'Nombre',
                                        'Fecha_creacion_REMEL',
      );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

        $result = CallQuery($queryString);
            $resultArray = array();
            while($fila = $result->fetch_assoc()) {
               $resultArray[] = $fila;
            }

	return $resultArray;
}
   
public static function BuscarNombreArrayRUT($arrayRUT){
	$sucursales = array();

	$where = "WHERE RUT IN (".implode(",",$arrayRUT).")";

        $queryString = "SELECT RUT, Nombre FROM ".self::$nombreTabla." ".$where;
	$resultado = callQuery($queryString);

	while($row = $resultado->fetch_assoc()){
		$sucursales[] = $row;
	}

	return $sucursales;
}

}

?>
