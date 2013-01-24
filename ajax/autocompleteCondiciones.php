<?php
session_start();
include_once('../Capa_Controladores/condicion.php');


$condicion = Condicion::BuscarCondicionLike($_POST['name_startsWith'],$_SESSION['idPaciente']);


echo json_encode($condicion);

?>
