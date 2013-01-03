<?php

    public function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar, $where, $limit = 0, $offset = 0) {
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

    public function Actualizar($datos) {
        $where = "WHERE " . nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

?>