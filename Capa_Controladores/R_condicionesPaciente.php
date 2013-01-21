<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class PacienteHasCondicion {

    static $nombreTabla = "Paciente_has_Condiciones";
    static $nombreIdTabla = "Condiciones_idCondiciones";
    static $nombreIdTabla1 = "Paciente_idPaciente";

    public static function Insertar() {
        $id1 = $_POST['Condiciones_idCondiciones'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1, $id2);
        $queryString = QueryStringCrearRelacion($id, null, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function BorrarPorId() {
        $id1 = $_POST['Condiciones_idCondiciones'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1, $id2);

        $nombreId = array(self::$nombreIdTabla, self::$nombreIdTabla1);

        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
        $query = CallQuery($queryString);
    }

    public static function BuscarCondicionesPorPacienteId($idPaciente) {
        $queryString = 'SELECT Condiciones_idCondiciones
                        FROM Paciente_has_Condiciones
                        WHERE Paciente_idPaciente = ' . $idPaciente . '
                        ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }

}
?>