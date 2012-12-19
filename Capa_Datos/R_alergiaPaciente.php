<?php

/*
 * Clase para crear relaciones entre tablas a partir de sus IDs 
 * @ author José-Fco. González
 */
require_once 'interfazDatos.php';

class R_AlergiaPaciente {

    const nombreTablaUno = "Alergias";
    const nombreTablaDos = "Pacientes";
    const nombreDeIds = array('Alergia_idAlergia', 'Paciente_idPaciente');

    private $_id;

    public function R_AlergiaPaciente($idUno, $idDos) {
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
