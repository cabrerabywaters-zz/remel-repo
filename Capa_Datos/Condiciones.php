<?php

require_once 'interfazDatos.php';

class Condiciones {

    private $_datos;
    private $_id;

    //Instanciacion 

    public function Condiciones($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, "Condiciones");
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId("Condiciones", "idCondiciones", $_id);
        $query = CallQuery($queryString);
    }

    public function Actualizar($datos) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringActualizar($where, $datos, "Condiciones");
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, "Condiciones");
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}

?>