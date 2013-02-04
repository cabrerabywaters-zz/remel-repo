<?php
include_once(dirname(__FILE__).'/Capa_Controladores/comuna.php');


$comuna = Comuna::BuscarComunaPorNombre('VIÑA DEL MAR');
print_r($comuna);


?>