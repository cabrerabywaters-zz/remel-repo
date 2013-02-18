<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class AlergiaHasPaciente {

    static $nombreTabla = "Alergia_has_Paciente";
    static $nombreIdTabla = "Alergia_idAlergia";
    static $nombreIdTabla1 = "Paciente_idPaciente";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada y guarda en el log quién lo hizo
     * 
     */
    public static function Insertar($idAlergia, $idPaciente) {
        $id[0][0] = 'Paciente_idPaciente';
        $id[0][1] = $idPaciente;
        $id[1][0] = 'Alergia_idAlergia';
        $id[1][1] = $idAlergia;
        
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
        
        include_once(dirname(__FILE__) . '/log.php');
        $idMedico = $_SESSION['idMedicoLog'][0]; // id del medico que realizó la insercion
        $run = $_SESSION['RUTPaciente']; // Rut del paciente al que se le modificaron los datos
        $nombreTabla = "Alergia_has_Paciente";
        $campo = "Alergia_idAlergia";
        $valorAnterior = "null";
        $valorNuevo = $idAlergia;
        
        $log = Log::InsertarModificacionDatosPaciente(date('Y-m-d H:i:s'), $campo, $valorAnterior, $valorNuevo, $nombreTabla, $run, $idMedico);
        if(!$log){return false;}
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['idAlergia'];
        $id2 = $_SESSION['idPaciente'];
        $id = array($id1, $id2);

        $nombreId = array(self::$nombreIdTabla, self::$nombreIdTabla1);

        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
        $query = CallQuery($queryString);
    
        include_once(dirname(__FILE__) . '/log.php');
        $idMedico = $_SESSION['idMedicoLog'][0]; // id del medico que realizó la insercion
        $run = $_SESSION['RUTPaciente']; // Rut del paciente al que se le modificaron los datos
        $nombreTabla = "Alergia_has_Paciente";
        $campo = "Alergia_idAlergia";
        $valorAnterior = $id1;
        $valorNuevo = "null";
        
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
        $id1 = $_POST['Alergia_idAlergia'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1, $id2);


        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca las alergias de un paciente
    //devuelve los ids de alergia
    public static function BuscarAlergiasPorPacienteId($idPaciente) {
        $queryString = 'SELECT Alergia_has_Paciente.Alergia_idAlergia as ID FROM Pacientes, Alergia_has_Paciente 
                                WHERE ' . "$idPaciente" . ' = Alergia_has_Paciente.Paciente_idPaciente
                                AND ' . "$idPaciente" . ' = Pacientes.idPaciente';
        $resultado = CallQuery($queryString);
        return $resultado;
    }

}

?>