<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class HistorialMedico  {

    static $nombreTabla = "Historiales_medicos";
        /**
     * Nombre del id de diagnostico
     * @static  
     * @var string
     */
    static $nombreIdTabla = "Diagnosticos_idDiagnostico";
        /**
     * Nombre del id de consulta
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Consulta_Id_consulta";
        /**
     * Nombre del id de tipo
     * @static  
     * @var string
     */
    static $nombreIdTabla2 = "Tipo_idTipo";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($idConsulta,$idDiagnostico,$idTipo,$comentario) {
    	$datosCreacion = array(
	                                array('Diagnosticos_idDiagnostico',$idDiagnostico),
				        array('Consulta_Id_consulta',$idConsulta),
					array('Tipo_idTipo',$idTipo),
					array('Comentario',$comentario),									                                );	
	$queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
	return $query;
    }


    
    
    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Diagnosticos_idDiagnostico'];
        $id2 = $_POST['Consulta_Id_consulta'];
        $id3 = $_POST['Tipo_idTipo'];
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
    	$id1 = $_POST['Diagnosticos_idDiagnostico'];
        $id2 = $_POST['Consulta_Id_consulta'];
        $id3 = $_POST['Tipo_idTipo'];
        $id = array($id1,$id2,$id3);
        

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
    //busca datos de una consulta
    //devuelve id de diagnostico, tipo y comentario
        /*
     * Busca datos de la consulta segun su id
     * @static
     * @access public
     * @param int $idConsulta ID del consulta
     * @return array asociativo
     */
    public static function SeleccionarPorConsulta($idConsulta){
	$datosASeleccionar = array(
					'Diagnosticos_idDiagnostico',
					'Tipo_idTipo',
					'Comentario'
				);
	$where = "WHERE Consulta_Id_Consulta = '$idConsulta'";
	$queryString = QueryStringSeleccionar($where, $datosASeleccionar, self::$nombreTabla);
	$query = CallQuery($queryString);
	$historialMedico = array();
	while($lineaHistorial = $query->fetch_assoc()){
		$historialMedico[] = $lineaHistorial;
	}
	return $historialMedico;
    }
}

?>
