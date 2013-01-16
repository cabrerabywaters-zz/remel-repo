<?php

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/../Capa_Datos/interfazRelacion.php');
include_once(dirname(__FILE__).'/sucursal.php');
include_once(dirname(__FILE__).'/lugarAtencion.php');

class MedicoHasSucursal  {

    static $nombreTabla = "Medicos_has_Sucursales";
    static $nombreIdTabla = "Medico_idMedico";
    static $nombreIdTabla1 = "Sucursal_RUT";
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$id1 = $_POST['Medico_idMedico'];
        $id2 = $_POST['Sucursal_RUT'];
        $id = array($id1,$id2);
       
        $queryString = QueryStringCrearRelacion($id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id1 = $_POST['Medico_idMedico'];
        $id2 = $_POST['Sucursal_RUT'];
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
    	$id1 = $_POST['Medico_idMedico'];
        $id2 = $_POST['Sucursal_RUT'];
        $id = array($id1,$id2);
  
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, NULL, self::$nombreTabla);
        $query = CallQuery($queryString);
        
    }
 
public static function SucursalesPorIdMedico($idMedico){
        $atributosASeleccionar = array(
                                        'Sucursal_RUT',
      	);

	$where = "WHERE Medico_idMedico = '$idMedico'"; 
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);	

        $result = CallQuery($queryString);
        $rutsSucursales = array();
        while($fila = $result->fetch_assoc()) {
               $rutsSucursales[] = $fila['Sucursal_RUT'];
        }

	$nombres = Sucursal::BuscarNombreArrayRUT($rutsSucursales);
	$nombresConLugares = array();

	foreach($nombres as $nombre){
		$nombresConLugares[] = array(
						'Nombre' => $nombre['Nombre'],
						'RUT' => $nombre['RUT'],
						'Lugares' => LugarAtencion::SeleccionarPorRutSucursal($nombre['RUT'])
					   );
	}

        return $nombresConLugares;
}


}
?>
