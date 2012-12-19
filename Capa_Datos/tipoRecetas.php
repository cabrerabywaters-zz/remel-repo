<?php

class Tipos_Recetas {

    private $_datos;
    private $_id;

    //Instanciacion 

    public function Tipos_Recetas($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, "Tipos_Recetas");
        $query = CallQuery($queryString);
    }

    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId("Tipos_Recetas", "idTipos_Recetas", $_id);
        $query = CallQuery($queryString);
    }

    public function Actualizar($datos) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringActualizar($where, $datos, "Tipos_Recetas");
        $query = CallQuery($queryString);
    }

    public function Seleccionar($atributosASeleccionar) {
        // Frase WHERE
        $where = "WHERE ...";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, "Tipos_Recetas");
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}
?>
