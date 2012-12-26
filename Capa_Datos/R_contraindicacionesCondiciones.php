<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'interfazRelacion.php';
include "CallQuery.php";

class R_contraindicacionesCondiciones {

    static $nombreTabla = 'Contraindicaciones_Condiciones';
    static $nombreTablasRelacionadas = array('Condiciones','Medicamentos');
    static $nombreDeIds = array('Condiciones_idCondiciones', 'Medicamentos_idMedicamento');
    static $nombreAtributos = array('Descripcion');

    private $_id;

    public function R_contraindicacionesCondiciones($idUno, $idDos) {
        $this->_id = array($idUno, $idDos);
    }

    public static function CrearRelacion($id,$datos) {
        $queryString = QueryStringCrearRelacion($id,$datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function BorrarPorIdRelacion() {
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreDeIds, $_id);
        $query = CallQuery($queryString);
    }
    
    public static function ActualizarRelacion($datos){
        $where = "WHERE ";
        for($i=0;$i<count($_id);$i++){
            $where = $where . self::$nombreDeIds[$i] . " = ".$this->_id[$i];
            if($i+1!=count($_id)){
                $where = $where . " AND ";
            }
        }
        $queryString = QueryStringActualizarRelacion($where, $_id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    
    

}

?>
