<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class ContraindicacionPrincipioActivo  {

    static $nombreTabla = "Contraindicaciones_Diagnosticos";
    static $nombreIdTabla = "Diagnosticos_idDiagnostico";
    static $nombreIdTabla1 = "Medicamentos_idMedicamento";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Diagnosticos_idDiagnostico'];
        $id2 = $_POST['Medicamentos_idMedicamento'];
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
        $id1 = $_POST['Diagnosticos_idDiagnostico'];
        $id2 = $_POST['Medicamentos_idMedicamento'];
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
                                        'Descripcion'
      );
        
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
    	$id1 = $_POST['Diagnosticos_idDiagnostico'];
        $id2 = $_POST['Medicamentos_idMedicamento'];
        $id = array($id1,$id2);
        
        $datos = array(                      	
                             array('Descripcion',$_POST['descripcion'])
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
    public static function BuscarContraindicacionPrincipioActivo($PA0,$PA1){
        $queryString = 
        'SELECT Principio_Activo_has_Principio_Activo, Principio_Activo_has_Principio_Activo1
         FROM Contraindicaciones_Principios_Activos
         WHERE ('.$PA0.' = Principio_Activo_has_Principio_Activo
            AND '.$PA1.' = Principio_Activo_has_Principio_Activo1)
         OR    ('.$PA1.' = Principio_Activo_has_Principio_Activo1
            AND '.$PA0.' = Principio_Activo_has_Principio_Activo)
         ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }
}

?>