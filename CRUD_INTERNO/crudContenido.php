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
include "vistaEjemplo.php";
visualizacionTabla($arreglo);
?>
    </div>
</div>