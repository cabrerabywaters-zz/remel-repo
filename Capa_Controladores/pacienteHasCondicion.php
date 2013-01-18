<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class PacienteHasCondicion  {

    static $nombreTabla = "Paciente_has_Condiciones";
    static $nombreIdTabla = "Paciente_idPaciente";
    static $nombreIdTabla1 = "Condiciones_idCondiciones";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Paciente_idPaciente'];
        $id2 = $_POST['Condiciones_idCondiciones'];
        $id = array($id1,$id2);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Paciente_idPaciente'];
        $id2 = $_POST['Condiciones_idCondiciones'];
        $id = array($id1,$id2);
        
        $nombreId = array(self::$nombreIdTabla,self::$nombreIdTabla1);
        
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
        $query = CallQuery($queryString);
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
        $id = array($id1,$id2);
        

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
    
    public static function BuscarCondicionesPorPacienteId($idPaciente){
        $queryString = 'SELECT Paciente_has_Condiciones.Condiciones_idCondiciones as ID FROM Pacientes, Paciente_has_Condiciones
                                   WHERE ' . $idPaciente . ' = Paciente_has_Condiciones.Paciente_idPaciente
                                   AND ' . $idPaciente . ' = Pacientes.idPaciente';
        $resultado = CallQuery($queryString);
        return $resultado;
    }

}

?>