<?php

class Princio_Activo {

    private $_datos;
    private $_id;

    //Instanciacion 

    public function Condiciones($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, "Princio_Activo");
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId("Princio_Activo", "idPrincio_Activo", $_id);
        $query = CallQuery($queryString);
    }

    public function Actualizar($datos) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringActualizar($where, $datos, "Princio_Activo");
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, "Princio_Activo");
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}
?>