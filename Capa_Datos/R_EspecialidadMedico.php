<?php

/*
 * Clase para crear relaciones entre tablas a partir de sus IDs 
 * @ author Leonardo Hidalgo
 */
require_once 'interfazDatos.php';

class R_EspecialidadMedico {

    const nombreTablaUno = "Especialidades";
    const nombreTablaDos = "Medicos";
    const nombreDeIds = array('Especialidad_idEspecialidad', 'Medicos_idMedico');

    private $_id;

    public function R_EspecialidaeMedico ($idUno, $idDos) {
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
