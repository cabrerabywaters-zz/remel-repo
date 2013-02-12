<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once('../Capa_Controladores/receta.php');
   //tomando el id de consulta se arma el arreglo con todas las caracteristicas de la receta
// y luego se devuelve a RecetasVigentes.php
   $consulta=$_REQUEST['consulta'];
   $tipo = $_REQUEST['tipo'];
   
   
   if($tipo == "a") {
   
   $recetas = receta::SeleccionarDatosReimpresionxidConsulta($consulta);
  foreach($recetas as $receta){
     $arreglo[] =  $receta['idReceta'];
      
  }
      echo json_encode($arreglo);
 
   }

?>
