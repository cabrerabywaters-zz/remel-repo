<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class LugarAtencion {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Lugar_de_Atencion";
        /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "idLugar_de_Atencion";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Nombre',$_POST['nombre_plaza_institucion']),
                                array('Telefono',$_POST['telefono']),
                                array('RUN_Administrador',$_POST['run_administrador']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Sucursales_RUT',$_POST['RUT']),
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
                                        'RUN_Administrador',
                                        'Email_Administrador',
                                        'Telefono',
                                        'Sucursales_RUT'
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
    	$id = $_POST['id_condiciones'];
    	$datosActualizacion = array(
                                array('Nombre',$_POST['nombre_plaza_institucion']),
                                array('Telefono',$_POST['telefono']),
                                array('RUN_Administrador',$_POST['run_administrador']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Sucursales_RUT',$_POST['RUT'])
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca los datos de una red
    //devuelve nombre de sucursales, lugares y red, direccion, correo y telefono
        /*
     * Busca datos de la red segun el id de lugar de atencion
     * @static
     * @access public
     * @param int $idLugar ID del lugar
     * @return array asociativo
     */
    public static function SeleccionarDatosRed($idLugar){
	$nombreTabla = self::$nombreTabla;
	$queryString = "SELECT Lugar_de_Atencion.Nombre as lugarNombre, Sucursales.Nombre as sucursalNombre, RED.Nombre as redNombre,
			Sucursales.Direccion_idDireccion, Sucursales.Email_Administrador as correo, Sucursales.Telefono as telefono
			FROM Lugar_de_Atencion, Sucursales, RED
			WHERE Lugar_de_Atencion.Sucursales_RUT = Sucursales.RUT AND 
			      Sucursales.RED_RUT = RED.RUT AND
			      idLugar_de_Atencion = '$idLugar';";
	$query = CallQuery($queryString);
	return $query->fetch_assoc();
    }
    //busca datos del lugar de atencion segun el rut ingresado
    //devuelve nombre e id
            /*
     * Busca datos de una sucursal segun su rut
     * @static
     * @access public
     * @param int $RUT rut de la sucursal
     * @return array asociativo
     */
    public static function SeleccionarPorRutSucursal($RUT) {
	$nombreTabla = self::$nombreTabla;
	$queryString = "SELECT Nombre, idLugar_de_Atencion FROM $nombreTabla WHERE Sucursales_RUT = '$RUT'";
	
	$result = CallQuery($queryString);
        $resultArray = array();
        while($fila = $result->fetch_assoc()) {
               $resultArray[] = $fila;
        }

        return $resultArray;
    }

}

?>
