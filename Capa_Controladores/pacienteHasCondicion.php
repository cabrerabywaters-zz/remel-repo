<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class PacienteHasCondicion {

    static $nombreTabla = "Paciente_has_Condiciones";
    static $nombreIdTabla = "Paciente_idPaciente";
    static $nombreIdTabla1 = "Condiciones_idCondiciones";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($idPaciente, $idCondicion) {
        $id[0][0] = 'Paciente_idPaciente';
        $id[0][1] = $idPaciente;
        $id[1][0] = 'Condiciones_idCondiciones';
        $id[1][1] = $idCondicion;
        include_once(dirname(__FILE__) . '/log.php');
        
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
        
        $idMedico = $_SESSION['idMedicoLog'][0]; // id del medico que realizó la insercion
        $run = $_SESSION['RUTPaciente']; // Rut del paciente al que se le modificaron los datos
        $nombreTabla = "Paciente_has_Condiciones";
        $campo = "Condiciones_idCondiciones";
        $valorAnterior = "null";
        $valorNuevo = $idCondicion;
        
        $log = Log::InsertarModificacionDatosPaciente(date('Y-m-d H:i:s'), $campo, $valorAnterior, $valorNuevo, $nombreTabla, $run, $idMedico);
        
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id1, $id2) {

        $id = array($id1, $id2); //entrego los valores que voy a borrar
        
        $nombreId = array(self::$nombreIdTabla, self::$nombreIdTabla1); //los nombres de los campos

        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id); // query que borra 
	//echo $queryString;
        $query = CallQuery($queryString);
        
        include_once(dirname(__FILE__) . '/log.php');
        
        $idMedico = $_SESSION['idMedicoLog'][0]; // id del medico que realizó la insercion
        $run = $_SESSION['RUTPaciente']; // Rut del paciente al que se le modificaron los datos
        $nombreTabla = "Paciente_has_Condiciones";
        $campo = "Condiciones_idCondiciones";
        $valorAnterior = $id2;
        $valorNuevo = 'null';
        
        $log = Log::InsertarModificacionDatosPaciente(date('Y-m-d H:i:s'), $campo, $valorAnterior, $valorNuevo, $nombreTabla, $run, $idMedico);
        if(!$log){return false;}
    }

    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    public static function Actualizar() {
        $id1 = $_POST['Paciente_idPaciente'];
        $id2 = $_POST['Condiciones_idCondiciones'];
        $id = array($id1, $id2);


        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca las condiciones de un paciente
    //devuelve sus id
    public static function BuscarCondicionesPorPacienteId($idPaciente) {
        $queryString = 'SELECT Paciente_has_Condiciones.Condiciones_idCondiciones as ID FROM Pacientes, Paciente_has_Condiciones
                                   WHERE ' . $idPaciente . ' = Paciente_has_Condiciones.Paciente_idPaciente
                                   AND ' . $idPaciente . ' = Pacientes.idPaciente';
        $resultado = CallQuery($queryString);
        return $resultado;
    }

}

?>