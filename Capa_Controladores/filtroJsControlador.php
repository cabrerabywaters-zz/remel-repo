<?php

/*
 * Archivo de pruebas para verificar envío de formulario de ingreso vía ajax
 * @author: Cesar Gonzalez
 */
$_POST['nombre_region']="";
$_POST['id']="";
$_POST['numero_region']="";

include '../CRUD_INTERNO/formularioExterno.php'; //creacionFormularios($arreglo)
include '../CRUD_INTERNO/vistaEjemplo.php'; // visualizacionTabla($arreglo)
include '../Capa_Controladores/seleccionarControlador.php';

if($_POST['form']==0){
    visualizacionTabla($arreglo);
}
else{
    creacionFormularios($arreglo);
}
?>


