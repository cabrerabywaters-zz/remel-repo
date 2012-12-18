<?php



/**
 * La clase conexion permite establecer los parametros de conexion para trabajar con diferentes bases de datos
 * @property string $servidor
 * @property string $nombre_usuario
 * @property string $contrasena
 * @property string $base_de_datos
 *
 * @author Ignacio Cabrera
 */
class ConexionDB {
    
    private $servidor;
    private $nombre_usuario;
    private $contrasena;
    private $base_de_datos;
    private $con;

	/**
	* Constructor clase ConexionDB
	**/
    public function ConexionDB(){
        
         // Se retiran datos desde el archivo Config.php
         
	require_once('Config.php');
      
        $this->servidor = $servidor ;
        $this->nombre_usuario = $nombre_usuario ;
        $this->contrasena = $contrasena ;
        $this->base_de_datos = $base_de_datos;
     
    }
    
	/**
	* Funcion conectar, establece la propiedad con como una nueva conexion
	**/
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
    
    /**
	* Desconecta a la conexion con
	**/
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
