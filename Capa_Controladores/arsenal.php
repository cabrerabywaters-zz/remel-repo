<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class Arsenal  {

    static $nombreTabla = "Alergia_has_Paciente";
    static $nombreIdTabla = "Expendedores_idExpendedores";
    static $nombreIdTabla1 = "Expendedores_Sucursales_RUT";
    static $nombreIdTabla2 = "Medicamentos_idMedicamento";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($id1, $id2, $id3) {
        $id = array($id1,$id2,$id3);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id1, $id2, $id3) {
        $id = array($id1,$id2,$id3);
        
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
       
    	$id1 = $_POST['Expendedores_idExpendedores'];
        $id2 = $_POST['Expendedores_Sucursales_RUT'];
        $id3 = $_POST['Medicamentos_idMedicamento'];

        $id = array($id1,$id2,$id3);
        
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, null, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

}

?>