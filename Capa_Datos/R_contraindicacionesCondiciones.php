<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'interfazRelacion.php';
include "../Capa_Datos/CallQuery.php";

class R_contraindicacionesCondiciones {

    static $nombreTabla = 'Contraindicaciones_Condiciones';
    static $nombreTablasRelacionadas = array('Condiciones','Medicamentos');
    static $nombreDeIds = array('Condiciones_idCondiciones', 'Medicamentos_idMedicamento');
    static $nombreAtrbutos = array('Descripcion');

    private $_id;

    public function R_contraindicacionesCondiciones($idUno, $idDos) {
        $this->_id = array($idUno, $idDos);
    }

    public static function CrearRelacion($id,$datos) {
        $queryString = QueryStringCrearRelacion($id,$datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public function BorrarPorIdRelacion() {
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreDeIds, $_id);
        $query = CallQuery($queryString);
    }
    
    

}

?>
