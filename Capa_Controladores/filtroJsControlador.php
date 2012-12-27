<?php

/*
 * Archivo de pruebas para verificar envío de formulario de ingreso vía ajax
 * @author: Cesar Gonzalez
 */
require '../CRUD_INTERNO/formularioExterno.php';//funcion creacionFormularios($arreglo)
require '../CRUD_INTERNO/vistaEjemplo.php'; // funcion visualizacionTabla($arreglo)
require '../Capa_Controladores/seleccionarControlador.php';

if($_POST['Accion']==3){
    creacionFormularios($arreglo); 
}
else{
   visualizacionTabla($arreglo);}
?>





