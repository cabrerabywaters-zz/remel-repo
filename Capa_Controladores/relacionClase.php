<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class RelacionClase  {

    static $nombreTabla = "Relacion_Clases";
    static $nombreIdTabla = "Clase_Diagnostico_ConceptID";
    static $nombreIdTabla1 = "Clase_Diagnostico_ConceptID1";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Clase_Diagnostico_ConceptID'];
        $id2 = $_POST['Clase_Diagnostico_ConceptID1'];
        $id = array($id1,$id2);
        $datos = array(
                            array('Descripcion',$_POST['descripcion'])
                                      );
        $queryString = QueryStringCrearRelacion($id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Clase_Diagnostico_ConceptID'];
        $id2 = $_POST['Clase_Diagnostico_ConceptID1'];
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
    	$id1 = $_POST['Clase_Diagnostico_ConceptID'];
        $id2 = $_POST['Clase_Diagnostico_ConceptID1'];
        $id = array($id1,$id2);
        
        $datos = array(                      	
                             array('Descripcion',$_POST['descripcion'])
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

}

?>