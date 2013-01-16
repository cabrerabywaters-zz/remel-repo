<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');

class SucursalesHasFuncionarios  {

    static $nombreTabla = "Sucursales_has_Funcionarios";
    static $nombreIdTabla = "Funcionarios_idFuncionario";
    static $nombreIdTabla1 = "Funcionarios_Persona_RUN";
    static $nombreIdTabla2 = "Sucursales_RUT";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Funcionarios_idFuncionario'];
        $id2 = $_POST['Funcionarios_Persona_RUN'];
        $id3 = $_POST['Sucursales_RUT'];
        $id = array($id1,$id2,$id3);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Funcionarios_idFuncionario'];
        $id2 = $_POST['Funcionarios_Persona_RUN'];
        $id3 = $_POST['Sucursales_RUT'];
        $id = array($id1,$id2,$id3);
        
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
    	$id1 = $_POST['Funcionarios_idFuncionario'];
        $id2 = $_POST['Funcionarios_Persona_RUN'];
        $id3 = $_POST['Sucursales_RUT'];
        $id = array($id1,$id2,$id3);
        

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }

    public static function SeleccionarPorIdDiagnostico($id){
	$rows = array();
	$queryString = "SELECT * FROM Uso, Medicamentos, Sucursales WHERE Uso.Medicamento_idMedicamento = Medicamentos.idMedicamento 
                        AND Uso.Enfermedad_idEnfermedad = '$id' AND Sucursales.RUT= Uso.Sucursales_RUT;";
	$query = CallQuery($queryString);
	while($row = $query->fetch_assoc()) $rows[] = $row;

	return $rows;
    }
}

?>