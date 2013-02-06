<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class AlergiaHasPaciente {

    static $nombreTabla = "Alergia_has_Paciente";
    static $nombreIdTabla = "Alergia_idAlergia";
    static $nombreIdTabla1 = "Paciente_idPaciente";

    public static function Insertar() {
        $id1 = $_POST['Alergia_idAlergia'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1, $id2);
        $queryString = QueryStringCrearRelacion($id, null, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function BorrarPorId($id1,$id2) {
        $id = array($id1, $id2);

        $nombreId = array(self::$nombreIdTabla, self::$nombreIdTabla1);

        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
		
        $query = CallQuery($queryString);
    }

    public static function BuscarAlergiasPorPacienteId($idPaciente) {
        $queryString = 'SELECT Alergia_idAlergia as ID
                        FROM Alergia_has_Paciente
                        WHERE Paciente_idPaciente = ' . $idPaciente . '
                        ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }

}

?>
