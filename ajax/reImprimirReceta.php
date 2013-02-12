<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('../Capa_Controladores/receta.php');
   
   $consulta=$_REQUEST['consulta'];
   $tipo = $_REQUEST['tipo'];
   
   
   if($tipo == "a") {
   
   $recetas = receta::SeleccionarDatosReimpresionxidConsulta($consulta);
  foreach($recetas as $receta){
      echo $receta['idReceta'];
      
  }
   }

?>
