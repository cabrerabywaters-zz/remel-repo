<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class HistorialMedico  {

    static $nombreTabla = "Historiales_medicos";
    static $nombreIdTabla = "Diagnosticos_idDiagnostico";
    static $nombreIdTabla1 = "Consulta_Id_consulta";
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
        echo $queryString;
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

}

?>
