<?php

/**
 * Se verifica la combinacion clave/rut/id del paciente y si son correctos se ingresan a la sesion. Luego se muestra estado. Input (POST) int clave int hRUN int hID Output: estado final de verificacion
 * 
 * @author PErro
 * @package Default
 */

include_once("../Capa_Controladores/persona.php");
include_once('../Capa_Controladores/consulta.php');

session_start();

$codigo = $_POST['clave'];
$rut = $_POST['hRUN'];
$id = $_POST['hID'];

if (!Persona::VerificarPIN($rut, $codigo)) {
    echo "0";
} else {
    // include_once('../Capa_Controladores/prestadorSalud.php');
    // si la clave es aceptada, se crea una consulta
    //informacion del paciente
    $_SESSION['RUTPaciente'] = $rut;
    $_SESSION['idPaciente'] = $id;

    //obtenemos el id del prestador de salud correspondiente a esa Plaza
    /*
      $prestadores= PrestadorSalud::obtenerPrestadorconPlaza($_SESSION['institucionLog'][0]);

      $_SESSION['prestadores_salud']= $prestadores;
     */

    //insertamos la nueva consulta
    if ($_SESSION['idMedicoLog'] != false) {

        $_SESSION['idConsulta'] = Consulta::Insertar($_SESSION['idMedicoLog'][0], $_SESSION['idPaciente'][0], $_SESSION['logLugar']['idLugar']);
    }
    if ($_SESSION['idFuncionarioLog'] != false) {
        
    }
    // buscamos el id de la consulta insertada y lo guardamos como session para poder utilizarlo para agregar
    // nuevos diagnosticos o medicamenentos

    echo "1";
}



?>
