<?php

require_once 'interfazDatos.php';

class Alergias {

    private $_datos;
    private $_id;

    public function Alergias($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, "Alergias");
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId("Alergias", "idAlergias", $_id);
        $query = CallQuery($queryString);
    }

    public function Actualizar($datos) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringActualizar($where, $datos, "Alergias");
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, "Alergias");
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}

?>