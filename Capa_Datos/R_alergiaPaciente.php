<?php

/*
 * Clase para crear relaciones entre tablas a partir de sus IDs 
 * @ author José-Fco. González
 */
require_once 'interfazRelacion.php';

class R_AlergiaPaciente {

    static $nombreTabla = 'Alergia_has_Paciente';
    static $nombreTablasRelacionadas = array('Alergias','Pacientes');
    static $nombreDeIds = array('Alergia_idAlergia', 'Paciente_idPaciente');

    private $_id;

    public function R_AlergiaPaciente($idUno, $idDos) {
        $this->_id = array($idUno, $idDos);
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
