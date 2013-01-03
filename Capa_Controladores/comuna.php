<?php 

include('../Capa_Datos/llamarQuery.php');
include('../Capa_Datos/generadorStringQuery.php');

class Comuna {

    static $nombreTabla = "Comunas";
    static $nombreIdTabla = "idComuna";    

     /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($datosCreacion) {
    	$datosCreacion = array(
                               array('Nombre',$_POST['nombre']),
                               array('Provincia_idProvincia',$_POST['id_provincia'])
                               );
        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
 /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    private static function BorrarPorId($id) {
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
    private static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
					'Nombre',
					'Provincia_idProvincia'
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
    private function Actualizar() {
    	$id = $_POST['id_provincia'];
    	$datosActualizacion = array(
                                    'Nombre' => $_POST['nombre'],
                                    'Provincia_idProvincia' => $_POST['id_provincia']
                                    );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>