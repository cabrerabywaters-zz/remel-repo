<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Medicamento {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Medicamentos";    /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "idMedicamento";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre_Comercial', $_POST['nombre_comercial']),
            array('Laboratorio_idLaboratorio', $_POST['RUT']),
            array('SubClase_Terapeutica_idSubClase', $_POST['idSubClase']),
            array('bioequivalente', $_POST['bioequivalente']),
            array('Reacciones_Adversas', $_POST['reacciones_adversas']),
            array('Nombre_Generico', $_POST['nombre_generico']),
            array('CodigoISP', $_POST['codigo_isp']),
            array('Precio_Referencia_CLP', $_POST['precio_referencia']),
            array('Foto_Presentacion', $_POST['foto_presentacion']),
            array('Fecha_Autorizacion_ISP', 'NOW()'),
            array('Fecha_Prox_Renovacion_ISP', $_POST['fecha_prox_renovacion_isp']),
            array('Observaciones', $_POST['observacion']),
            array('Presentaciones_idPresentacion', $_POST['idUnidade']),
            array('Descripcion_consumo_idDescripcion_consumo', $_POST['idDescripcion_consumo']),
            array('Ean13', $_POST['ean13']),
            array('Tipo_de_Receta_Id', $_POST['Tipo_de_Receta_Id'])
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

        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
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
            array('Nombre_Comercial', $_POST['nombre_comercial']),
            array('Laboratorio_idLaboratorio', $_POST['RUT']),
            array('SubClase_Terapeutica_idSubClase', $_POST['idSubClase']),
            array('bioequivalente', $_POST['bioequivalente']),
            array('Reacciones_Adversas', $_POST['reacciones_adversas']),
            array('Nombre_Generico', $_POST['nombre_generico']),
            array('CodigoISP', $_POST['codigo_isp']),
            array('Precio_Referencia_CLP', $_POST['precio_referencia']),
            array('Foto_Presentacion', $_POST['foto_presentacion']),
            array('Fecha_Autorizacion_ISP', 'NOW()'),
            array('Fecha_Prox_Renovacion_ISP', $_POST['fecha_prox_renovacion_isp']),
            array('Observaciones', $_POST['observacion']),
            array('Presentaciones_idPresentacion', $_POST['idUnidade']),
            array('Descripcion_consumo_idDescripcion_consumo', $_POST['idDescripcion_consumo']),
            array('Ean13', $_POST['ean13']),
            array('Tipo_de_Receta_Id', $_POST['Tipo_de_Receta_Id'])
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca medicamento segun nombre con un trozo de texto
    //devuelve el nombre
        /*
     * Busca medicamentos segun una fraccion de su nombre
     * @static
     * @access public
     * @param string $nombre fraccion nombre
     * @return array asociativo
     */
    public static function BuscarMedicamentoLike($nombre) {
        $limit = 5;
        $offset = 0;
        $like = "'%$nombre%'";
        $where = "WHERE Nombre_Comercial LIKE $like OR Nombre_Generico LIKE $like";
        $atributosASeleccionar = array(
            'Nombre_Comercial',
            'idMedicamento'
        );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }
    //busca datos de un medicamento segun su id
    //devuelve todos sus datos
        /*
     * Busca datos de medicamento por su ID
     * @static
     * @access public
     * @param int $id ID del medicamento
     * @return array asociativo
     */
    public static function BuscarMedicamentoPorId($id) {
        $queryString = "SELECT *

                        FROM Medicamentos

                        WHERE idMedicamento = '$id';";

        $resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    //busca el nombre de un medicamento segun su id
    //devuelve el nombre
        /*
     * Busca nombre de medicamento por su id
     * @static
     * @access public
     * @param int $id ID del medicamento
     * @return array asociativo
     */
    public static function BuscarNombreMedicamentoPorId($id) {
        $queryString = "SELECT Nombre_Comercial

                        FROM Medicamentos

                        WHERE idMedicamento = '$id';";

        $resultado = CallQuery($queryString);
        $res = $resultado->fetch_assoc();
        return $res['Nombre_Comercial'];
    }
    
    public static function SeleccionarLaboratorioPorIdMedicamento($id) {
        $queryString = "SELECT ID, Nombre as laboratorio FROM Laboratorios WHERE ID in (SELECT DISTINCT (
                        Laboratorio_idLaboratorio
                                                    )
                        FROM  Medicamentos 
                        WHERE  idMedicamento = '$id') ;";

        $resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    
    public static function SeleccionarMedicamentoPorIDyLab($idMedicamentoB, $idLabB) {
        $queryString = "SELECT * 
                    FROM Medicamentos
                        WHERE IdMedicamento ='$idMedicamentoB'
                        AND Laboratorio_idLaboratorio ='$idLabB'";

        $resultado = CallQuery($queryString);
        return $resultado->fetch_assoc();
    }
    
    //busca medicamentos por id de principio activo
    //devuelve los id y nombre de los medicamentos que tengan el principio activo
        /*
     * Busca medicamentos por id de principio activo
     * @static
     * @access public
     * @param int $idPrincipioActivo ID del principio activo
     * @return array asociativo
     */
    public static function BuscarMedicamentoPorIdPrincipioActivo($idPrincipioActivo) {


        $queryString = "Select idMedicamento, Nombre_Comercial from Medicamentos where
            idMedicamento IN 
            (select Medicamentos_idMedicamento from 
            Composicion_Medicamento where 
            Principio_Activo_idPrincipio_Activo='$idPrincipioActivo')";

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }
    //busca medicamento en un arsenal segun un trozo de texto y el id del arsenal
    //devuelve el nombre y el id
        /*
     * Busca medicamentos en un arsenal por una fraccion de su nombre y el id de sucursal
     * @static
     * @access public
     * @param string $nombre fraccion del nombre
     * @param int $idSucursal ID de la sucursal
     * @return array asociativo
     */
    public static function BuscarMedicamentoArsenalLike($nombre, $idSucursal) {


        $queryString = "Select Nombre_Comercial,idMedicamento from Medicamentos where 
            idMedicamento IN ( Select Medicamentos_idMedicamento from Arsenal where Expendedores_idExpendedores IN 
            (Select idExpendedores from Expendedores where Sucursales_RUT='$idSucursal')) and Nombre_Comercial like '%$nombre%'
          ";



        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }
    //busca unidades de consumo de un medicamento segun su id
    //devuelve la unidad de consumo
            /*
     * Busca id de unidad de consumo segun id del medicamento
     * @static
     * @access public
     * @param int $idMedicamento ID de medicamento
     * @return array asociativo
     */
    public static function SeleccionarUnidadesConsumo($idMedicamento) {
        $queryString = "SELECT idUnidad_de_Consumo AS ID, tipo AS Nombre
FROM Unidad_de_Consumo, Unidad_de_Consumo_has_Presentaciones_has_Medicamentos
WHERE Presentaciones_has_Medicamentos_Medicamentos_idMedicamento =  '$idMedicamento'
AND idUnidad_de_Consumo = 	Unidad_de_Consumo_idUnidad_de_Consumo";
        $query = CallQuery($queryString);
        $unidades = array();
        while ($unidad = $query->fetch_assoc()) {
            $unidades[] = $unidad;
        }
        return $unidades;
    }
    //busca la cantidad disponible de un medicamento recetado
    //devuelve la cantidad, frecuencia, cantidad de presentacion y periodo del medicamento
            /*
     * Busca la cantidad disponible de un medicamento (datos para ello)
     * @static
     * @access public
     * @param int $idMedicamento ID de medicamento
     * @return array asociativo
     */
    public static function R_CantidadDisponibleMedicamento($idMedicamento) {
        $queryString = '    SELECT 
                                   Medicamentos_Recetas.Cantidad as cantidad, Medicamentos_Recetas.Frecuencia as frecuencia, Medicamentos_Recetas.Periodo as periodo, Presentaciones.Cantidad_Elementos as cantidadPresentacion
                            FROM Medicamentos, Medicamentos_Recetas, Presentaciones_has_Medicamentos, Presentaciones
                            WHERE Medicamentos.idMedicamento = '.$idMedicamento.'
                            AND Medicamentos.idMedicamento = Medicamentos_Recetas.Medicamento_idMedicamento
                           
                            AND Medicamentos.idMedicamento = Presentaciones_has_Medicamentos.Medicamentos_idMedicamento
                            AND Presentaciones_has_Medicamentos.Presentaciones_idPresentacion = Presentaciones.idPresentacion
                            
                            ';
        $query = CallQuery($queryString);
        return $query->fetch_assoc();
    }
    //busca la cantidad de veces que ha sido vendido un medicamento de cierta receta
    //devuelve la suma de veces que se ha vendido
                /*
     * Busca la cantidad total de un medicamento vendido
     * @static
     * @access public
     * @param int $idMedicamento ID de medicamento
     * @param int $idReceta ID de receta
     * @return array asociativo
     */
    public static function R_NumeroVentaMedicamento($idMedicamento, $idReceta){
        $queryString = 'SELECT SUM(Cantidad) as cantidadVendida
                        FROM Medicamentos_Vendidos
                        WHERE Medicamentos_Recetas_Medicamento_idMedicamento = '.$idMedicamento.'
                        AND Medicamentos_Recetas_Receta_idReceta = '.$idReceta.'
                        ';
        $query = CallQuery($queryString);
        return $query->fetch_assoc();
    }
    //busca un medicamento en el arsenal segun ambos id
    //devuelve verdadero o falso, si existe o no
                    /*
     * Busca si existe un medicamento en cierto arsenal
     * @static
     * @access public
     * @param int $idMedicamento ID de medicamento
     * @param int $idExpendedor ID de expendedor
     * @return bool
     */
    public static function R_BuscarMedicamentoEnArsenalPorId($idMedicamento, $idExpendedor){
        $queryString = 'SELECT *
                        FROM Arsenal
                        WHERE Medicamentos_idMedicamento = '.$idMedicamento.'
                        AND Expendedores_idExpendedores = '.$idExpendedor.'
                        ';
        $query = CallQuery($queryString);
        if ($query!=false){ return true;}
        else{ return false;}
    }

}

?>
