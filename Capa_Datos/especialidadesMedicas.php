<?php
/**
 * La clase especialidad realiza las funciones crude para la tabla especialidades
 * registros de personas.
 *
 * @author Cesar Gonzalez
 */


  require_once 'Conexion.php';

class EspecialidadMedica {
    
    private $nombreEspecialidad;

    
    public function EspecialidadMedica($nombreEspecialidad){
        
        $this->nombreEspecialidad=$nombreEspecialidad; // defino el nombre de la especialidad
          }
      
          
    public function AgregarEspecialidades(){ //función que agrega especialides en la bbdd retorna un mensaje de si se agregó o no la especialidad
        
        $con = new ConexionDB(); // creo una nueva conexion a la db
     
       $con->conectar(); // me conecto a la db
       
      $nombreEspecialidad = mysql_real_escape_string($this->nombreEspecialidad); // transformo a un string real el nombre especialidad 
      // seguridad
     
      
      
      $query= mysql_query("INSERT INTO Especialidades(Nombre) VALUES ('$nombreEspecialidad')");
      // query de inserción en la bd
      if($query)
      {
          
          echo "Especialidad $this->nombreEspecialidad Agregada con exito";
         // mensaje de éxito
      }
      else
      {
          die('Error: ' . mysql_error());
         // mensaje de error
          
      }
      
      $con->desconectar();
        
      
    }
     
}

?>
