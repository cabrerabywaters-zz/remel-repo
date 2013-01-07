
<?php /// definitivamente esto no va aca!!
       
		// $alergias=array("Medicamentosas" =>array("Acetil Salicilico","Corticoides","Penisilina"),"Alimentos" =>array("Maricos","Pescados","Carne"),"Ambientales" =>array("Polvo","Polen"));
		// $condiciones=array("Problemas" =>array("Hipertension","Obesidad"),"Habitos" =>array("Fumador","Deportista"));
		// autocompletar de recetas
		$recetas=array("agua","aceite","miel","polen","trigo");
				// consulta a la base de datos del usuario
				include(dirname(__FILE__)."/../Capa_Controladores/alergia.php");
				include(dirname(__FILE__)."/../Capa_Controladores/condicion.php");
				include(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
				include(dirname(__FILE__)."/../Capa_Controladores/persona.php");
				include(dirname(__FILE__)."/../Capa_Controladores/direccion.php");
				include(dirname(__FILE__)."/../Capa_Controladores/comuna.php");
				include(dirname(__FILE__)."/../Capa_Controladores/provincia.php");
				include(dirname(__FILE__)."/../Capa_Controladores/region.php");
				include(dirname(__FILE__)."/../Capa_Controladores/etnia.php");
				include(dirname(__FILE__)."/../Capa_Controladores/prevision.php");
				$RUTMedico=$_SESSION['RUT'];
				$RUTPaciente = $_SESSION['RUTPaciente'];
				$medico = Persona::Seleccionar("WHERE RUN = '$RUTMedico'");
				$medico = $medico[0];
				$paciente1 = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTPaciente'");
				$paciente1 =$paciente1[0]; 
				$paciente2 = Persona::Seleccionar("WHERE RUN = '$RUTPaciente'");
				$paciente2 = $paciente2[0];
				$direccion=$paciente2['Direccion_idDireccion'];
				$direccion = Direccion::Seleccionar("WHERE idDireccion = '$direccion'"); 
				$direccion = $direccion[0];
				$comuna=$direccion['Comuna_idComuna'];
				$comuna = Comuna::Seleccionar("WHERE idComuna = '$comuna'"); 
				$comuna=$comuna[0];
				$provincia=$comuna['Provincias_idProvincia'];
				$provincia = Provincia::Seleccionar("WHERE idProvincia = '$provincia'"); 
				$provincia=$provincia[0];
				$region=$provincia['Regiones_idRegion'];
				$region = Region::Seleccionar("WHERE idRegion = '$region'"); 
				$region=$region[0];
				$etnia=$paciente1['Etnias_idEtnias'];
				$etnia = Etnia::Seleccionar("WHERE idEtnias = '$etnia'"); 
				$etnia=$etnia[0];
				$prevision=$paciente2['Prevision_rut'];
				$prevision=Prevision::Seleccionar("WHERE rut = '$prevision'");
				$prevision=$prevision[0];
				$idPaciente=$paciente1['idPaciente'];
				$condiciones = Paciente::R_CondicionPaciente($idPaciente);
				$alergias = Paciente::R_AlergiaPaciente($idPaciente);
				$paciente = array_merge($paciente1, $paciente2, $direccion);
				$condiciones1=Condicion::Seleccionar('');
				$alergias1=Alergia::Seleccionar('');			
				
				 // fin de la consulta llevar a ajax
				 
			/*****************************
			funcion que corta el string del nombre */
			
			$pos = strpos($medico['Nombre']," ");
			$largo=strlen($medico['Nombre']);
			$corte=$largo - $pos+1;
			$medico['Nombre'] = substr($medico['Nombre'], 0, $corte);
			
			?>