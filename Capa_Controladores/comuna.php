<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Comuna {

    static $nombreTabla = "Comunas";
    static $nombreIdTabla = "idComuna";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                           array('Nombre',$_POST['nombre']),
                           array('Provincias_idProvincia',$_POST['id_provincia'])
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
                                        'Provincias_idProvincia'
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
                                array('Nombre',$_POST['nombre']),
                                     );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    public static function BuscarComunaPorNombre($nombre){
        $queryString = 'SELECT idComuna FROM Comuna WHERE Nombre '.$nombre.'';
        $result = CallQuery($queryString);
        if ($result != false){
        return $result;
        }
        else return false;
    }
    
    public static function BuscarComunaLike($nombre,$idRegion){
                $queryString = 'SELECT Comunas.Nombre, Comunas.idComuna
                                
                                FROM Comunas, Provincias, Regiones
                               
                                WHERE Comunas.Nombre LIKE "%'.$nombre.'%"
                                
                                AND Provincias.idProvincia = Comunas.Provincias_idProvincia

                                AND Regiones.idRegion = Provincias.Regiones_idRegion
                                
                                AND Regiones.idRegion = "'.$idRegion.'"
                              
                                ORDER BY Comunas.Nombre 
                                
                                LIMIT 5;
                                
                                ';
                
                $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
   }
    
}

?>