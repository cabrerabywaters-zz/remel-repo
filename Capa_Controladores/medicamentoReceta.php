<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class MedicamentoReceta  {

    static $nombreTabla = "Medicamentos_Recetas";
    static $nombreIdTabla = "Medicamento_idMedicamento";
    static $nombreIdTabla1 = "Receta_idReceta";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                             array('DetalleRPcol',$_POST['detallerpcol']),
                             array('Cantidad_unidades',$_POST['cantidad_unidades']),
                             array('Periodo',$_POST['periodo']),
                             array('Ciclo',$_POST['ciclo']) 
                            );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

   /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Medicamento_idMedicamento'];
        $id2 = $_POST['Receta_idReceta'];
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
    	$atributosASeleccionar = array(
                                 'DetalleRPcol',
                                 'Cantidad_unidades',
                                 'Periodo',
                                 'Ciclo'
      );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

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
    public static function Actualizar() {
    	$id1 = $_POST['Medicamento_idMedicamento'];
        $id2 = $_POST['Receta_idReceta'];
        $id = array($id1,$id2);
        
        $datosActualizacion = array(                      	
                             array('DetalleRPcol',$_POST['detallerpcol']),
                             array('Cantidad_unidades',$_POST['cantidad_unidades']),
                             array('Periodo',$_POST['periodo']),
                             array('Ciclo',$_POST['ciclo'])
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        QueryStringActualizarRelacion($where, $id, $datosActualizacion, self::$nombreTabla);
    }
}

?>