<?php
session_start();

include_once(dirname(__FILE__)."/../Capa_Controladores/favoritosRp.php");

$idMedico = $_SESSION['idMedicoLog'];
$idMedicamento = $_POST['idMedicamento'];

$favoritos = FavoritosRp::R_obtenerFavoritoRP($idMedicamento, $idMedico);

echo json_encode($favoritos);
                

?>
