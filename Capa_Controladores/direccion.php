<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Direccion {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Direcciones";
    /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "idDireccion";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                           array('Calle',$_POST['calle_direccion']),
				array('Numero',$_POST['numero_direccion']),
				array('Comuna_idComuna',$_POST['idComuna'])       );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //insert alternativo de datos
    /*
     * Inserta una direccion nueva con sus parametros
     * @static
     * @access public
     * @param string $calle nombre de la calle
     * @param int $nCalle numero de calle
     * @param int $idComuna ID de la comuna
     * @return nothing
     */
    public static function InsertarConDatos($calle, $nCalle, $Comuna) {
    	/*$datosCreacion = array(
                           array('Calle',$calle),
				array('Numero',$nCalle),
				array('Comuna_idComuna',$Comuna)       );*/

        //$queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $queryString = 'INSERT INTO Direcciones (Calle, Numero, Comuna_idComuna) 
                        VALUES ("'.$calle.'","'.$nCalle.'","'.$Comuna.'")';
        $query = CallQuery($queryString);
    }
    //busca la id de una direccion existente segun sus atributos (los atributos son irrepetibles)
    //devuelve el id en un arreglo asociativo
    /*
     * Busca el ID de direccion segun parametros
     * @static
     * @access public
     * @param string $calle nombre de la calle
     * @param int $nCalle numero de calle
     * @param int $Comuna ID de la comuna
     * @return array asociativo
     */
    public static function BuscarIdDireccion($calle, $nCalle, $Comuna){
        $queryString = 'SELECT idDireccion FROM Direcciones WHERE Calle = "'.$calle.'" AND Numero = "'.$nCalle.'" AND Comuna_idComuna = "'.$Comuna.'"';
        $result = CallQuery($queryString);
        if($result){ return $result->fetch_assoc();}
        else{return false;}        
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
                                        'Calle',
                                        'Numero',
                                        'Comuna_idComuna'
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
                               array('Calle',$_POST['calle_direccion']),
				array('Numero',$_POST['numero_direccion']),
                                array('Direccioncol',$_POST['direccioncol_direccion']),
				    );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca los datos de direccion segun id
    //devuelve calle, numero y nombre de comuna en un arreglo asociativo
    /*
     * Busca datos de la direccion segun su ID
     * @static
     * @access public
     * @param int $idDireccion ID de la direccion
     * @return array asociativo
     */
    public static function SeleccionarStringDireccion($idDireccion) {
	$queryString = "SELECT Direcciones.Calle as Calle, Direcciones.Numero as Numero, Comunas.Nombre as Comuna
			FROM Direcciones, Comunas
			WHERE Comuna_idComuna = Comunas.idComuna AND
				idDireccion = '$idDireccion';";
	$query = CallQuery($queryString);
	$res = $query->fetch_assoc();
	return $res['Calle']." ".$res['Numero'].", ".$res['Comuna'];
    } 
}

?>
