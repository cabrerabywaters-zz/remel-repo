<?php



/**
 * La clase conexion permite establecer los parametros de conexion para trabajar con diferentes bases de datos
 * 
 *
 * @author Ignacio Cabrera
 */
class ConexionDB {
    
 
    private $servidor;
    private $nombre_usuario;
    private $contrasena;
    private $base_de_datos;
    private $con;
 
    
    public function ConexionDB($servidor_conexion,$nombre_usuario_conexion,$contrasena_conexion,$base_de_datos_conexion){
        
         // tomamos todos los registros para crear el dialogo de conexion.
               
         $this->servidor = $servidor_conexion ;
        $this->nombre_usuario = $nombre_usuario_conexion ;
         $this->contrasena = $contrasena_conexion ;
        $this->base_de_datos = $base_de_datos_conexion;
     
    }
    
    public function conectar(){
        
        //creamos el dialogo de conexion
      $this->con  = mysql_connect($this->servidor,$this->nombre_usuario,  $this->contrasena);
if (!$this->con)
  {
  die('Could not connect: ' . mysql_error());
  }
     else{
         
        
         $var=   mysql_select_db($this->base_de_datos);
              if(!$var) 
              {
                  echo "No hemos podido conectar con la base de datos";
                  
              }
              else{
                  
                  
              }
     }   
  
        
        
        
    }
    
       
    public function desconectar(){
        
     $a = mysql_close($this->con) ;
     
     if($a){
         
       
         
     }
     else
     {
         echo"La conexion no ha sido desconectada correctamente";
         
     }
    }
}

  
   



?>
