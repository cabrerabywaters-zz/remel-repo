<?php

require_once 'interfazDatos.php';

/**
 * Clase que representa y realiza todos los metodos de insercion, modificacion, seleccion y eliminacion en la tabla Principio Activo
 * @property string $_nombrePrincipioActivo
 * */
class PrincipioActivo {

    const nombreTabla = "Princio_Activo";
    const nombreIdTabla = "idPrincio_Activo";

    private $_datos;
    private $_id;

    //Instanciacion 

    public function principioActivo($id) {

        $this->_id = $id;
    }

    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * */
    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId(nombreTabla, nombreIdTabla, $_id);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * @param array $datos Vienen del controlador
     * */
    public function Actualizar($datos) {
        $where = "WHERE " . nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datos, nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * @param array $atributosASeleccionar Vienen del controlador
     * @param array $where Frase Where que es indicada por el controlador
     * */
    public function Seleccionar($atributosASeleccionar, $where) {
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, nombreTabla);
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }

}
