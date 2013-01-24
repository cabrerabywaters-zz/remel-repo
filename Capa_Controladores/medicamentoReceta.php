<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class MedicamentoReceta  {

    static $nombreTabla = "Medicamentos_Recetas";
    static $nombreIdTabla = "Medicamento_idMedicamento";
    static $nombreIdTabla1 = "Receta_idReceta";
	static $nombreIdTabla2 = "Diagnosticos_idDiagnostico";
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($idReceta, $idDiagnostico, $idMedicamento, $cantidad, $unidadConsumo, $frecuencia, $unidadFrecuencia, $periodo, $unidadPeriodo, $via, $fechaInicio, $comentario) {
    	$datosCreacion = array(
					array('Receta_idReceta',$idReceta),
					array('Medicamento_idMedicamento',$idMedicamento),
					array('Diagnosticos_idDiagnostico',$idDiagnostico),
                             		array('Cantidad',$cantidad),
                             		array('Frecuencia',$frecuencia),
                             		array('Unidad_Frecuencia_ID',$unidadFrecuencia, ),
                             		array('Periodo',$periodo),
					array('Unidad_Periodo_ID',$unidadPeriodo),
					array('Unidad_de_Consumo_idUnidad_de_Consumo',$unidadConsumo),
					array('Comentario',$comentario),
					array('Fecha_Inicio',$fechaInicio),
					array('Via_idVia',$via),
                            );
        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
	echo $queryString;
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
                                 'Cantidad',
                                 'Frecuencia',
                                 'Unidad_Frecuencia_ID',
                                 'Fecha_Inicio',
								 'Periodo',
								 'Unidad_Periodo_ID',								 'Unidad_de_Consumo_idUnidad_de_Consumo'
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
                             array('Cantidad',$_POST['cantidad']),
                             array('Frecuencia',$_POST['frecuencia']),
                             array('Unidad_Frecuencia_ID',$_POST['Unidad_Frecuencia_ID']),
                             array('Fecha_Inicio',$_POST['fechaInicio']) ,
							 array('Fecha_Termino',$_POST['fechaTermino']),
							 array('Periodo',$_POST['periodo']),
							 array('Unidad_Periodo_ID',$_POST['unidadPeriodoId']),
							 array('Unidad_de_Consumo_idUnidad_de_Consumo',$_POST['Unidad_de_Consumo_idUnidad_de_Consumo'])
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        QueryStringActualizarRelacion($where, $id, $datosActualizacion, self::$nombreTabla);
    }
}

?>
