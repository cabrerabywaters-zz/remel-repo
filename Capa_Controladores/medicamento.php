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
                                array('Reacciones_Adversas',$_POST['reacciones_adversas']),
                                array('Nombre_Generico',$_POST['nombre_generico']),
                                array('CodigoISP',$_POST['codigo_isp']),
                                array('Precio_Referencia_CLP',$_POST['precio_referencia']),
                                array('Foto_Presentacion',$_POST['foto_presentacion']),
                                array('Fecha_Autorizacion_ISP','NOW()'),
                                array('Fecha_Prox_Renovacion_ISP',$_POST['fecha_prox_renovacion_isp']),
                                array('Observaciones',$_POST['observacion']),
                                array('Presentaciones_idPresentacion',$_POST['idUnidade']),
                                array('Descripcion_consumo_idDescripcion_consumo',$_POST['idDescripcion_consumo']),
                                array('Ean13',$_POST['ean13']),
								array('Tipo_de_Receta_Id',$_POST['Tipo_de_Receta_Id'])
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
										'idMedico',
                                        'Nombre_Comercial',
                                        'Laboratorio_idLaboratorio',
                                        'SubClase_Terapeutica_idSubClase',
                                        'Clase_Terapeurtica_idClase_Terapeurtica',
                                        'bioequivalente',
                                        'Reacciones_Adversas',
                                        'Nombre_Generico',
                                        'CodigoISP',
                                        'Precio_Referencia_CLP',
                                        'Foto_Presentacion',
                                        'Fecha_Autorizacion_ISP',
                                        'Fecha_Prox_Renovacion_ISP',
                                        'Observaciones',
                                        'Presentaciones_idPresentacion',
                                        'Unidades_idUnidade',
                                        'Descripcion_consumo_idDescripcion_consumo',
                                        'Ean13',
										'Tipo_de_Receta_Id'
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
                                array('Laboratorio_idLaboratorio',$_POST['RUT']),
                                array('SubClase_Terapeutica_idSubClase',$_POST['idSubClase']),
                                array('bioequivalente',$_POST['bioequivalente']),
                                array('Reacciones_Adversas',$_POST['reacciones_adversas']),
                                array('Nombre_Generico',$_POST['nombre_generico']),
                                array('CodigoISP',$_POST['codigo_isp']),
                                array('Precio_Referencia_CLP',$_POST['precio_referencia']),
                                array('Foto_Presentacion',$_POST['foto_presentacion']),
                                array('Fecha_Autorizacion_ISP','NOW()'),
                                array('Fecha_Prox_Renovacion_ISP',$_POST['fecha_prox_renovacion_isp']),
                                array('Observaciones',$_POST['observacion']),
                                array('Presentaciones_idPresentacion',$_POST['idUnidade']),
                                array('Descripcion_consumo_idDescripcion_consumo',$_POST['idDescripcion_consumo']),
                                array('Ean13',$_POST['ean13']),
								array('Tipo_de_Receta_Id',$_POST['Tipo_de_Receta_Id'])
            );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

	public static function BuscarMedicamentoLike($nombre) {
        $limit = 5; $offset = 0;
        $like = "'%$nombre%'";
        $where = "WHERE Nombre_Comercial LIKE $like OR Nombre_Generico LIKE $like";
        $atributosASeleccionar = array(
                                        'Nombre_Comercial',
                                        'idMedicamento'
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


    public static function BuscarMedicamentoPorId($id){
	$queryString = "SELECT *

                        FROM Medicamentos

                        WHERE idMedicamento = '$id';";

	$resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    
    public static function BuscarNombreMedicamentoPorId($id){
        $queryString = "SELECT Nombre_Comercial

                        FROM Medicamentos

                        WHERE idMedicamento = '$id';";

        $resultado = CallQuery($queryString);
	$res = $resultado->fetch_assoc();
        return $res['Nombre_Comercial'];
    }
    
    
      public static function SeleccionarLaboratorioPorIdMedicamento($id){
	$queryString = "SELECT ID, Nombre as laboratorio FROM Laboratorios WHERE ID in (SELECT DISTINCT (
                        Laboratorio_idLaboratorio
                                                    )
                        FROM  Medicamentos 
                        WHERE  idMedicamento = '$id') ;";

	$resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    
    public static function SeleccionarMedicamentoPorIDyLab($idMedicamentoB,$idLabB){
	$queryString = "SELECT * 
                    FROM Medicamentos
                        WHERE IdMedicamento ='$idMedicamentoB'
                        AND Laboratorio_idLaboratorio ='$idLabB'";

	$resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    
    
    
    public static function BuscarMedicamentoPorIdPrincipioActivo($idPrincipioActivo) {
       

        $queryString = "Select idMedicamento, Nombre_Comercial from Medicamentos where
            idMedicamento IN 
            (select Medicamentos_idMedicamento from 
            Composicion_Medicamento where 
            Principio_Activo_idPrincipio_Activo='$idPrincipioActivo')";

        $result = CallQuery($queryString);
            $resultArray = array();
            while($fila = $result->fetch_assoc()) {
               $resultArray[] = $fila;
            }

        return $resultArray;
    }
    
    
    public static function BuscarMedicamentoArsenalLike($nombre,$idSucursal) {
        

        $queryString ="Select Nombre_Comercial,idMedicamento from Medicamentos where 
            idMedicamento IN ( Select Medicamentos_idMedicamento from Arsenal where Expendedores_idExpendedores IN 
            (Select idExpendedores from Expendedores where Sucursales_RUT='$idSucursal')) and Nombre_Comercial like '%$nombre%'
          ";

           

        $result = CallQuery($queryString);
            $resultArray = array();
            while($fila = $result->fetch_assoc()) {
               $resultArray[] = $fila;
            }

        return $resultArray;
    }

	public static function SeleccionarUnidadesConsumo($idMedicamento){
		$queryString = "SELECT idUnidad_de_Consumo AS ID, tipo AS Nombre
FROM Unidad_de_Consumo, Unidad_de_Consumo_has_Presentaciones_has_Medicamentos
WHERE Presentaciones_has_Medicamentos_Medicamentos_idMedicamento =  '$idMedicamento'
AND idUnidad_de_Consumo = 	Unidad_de_Consumo_idUnidad_de_Consumo";
		$query = CallQuery($queryString);
		$unidades = array();
		while($unidad = $query->fetch_assoc()){
			$unidades[] = $unidad;
		}
		return $unidades;
	}
        public static function R_CantidadDisponibleMedicamento($idMedicamento){
            $queryString = 'SELECT COUNT(Medicamentos_Vendidos.Medicamentos_Recetas_Medicamento_idMedicamento) as cantidadVendida,
                                   Medicamentos_Recetas.Cantidad as cantidad, Medicamentos_Recetas.Frecuencia as frecuencia, Medicamentos_Recetas.Periodo as periodo, Presentaciones.Cantidad_Unitaria as cantidadPresentacion
                            FROM Medicamentos, Medicamentos_Recetas, Medicamentos_Vendidos, Presentaciones_has_Medicamentos, Presentaciones
                            WHERE Medicamentos.idMedicamento = '.$idMedicamento.'
                            AND Medicamentos.idMedicamento = Medicamentos_Recetas.Medicamento_idMedicamento
                            AND Medicamentos_Recetas.Medicamento_idMedicamento = Medicamentos_Vendidos.Medicamentos_Recetas_Medicamento_idMedicamento
                            AND Medicamentos.idMedicamento = Presentaciones_has_Medicamentos.Medicamentos_idMedicamento
                            AND Presentaciones_has_Medicamentos.Presentaciones_idPresentacion = Presentaciones.idPresentacion
                            ';
            $query = CallQuery($queryString);
            return $query->fetch_assoc();
        }

}

?>
