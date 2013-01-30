<?php

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class FavoritosRp {

static $nombreTabla = "Favoritos_RP";
static $nombreIdTabla = "ID";

 public static function Insertar() {
    	$datosCreacion = array(
                                array('Medicamento_idMedicamento',$_POST['idMedicamento']),
                                array('Medicos_idMedico',$_POST['idMedico']),
                                array('Cantidad',$_POST['cantidad']),
                                array('Frecuencia',$_POST['frecuencia']),
                                array('Unidad_Frecuencia_ID',$_POST['ID']),
                                array('Periodo',$_POST['periodo']),
                                array('Unidad_de_Consumo_idUnidad_de_Consumo',$_POST['idUnidad_de_Consumo']),
                                array('Unidad_Periodo_ID',$_POST['ID'])
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
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
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
					'Medicamento_idMedicamento',
                                        'Medicos_idMedico',
                                        'Cantidad',
                                        'Frecuencia',
                                        'Unidad_Frecuencia_ID',
                                        'Periodo',
                                        'Unidad_de_Consumo_idUnidad_de_Consumo',
                                        'Unidad_Periodo_ID'
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
    	$id = $_POST['RUT'];
    	$datosActualizacion = array(
                                array('Cantidad',$_POST['cantidad']),
                                array('Frecuencia',$_POST['frecuencia']),
                                array('Periodo',$_POST['periodo']),
            );
        
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    public static function R_obtenerFavoritoRP($idMedicamento, $idMedico){
        $queryString = "SELECT *
                FROM Favoritos_RP FRP
                WHERE Medicos_idMedico = '$idMedico' 
                AND Medicamentos_idMedicamento = '$idMedicamento'";
                
                
                $res = CallQuery($queryString);
                while($row = $res->fetch_assoc()){
                    $resultArray[] = $row;
                   
                }
                return $resultArray;
        
        
    }
    
}

?>