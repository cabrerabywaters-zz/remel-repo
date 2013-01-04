<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title><!-- styles -->
        
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
        <style> 
        /* Estilos de cargando de la barra respectiva*/
        .ui-autocomplete-loading {
        background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style>
        <style type="text/css">
        
       body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #efefc8;
      }
        
        ul.nav, .nav{
            
             background: whitesmoke;
        }
        .tabbable-fluid{
            
           
        }
        .tab-content{
            
            
        }
        .tab-pane
        {
            
            
            background-color: #B6DEDB;
            
        }
        
        
         .modal{
          
           border: 5px solid #efdcc8;
      }
     .modal-header, .modal-footer{
           
           background-color: #efefc8;
      }
      .modal-body{
          background-color: #fafaf0;
          border: 3px solid #efdcc8;
      }
        
        
        
         .modal-body a:link {text-decoration: none;
      color:white}
.modal-body a:visited {text-decoration: none;
color:white}
.modal-body a:active {text-decoration: none;
color:white}
        
    </style><!-- fin estilo de la pagina -->
  
        <!-- scripts js externos -->       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <?php
		 $alergias=array("Medicamentosas" =>array("Acetil Salicilico","Corticoides","Penisilina"),"Alimentos" =>array("Maricos","Pescados","Carne"),"Ambientales" =>array("Polvo","Polen"));
		 $condiciones=array("Problemas" =>array("Hipertension","Obesidad"),"Habitos" =>array("Fumador","Deportista"));
		 $alergias1=array("agua","aceite","miel","polen","trigo");
		$condiciones1=array("agua","aceite","miel","polen","trigo");
		$recetas=array("agua","aceite","miel","polen","trigo");
                $institucion=array("Rut"=>"123456","Nombre" => "Hospital Regional Rancagua","..." => "...");
				// consulta a la base de datos del usuario
				include(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
				include(dirname(__FILE__)."/../Capa_Controladores/persona.php");
				$RUTMedico=$_SESSION['RUT'];
				$RUTPaciente = $_SESSION['RUTPaciente'];
				$medico = Persona::Seleccionar("WHERE RUN = '$RUTMedico'")[0];
				

				$paciente1 = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTPaciente'")[0];

				$paciente2 = Persona::Seleccionar("WHERE RUN = '$RUTPaciente'")[0];

				$paciente = array_merge($paciente1, $paciente2);
				/***************************************/ // fin de la consulta llevar a ajax
		?>
        
<script>
    $(function() {
		
        var Alergias = [ <?php
		foreach ($alergias1 as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}
		?>
        ];
		var Condiciones = [
		<?php foreach ($condiciones1 as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}?>
		];
			var Recetas = [
		<?php foreach ($recetas as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}?>
		 ];
        $( "#Condiciones" ).autocomplete({
            source: Condiciones
        });
		 $( "#Recetas" ).autocomplete({
            source: Recetas
        });
		 $( "#Alergias" ).autocomplete({
            source: Alergias
        });
		
    });
    </script>
    
     
        <!-- fin script js externos -->
        
        <!-- styles -->
        
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
        <style> 
        /* Estilos de cargando de la barra respectiva*/
        .ui-autocomplete-loading {
        background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style>
        <style type="text/css">
        
       body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #CDD9AE;
      }
        
        ul.nav, .nav{
            
             background: whitesmoke;
        }
        .tabbable-fluid{
            
           
        }
        .tab-content{
            
            
        }
        .tab-pane
        {
            
            
            background-color: #B6DEDB;
            
        }
        
        
         .modal{
          
           border: 5px solid #DCF1EF;
      }
     .modal-header, .modal-footer{
           
           background-color: #CDD9AE;
      }
      .modal-body{
          background-color: #B6DEDB;
          border: 3px solid #DCF1EF;
      }
        
        
        
         .modal-body a:link {text-decoration: none;
      color:white}
.modal-body a:visited {text-decoration: none;
color:white}
.modal-body a:active {text-decoration: none;
color:white}
        
    </style><!-- fin estilo de la pagina -->
  
    
    
    </head>
    <body>
        
        <div class="container-fluid">
            
            <div class="row-fluid img-rounded" style="background-color: #B6DEDB"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: #DCF1EF">
                    <img class="img-rounded pull-left" src="../../../imgs/dr-house.jpg" style="width: 140px; height: 140px;">
                    <blockquote>
                    <strong>Mi Informacion:<br></strong> 
                   <?php if($medico['Sexo']=="1")
					{
					echo " Dr. ".$medico['Apellido_Paterno']." ";	
					}
					else
					{
						echo " Dra. ".$medico['Apellido_Paterno']."";
					 }?>
                    </blockquote>
                </div>
                
                <div class="img-rounded span6" style=" background-color: #DCF1EF">
                    <center><h2><?php echo $institucion['Nombre']; ?></h2></center>
                </div>
                
                <div class="span3 pull-right img-rounded" style=" background-color: #DCF1EF">
                    <img class="img-rounded pull-right" src="../../../imgs/sabina.jpg"  style="width: 140px; height: 140px;">
                    <blockquote>
                    <strong>Paciente:<br></strong><table>
                    <tr><td><?php 
					if($paciente['Sexo']=="1")
					{
					echo " Sr. ".$paciente['Apellido_Paterno']." ";	
					}
					else
					{
						echo " Sra. ".$paciente['Apellido_Paterno']."";
					}
				echo '</td></tr><tr><td>';
                                       $cadena=$_SESSION['RUTPaciente'];
                  include("Medico/AtencionPaciente/recomponerRUT.php");
                     echo $resultado; ?></td></tr></table>

                    </blockquote>
                </div>
            </div><!-- cierre div superior-->
            
            <div class="tabbable-fluid"> 
                
                <ul class="nav nav-tabs img-rounded"><!-- barra de navegacion -->
                    <li class="active img-rounded"><a href="#tabHistorial" data-toggle="tab">Historial</a></li>
                    <li><a href="#tabConsulta" data-toggle="tab">Consulta</a></li>
                    <li class="dropdown img-rounded">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Opciones <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                            <li><a href="#">Favoritos</a></li>
                            <li><a href="#">Imprimir Receta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Volver <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                        <li><a href="../doctorIndex.php">Volver al menu</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul><!-- aquí termina lo que hay en la barra navegacion-->
