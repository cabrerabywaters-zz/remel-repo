<?php

/**
 * Descripcion: Entrega tod
 * FALSE DONT KNOW WHAT THE FUCK HAPPENS HERE
 * TODO: Explicar porque para obtener Favoritos se necesita idMedicamento
 * Este ajax no lo hice yo (german)
 */

session_start();

include_once(dirname(__FILE__)."/../Capa_Controladores/favoritosRp.php");

$idMedico = $_SESSION['idMedicoLog'][0];
$idMedicamento = $_POST['idMedicamento'];

$favoritos = FavoritosRp::R_obtenerFavoritoRP($idMedicamento, $idMedico);

echo json_encode($favoritos);
                

?>
