<?php

/*
 * La clase Previsiones realiza todas las llamadas a la base de datos requeridas para agregar, leer, modificar y eliminar
 * registros de Previsiones.
 *
 * @author Leonardo Hidalgo
 */
class Clase_terapeutica 
{
    
    private $_clase_terapeuticaNombre;    
    
    public function Clase_terapeutica()
            {
        $this->_clase_terapeuticaNombre=$_clase_terapeuticaNombre;
            }
      
          
    public function Agregar_Clases_Terapeuticas()
     {
        
      $con = new ConexionDB();
     
      $con->conectar();
       
      $_clase_terapeuticaNombre= mysql_real_escape_string($this->_clase_terapeuticaNombre);      
      
      $query= mysql_query("INSERT INTO previsiones(Nombre,rut) VALUES ('$_clase_terapeuticaNombre',)");
      
      if($query)
      {
          echo "Clase Terapeutica $this->_clase_terapeuticaNombre Agregada con exito";   
      }
      else
      {
          die('Error: ' . mysql_error()); 
      }
      $con->desconectar();
    }
    public function Eliminar_Clases_Terapeuticas()
     {
        
      $con = new ConexionDB();
     
      $con->conectar();
                  
      $_clase_terapeuticaNombre = mysql_real_escape_string($this->_clase_terapeuticaNombre);
      
      if($_clase_terapeuticaNombre)
      {
      $query= mysql_query("DELETE FROM Clases_Terapeuticas WHERE rut = 'ID';");
      }
      if($query)
      {
          echo "Clase Terapeutica Eliminada con exito";   
      }
      else
      {
          die('Error: ' . mysql_error());         
      }
      $con->desconectar();
                  }                  
    public function Modificar_Clases_terapeuticas()
     {       
      $con = new ConexionDB();
     
      $con->conectar();
                  
      $_clase_terapeuticaNombre = mysql_real_escape_string($this->_clase_terapeuticaNombre);
      
      $query= mysql_query("UPDATE  Clases_Terapeuticas SET  Nombre =  $_clase_terapeuticaNombre WHERE  rut = 'ID';");
      
      if($query)
      {          
          echo "Clase Terapeurtica $this->_clase_terapeuticaNombre Actualizada con exito";         
      }
      else
      {
          die('Error: ' . mysql_error());         
      }     
      $con->desconectar();
    }
    
}


?>