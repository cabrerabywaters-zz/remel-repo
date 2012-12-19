<?php

/*
 * Clase para crear relaciones entre tablas a partir de sus IDs 
 * @ author Leonardo Hidalgo
 */
require_once 'interfazDatos.php';

class R_Equivalente {

    const nombreTablaUno = "Medicamentos";
    const nombreTablaDos = "Medicamentos";
    const nombreDeIds = array('Medicamentos_idMedicamento', 'Medicamentos_idMedicamento1');

    private $_id;

    public function R_Equivalnte ($idUno, $idDos) {
        $this->_id = array($idUno, $idDos);
    }

    public static function CrearRelacion($id) {
        $queryString = QueryStringCrearRelacion($id, nombreTabla);
        $query = CallQueryRelacion($queryString);
    }

    public function BorrarPorIdRelacion() {
        $queryString = QueryStringBorrarPorIdRelacion(nombreTabla, nombreDeIds, $_id);
        $query = CallQueryrelacion($queryString);
    }
    
    

}

?>

