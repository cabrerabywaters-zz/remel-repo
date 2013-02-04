<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Direccion {

    static $nombreTabla = "Direcciones";
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
    
    public static function InsertarConDatos($calle, $nCalle, $Comuna) {
    	$datosCreacion = array(
                           array('Calle',$calle),
				array('Numero',$nCalle),
				array('Comuna_idComuna',$Comuna)       );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    public static function BuscarIdDireccion($calle, $nCalle, $Comuna){
        $queryString = 'SELECT idDireccion FROM Direcciones WHERE Calle = "'.$calle.'" AND Numero = "'.$nCalle.'" AND Comuna_idComuna = "'.$Comuna.'"';
        $result = CallQuery($queryString);
        if($result) return $result->fetch_assoc();
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
