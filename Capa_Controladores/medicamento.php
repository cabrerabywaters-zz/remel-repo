<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Medicamento  {

    static $nombreTabla = "Medicamentos";
    static $nombreIdTabla = "idMedicamento";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Nombre_Comercial',$_POST['nombre_comercial']),
                                array('Laboratorio_idLaboratorio',$_POST['RUT']),
                                array('SubClase_Terapeutica_idSubClase',$_POST['idSubClase']),
                                array('bioequivalente',$_POST['bioequivalente']),
                                array('Medicamentocol',$_POST['medicamentocol']),
                                array('Reacciones_Adversas',$_POST['reacciones_adversas']),
                                array('Nombre_Generico',$_POST['nombre_generico']),
                                array('CodigoISP',$_POST['codigo_isp']),
                                array('Precio_Referencia(CLP)',$_POST['precio_referencia']),
                                array('Foto_Presentacion',$_POST['foto_presentacion']),
                                array('Fecha_Autorizacion_ISP','NOW()'),
                                array('Fecha_Prox_Renovacion_ISP',$_POST['fecha_prox_renovacion_isp']),
                                array('Observacion',$_POST['observacion']),
                                array('Presentaciones_idPresentacion',$_POST['idUnidade']),
                                array('Descripcion_consumo_idDescripcion_consumo',$_POST['idDescripcion_consumo']),
                                array('retenido',$_POST['retenido']),
                                array('Ean13',$_POST['ean13'])
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
                                        'Nombre_Comercial',
                                        'Laboratorio_idLaboratorio',
                                        'SubClase_Terapeutica_idSubClase',
                                        'Clase_Terapeurtica_idClase_Terapeurtica',
                                        'bioequivalente',
                                        'Medicamentocol',
                                        'Reacciones_Adversas',
                                        'Nombre_Generico',
                                        'CodigoISP',
                                        'Precio_Referencia(CLP)',
                                        'Foto_Presentacion',
                                        'Fecha_Autorizacion_ISP',
                                        'Fecha_Prox_Renovacion_ISP',
                                        'Observaciones',
                                        'Presentaciones_idPresentacion',
                                        'Unidades_idUnidade',
                                        'Descripcion_consumo_idDescripcion_consumo',
                                        'retenido',
                                        'Ean13'
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
    	$id = $_POST['id_medicamento'];
    	$datosActualizacion = array(
                               array('Nombre_Comercial',$_POST['nombre_comercial']),
                                array('SubClase_Terapeutica_idSubClase',$_POST['idSubClase']),
                                array('bioequivalente',$_POST['bioequivalente']),
                                array('Medicamentocol',$_POST['medicamentocol']),
                                array('Reacciones_Adversas',$_POST['reacciones_adversas']),
                                array('Nombre_Generico',$_POST['nombre_generico']),
                                array('Precio_Referencia',$_POST['precio_referencia']),
                                array('Foto_Presentacion',$_POST['foto_presentacion']),
                                array('Fecha_Autorizacion_ISP','NOW()'),
                                array('Fecha_Prox_Renovacion_ISP',$_POST['fecha_prox_renovacion_isp']),
                                array('Observacion',$_POST['observacion']),
                                array('retenido',$_POST['retenido']),
                                array('Ean13',$_POST['ean13']) 
            );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>