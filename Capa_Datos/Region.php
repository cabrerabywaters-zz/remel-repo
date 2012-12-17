<?php



/**
 * La clase personas realiza todas las llamadas a la base de datos requeridas para agregar, leer, modificar y eliminar
 * registros de personas.
 *
 * @author Ignacio Cabrera
 */


  require_once 'Conexion.php';

class Region {
    
     private $nombre_region;
    private $numero_region;
    
    public function Region($nombre_region,$numero_region){
        
        $this->nombre_region=$nombre_region;
        $this->numero_region=$numero_region;
    }
      
          
    public function Agregar_Regiones(){
        
        $con = new ConexionDB("localhost", "root", "", "BD_REMEL");
       
       $con->conectar();
       
      $nombre_region = mysql_real_escape_string($this->nombre_region);
      $numero_region= mysql_real_escape_string($this->numero_region);
      
      
      $query= mysql_query("INSERT INTO Regiones(Nombre,Numero) VALUES ('$nombre_region','$numero_region')");
      
      if($query)
      {
          
          echo "Region $this->nombre_region Agregada con exito";
         
      }
      else
      {
          die('Error: ' . mysql_error());
         
          
      }
      
      $con->desconectar();
        
      
    }
     public function Eliminar_Persona(){
        
        
    }
     public function Modificar_Persona(){
        
        
    }
}

?>
