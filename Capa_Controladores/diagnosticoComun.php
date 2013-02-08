<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class DiagnosticoComun  {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Diagnosticos_Comunes";
    /**
     * Nombre del id de medico
     * @static  
     * @var string
     */
    static $nombreIdTabla = "Medicos_idMedico";
    /**
     * Nombre del id de diagnostico
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Diagnosticos_idDiagnostico";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($idMedico, $idDiagnostico){
        $id = array(
			array(self::$nombreIdTabla,$idMedico),
			array(self::$nombreIdTabla1,$idDiagnostico)
		);
        $datos = array(
                            array('Fecha_creacion',date("Y-m-d H:i:s"))
                                      );
        $queryString = QueryStringCrearRelacion($id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
	return $query;
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($idMedico, $idDiagnostico) {
        $id = array($idMedico,$idDiagnostico);
        
        $nombreId = array(self::$nombreIdTabla,self::$nombreIdTabla1);
        
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, $nombreId, $id);
        $query = CallQuery($queryString);
	echo $query;
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
    public static function Seleccionar($idMedico, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
					'Diagnosticos_idDiagnostico',
                                        'Fecha_creacion'
      );
        
	$where = "WHERE Medicos_idMedico = '$idMedico'";
        $queryString = QueryStringSeleccionarRelacion($where, $atributosASeleccionar, self::$nombreTabla);

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
    	$id1 = $_POST['Medico_idMedico'];
        $id2 = $_POST['Diagnosticos_idDiagnostico'];
        $id = array($id1,$id2);
        
        $datos = array(                      	
                             array('Fecha_creacion','NOW()')
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

}


?>
