<?php

/* 
 * Descripcion: Insertar una nueva asociacion Paciente-Condicion en la base de
 * datos y devolver el estado final de la insercion.
 * Input (POST)
 * 	int idPacinete
 * Input (SESSION)
 *	int idCondicion
 * Output: Booleano de estado
 */

session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(__FILE__) . '/../Capa_Controladores/pacienteHasCondicion.php');


$idPaciente = $_SESSION['idPaciente'];
$idCondicion = $_POST['idCondicion'];

$insercion = PacienteHasCondicion::Insertar($idPaciente,$idCondicion);
  

    if($insercion)
    {echo '0';}
    else{
        echo '1';
    }


?>
