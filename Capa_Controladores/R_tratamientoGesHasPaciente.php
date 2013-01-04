<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class TratamientoGesHasPaciente  {

    static $nombreTabla = "Tratamiento_GES_has_Paciente";
    static $nombreIdTabla = "Tratamiento_GES_idTratamiento_GES";
    static $nombreIdTabla1 = "Paciente_idPaciente";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Tratamiento_GES_idTratamiento_GES'];
        $id2 = $_POST['Paciente_idPaciente'];
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
        $id1 = $_POST['Tratamiento_GES_idTratamiento_GES'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1,$id2);
        
        $nombreId = array(self::$nombreIdTabla,self::$nombreIdTabla1);
        
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
        $query = CallQuery($queryString);
    }
    
    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
  
    
    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
   public static function Actualizar() {
    	$id1 = $_POST['Tratamiento_GES_idTratamiento_GES'];
        $id2 = $_POST['Paciente_idPaciente'];
        $id = array($id1,$id2);
        

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

}

?>