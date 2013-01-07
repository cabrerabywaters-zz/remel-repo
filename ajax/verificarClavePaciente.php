<?php
        include_once(dirname(__FILE__)."/../Capa_Controladores/persona.php");
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
               
               //insertamos la nueva consulta
        
               Consulta::InsertarAlternativo($_SESSION['fechaConsulta'],$_SESSION['idMedicoLog'][0], $_SESSION['idPaciente'], $prestadores, $_SESSION['institucionLog'][0]);
                // buscamos el id de la consulta insertada y lo guardamos como session para poder utilizarlo para agregar
               // nuevos diagnosticos o medicamenentos
       
               
             $id_consulta = Consulta::SeleccionarID($_SESSION['idMedicoLog'][0],  $_SESSION['idPaciente'], $_SESSION['fechaConsulta'], $prestadores, $_SESSION['institucionLog'][0]);
               
             foreach ($id_consulta as $idc)
             {
                 $_SESSION['idConsulta']= $idc['Id_consulta'];
             }
             
             
             echo "1";
                
                
           
            
           
		
	}
?>
