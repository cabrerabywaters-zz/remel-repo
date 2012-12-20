<?php

/*
 * Archivo de div contenido aqui se mostrarán la informacion de cada tabla para ver, editar o agregar un
 * nuevo elemento
 * @author: Cesar Gonzalez
 */
?>
<div class="row-fluid">
    <div class="span8 offset1" id="menu-contenido"><!-- menu por tabla-->
        <a class="btn btn-inverse">Agregar nuevo</a>
   </div><!-- fin div menu por tabla-->
   
    <div class="span10" id="contenido">

<?php // aqui se incluye el formulario o la vista correspondiente
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
creacionFormularios($arreglo);
?>
        <script ref="text/javascript" src="js/validarFormExterno.js"></script>  
    </div>
</div>