<?php

/*
 * Archivo de div contenido aqui se mostrarán la informacion de cada tabla para ver, editar o agregar un
 * nuevo elemento
 * @author: Cesar Gonzalez
 */
?>
<div class="row-fluid">
    <div class="span8 offset1" id="menu-contenido"><!-- menu por tabla-->
        <a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Agregar Nuevo</a>
    </div><!-- fin div menu por tabla-->
   
    <div class="span10" id="contenido">
    <script ref="text/javascript" src="../js/crudVisualizacion.js"></script>   
<?php 
// aqui se incluye el formulario o la vista correspondiente
// este es un arreglo de ejemplo
$arreglo=array( //arreglo de pruebas
    array("nombre"=>"asdasdas","id"=>2,"fecha"=>"hoflgldfls","dias"=>"juanito"),
    array("nombre"=>"juan","id"=>"pedros","fecha"=>3,"dias"=>4),
    array("nombre"=>"juan","id"=>"pedros","fecha"=>3,"dias"=>4),
    array("nombre"=>"juan","id"=>"pedros","fecha"=>3,"dias"=>4),
    array("nombre"=>"juan","id"=>"pedros","fecha"=>3,"dias"=>4),
    array("nombre"=>"juan","id"=>"pedros","fecha"=>3,"dias"=>4));


require "vistaEjemplo.php"; //funcion que crea la vista de un arreglo
require 'formularioExterno.php'; // funcion que crea el formulario de un arreglo


visualizacionTabla($arreglo);
?>

  
    </div><!-- cierre del contenido!-->
        
    
    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar nuevo Elemento</h3>
  </div>
  <div class="modal-body" id="modal-body">
  </div>
  <div class="modal-footer">
      <div class="span8" id="status"></div> <!-- en este div va la respuesta del ajax --> 
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="cerrar">Cerrar</button>
    <a class='btn btn-inverse' id='agregar'>Agregar</a>
  </div><!-- end modal-footer -->
        <script ref="text/javascript" src="../js/crudValidarFormExterno.js"></script>  
  </div><!-- end Modal -->

</div>
