<?php

require_once 'interfazDatos.php';

class Tratamiento_GES {

    private $_datos;
    private $_id;

    //Instanciacion 

    public function Tratamiento_GES($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, "Tratamiento_GES");
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId("Tratamiento_GES", "idTratamiento_GES", $_id);
        $query = CallQuery($queryString);
    }

    public function Actualizar($datos) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringActualizar($where, $datos, "Tratamiento_GES");
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, "Tratamiento_GES");
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}

?>