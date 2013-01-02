<?php

/*
 * Clase para crear relaciones entre tablas a partir de sus IDs 
 * @ author José-Fco. González
 */
require_once 'interfazRelacion.php';

class R_CondicionesPaciente {

    static $nombreTabla = 'Paciente_has_Condiciones';
    static $nombreTablasRelacionadas = array('Condiciones','Pacientes');
    static $nombreDeIds = array('Paciente_Personas_RUN', 'Paciente_idPaciente','Condiciones_idCondiciones');

    private $_id;

    public function R_CondicionesPaciente($idUno, $idDos, $idTres) {
        $this->_id = array($idUno, $idDos, $idTres);
    }

    public static function CrearRelacion($id) {
        $queryString = QueryStringCrearRelacion($id, self::$nombreTabla);
        $query = CallQueryRelacion($queryString);
    }

    public function BorrarPorIdRelacion() {
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreDeIds, $_id);
        $query = CallQueryRelacion($queryString);
    }
    
    

}

?>
