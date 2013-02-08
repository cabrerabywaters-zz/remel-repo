<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class EspecialidadHasMedico  {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Especialidades_has_Medicos";
        /**
     * Nombre del id de especialidad
     * @static  
     * @var string
     */
    static $nombreIdTabla = "Especialidad_idEspecialidad";
        /**
     * Nombre del id de RUN del medico
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Medico_RUN";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Especialidad_idEspecialidad'];
        $id2 = $_POST['Medico_RUN'];
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
        $id1 = $_POST['Especialidad_idEspecialidad'];
        $id2 = $_POST['Medico_RUN'];
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
    	$id1 = $_POST['Especialidad_idEspecialidad'];
        $id2 = $_POST['Medico_RUN'];
        $id = array($id1,$id2);
  
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

}

?>