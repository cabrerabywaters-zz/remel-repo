<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class MedicamentoVendido {

    static $nombreTabla = "Medicamentos_Vendidos";
    static $nombreIdTabla = "idMedicamentos_Vendidos";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Expendedores_idExpendedores',$_POST['idExpendedores']),
                                array('Expendedores_Plazas_Instituciones_idPlaza',$_POST['idPlaza']),
                                array('Medicamentos_Recetas_Medicamento_idMedicamento',$_POST['Medicamento_idMedicamento']),
                                array('Medicamentos_Recetas_Receta_idReceta',$_POST['idReceta']),
                                array('Cantidad',$_POST['cantidad']),
                                array('Fecha',"NOW()")
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
                                        'Expendedores_idExpendedores',
                                        'Expendedores_Plazas_Instituciones_idPlaza',
                                        'Medicamentos_Recetas_Medicamento_idMedicamento',
                                        'Medicamentos_Recetas_Receta_idReceta',
                                        'Cantidad',
                                        'Fecha'
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
    	$id = $_POST['id_condiciones'];
    	$datosActualizacion = array(
                                array('Cantidad',$_POST['cantidad']),
                                array('Fecha',"NOW()")
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>