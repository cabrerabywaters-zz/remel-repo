<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Region {

    static $nombreTabla = "Regiones";
    static $nombreIdTabla = "idRegion";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                            array('Nombre',$_POST['nombre_region']),
                            array('Numero',$_POST['numero_region'])
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
                                        'idRegion',
                                        'Nombre',
                                        'Numero'
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
    	$id = $_POST['id_region'];
    	$datosActualizacion = array(
                                array('Nombre',$_POST['nombre_region']),
				array('Numero',$_POST['numero_region'])    );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
    
   public static function BuscarRegionPorNombre($Nombre) {
        
        $queryString = 'SELECT idRegion FROM Regiones WHERE Nombre = "'.$Nombre.'"';
        $result = CallQuery($queryString);
   if ($result != false){
        return $result;
        }
        else return false;
   }
   
   public static function BuscarRegionPorID($idRegion) {
           
           $queryString = 'SELECT Nombre FROM Regiones WHERE idRegion = "'.$idRegion.'"';
            
                 $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
   }

   public static function BuscarRegionPorIDComuna($idComuna){
       
       $queryString = 'SELECT Regiones.Nombre, Regiones.idRegion
                        FROM Comunas, Provincias, Regiones
                        WHERE Regiones.idRegion = Provincias.Regiones_idRegion
                        AND Provincias.idProvincia = Comunas.Provincias_idProvincia
                        AND Comunas.idComuna = "'.$idComuna.'" ';
       $query = Callquery($queryString);
      $resultArray = array();
       while($fila = $query->fetch_asocc()){
          $resultArray[] = $fila;
       }
       return $resultArray;
   }
   
   
   
   
   
}


?>