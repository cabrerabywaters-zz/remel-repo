<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class Arsenal  {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Alergia_has_Paciente";
    /**
     * Nombre del id de expendedor
     * @static  
     * @var string
     */
    static $nombreIdTabla = "Expendedores_idExpendedores";
    /**
     * Nombre del id de medicamento
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Medicamentos_idMedicamento";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar($id1, $id2) {
        $id = array($id1,$id2);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id1, $id2) {
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
       
    	$id1 = $_POST['Expendedores_idExpendedores'];
        $id2 = $_POST['Medicamentos_idMedicamento'];

        $id = array($id1,$id2);
        
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, null, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
    //busca los medicamentos del arsenal segun el id de expendedor
    //devuelve el nombre y el precio de los medicamentos
    /*
     * Busca medicamentos en un arsenal segun ID de expendedor
     * @static
     * @access public
     * @param int $idExpendedor ID del expendedor
     * @return array asociativo
     */
    public static function R_MedicamentosEnArsenalPorExpendedor($idExpendedor){
        $queryString = 'SELECT Medicamentos.Nombre_Comercial as Nombre, Medicamentos.Precio_Referencia_CLP as Precio
                        FROM Medicamentos, Arsenal, Expendedores
                        WHERE Expendedores.idExpendedores = Arsenal.Expendedores_idExpendedores 
                        AND Expendedores.idExpendedores = '.$idExpendedor.'
                        AND Arsenal.Medicamentos_idMedicamento = Medicamentos.idMedicamento
                        ';
        $query = CallQuery($queryString);
        $resultArray = array();
        if ($query){
	    while($fila = $query->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	return $resultArray;
        }
        else return false;
    }
}

?>