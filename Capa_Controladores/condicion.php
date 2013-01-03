<?php 

include('../Capa_Datos/callQuery.php');

class Condicion {

    static $nombreTabla = "Condiciones";
    static $nombreIdTabla = "idCondiciones";

    public static function Insertar($datosCreacion) {
    	$datosCreacion = array(
							array('Nombre',$_POST['nombre'])
						);

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    private static function BorrarPorId($id) {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    private static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
									'idCondiciones',
									'Nombre'
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

    private function Actualizar() {
    	$id = $_POST['id_condiciones'];
    	$datosActualizacion = array(
				'Nombre' => $_POST['nombre']
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }


}

?>