<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class ContraindicacionAlergia  {

    static $nombreTabla = "Contraindicaciones_Principios_Activos";
    static $nombreIdTabla = "Princio_Activo_has_Princio_Activo";
    static $nombreIdTabla1 = "Princio_Activo_has_Princio_Activo1";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($id1, $id2) {
        $id = array($id1,$id2);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id1, $id2) {
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
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
        
        $queryString = QueryStringSeleccionarRelacion($where, null, self::$nombreTabla);

	    if($limit != 0){
	       $queryString = $queryString." LIMIT $limit";
	    }
	    if($offset != 0){
		  $queryString = $queryString." OFFSET $offset ";
	    }

        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
    }
    
    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    /*no necesita actualizar
   public static function Actualizar($id1, $id2) {
        $id = array($id1,$id2);
        $datos = array(
          array('Descripcion',$_POST['desc'])  
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }*/

    public static function BuscarAlergiasPorMedicamentoId($idMedicamento){
        $queryString = 'SELECT Contraindicaciones_Alergias.Alergias_idAlergia as ID FROM Medicamentos, Contraindicaciones_Alergias
                                   WHERE ' . $idMedicamento . ' = Contraindicaciones_Alergias.Medicamentos_idMedicamento
                                   AND ' . $idMedicamento . ' = Medicamentos.idMedicamento';
        $resultado = CallQuery($queryString);
        return $resultado;
    }
}

?>