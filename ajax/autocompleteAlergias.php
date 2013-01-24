<?php
session_start();
include_once('../Capa_Controladores/alergia.php');


$alergias = Alergia::BuscarAlergiaLike($_POST['name_startsWith'],$_SESSION['idPaciente']);

echo json_encode($alergias);

?>
