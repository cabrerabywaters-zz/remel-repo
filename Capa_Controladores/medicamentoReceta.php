<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class MedicamentoReceta  {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Medicamentos_Recetas";
        /**
     * Nombre del id de medicamento
     * @static  
     * @var string
     */

    static $nombreIdTabla = "Medicamento_idMedicamento";
        /**
     * Nombre del id de receta
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Receta_idReceta";   
    /**
     * Nombre del id de diagnostico
     * @static  
     * @var string
     */
	static $nombreIdTabla2 = "Diagnosticos_idDiagnostico";
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($idReceta, $idDiagnostico, $idMedicamento, $cantidad, $unidadConsumo, $frecuencia, $unidadFrecuencia, $periodo, $unidadPeriodo, $fechaInicio,$fechaTermino, $comentario) {
    $idReceta=trim($idReceta);
  $idDiagnostico =trim($idDiagnostico);
	$idMedicamento=trim($idMedicamento);
    $cantidad=trim($cantidad);
   $unidadConsumo =trim($unidadConsumo);
         $frecuencia =trim($frecuencia);
          $unidadFrecuencia  =trim($unidadFrecuencia);
           $periodo =trim($periodo);
          $unidadPeriodo =trim( $unidadPeriodo);
           $fechaInicio =trim($fechaInicio);
           $fechaTermino =trim($fechaTermino);
           $comentario =trim($comentario);


        $queryString ="Insert into Medicamentos_Recetas(Receta_idReceta,Diagnosticos_idDiagnosticos,Medicamento_idMedicamento,Cantidad,Frecuencia,Unidad_Frecuencia_ID,Periodo
,Unidad_Periodo_ID,Unidad_de_Consumo_idUnidad_de_Consumo,Comentario,Fecha_Inicio,Fecha_Termino)
	Values ('$idReceta','$idDiagnostico','$idMedicamento','$cantidad','$frecuencia','$unidadFrecuencia','$periodo','$unidadPeriodo','$unidadConsumo','$comentario','$fechaInicio','$fechaTermino')";
               $query = CallQuery($queryString);

             if(!$query)
             {
                 echo 0;
             }
            else {}
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
    /*
     * Busca medicamentos en el historial medico
     * @static
     * @access public
     * @param int $idReceta ID del receta
     * @param int $idDiagnostico ID del diagnostico
     * @return array asociativo
     */
    public static function SeleccionarPorHistorialMedico($idReceta, $idDiagnostico) {
        $atributosASeleccionar = array(
				 	'Medicamento_idMedicamento',
                                 	'Cantidad',
                                 	'Frecuencia',
                                	'Unidad_Frecuencia_ID',
                                 	'Fecha_Inicio',
                                        'Periodo',
                                        'Unidad_Periodo_ID',
					'Via_idVia',
					'Unidad_de_Consumo_idUnidad_de_Consumo'
      );
	$where = "WHERE Receta_idReceta = '$idReceta' AND Diagnosticos_idDiagnosticos = '$idDiagnostico'";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
	$query = CallQuery($queryString);
	$medicamentos = array();
	while($medicamento = $query->fetch_assoc()){
		$medicamentos[] = $medicamento;
	}
	return $medicamentos;
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
