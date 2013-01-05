<?php
        include_once("../Capa_Controladores/persona.php");
	session_start();

	$codigo = $_POST['clave'];
	$rut = $_POST['hRUN'];
	$id = $_POST['hID'];	

	if(!Persona::VerificarPIN($rut,$codigo)){
		echo "0";
	}
	else{
             include_once('../Capa_Controladores/prestadorSalud.php');
            // si la clave es aceptada, se crea una consulta
              //informacion del paciente
		$_SESSION['RUTPaciente'] = $rut;
		$_SESSION['idPaciente'] = $id;
                
               
                $_SESSION['fechaConsulta']= date("Y-m-d H:i:s"); 
                     
                  //obtenemos el id del prestador de salud correspondiente a esa Plaza
             
                $prestadores= PrestadorSalud::obtenerPrestadorconPlaza($_SESSION['institucionLog'][0]);
                
                $_SESSION['prestadores_salud']= $prestadores;
                  
               include_once('../Capa_Controladores/consulta.php');
        
               Consulta::InsertarAlternativo($_SESSION['fechaConsulta'],$_SESSION['idMedicoLog'][0], $_SESSION['idPaciente'], $prestadores, $_SESSION['institucionLog'][0]);
                
       
                echo "1";
                
                
           
            
           
		
	}
?>
