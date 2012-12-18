<?php



/**
 * La clase personas realiza todas las llamadas a la base de datos requeridas para agregar, leer, modificar y eliminar
 * registros de personas.
 *
 * @author Ignacio Cabrera
 */
  require_once 'Conexion.php';

class Region {
    // Se declaran las variables que se utilizarán, nombre y número de región
     private $nombre_region;
    private $numero_region;
    
    public function Region($nombre_region,$numero_region){
        
        // Se apuntan las variables a los constructores de la clase
        $this->nombre_region=$nombre_region;
        $this->numero_region=$numero_region;
    }
      
          
    public function AgregarRegiones(){
        
        // se Instancia la clase conexión con la base de datos definida en Conexion.php
        $con = new ConexionDB();
         $con->ConexionDB();
        
        // Se Utiliza la funcion conectar de Conexion.php
       $con->conectar();
       
       
       // Se  "Limpian" los datos que pueda contener la variable region y nombre 
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
     public function Eliminar_Regio(){
        
        
    }
     public function Modificar_Persona(){
        
        
    }
}

?>
