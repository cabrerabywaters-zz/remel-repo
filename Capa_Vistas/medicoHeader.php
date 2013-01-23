<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <?php
        // donde estan ubicadas las variables que se despliegan en la base del proyecto
        include(dirname(__FILE__)."/informacionPaciente.php");
        ?>  
        <!-- styles -->       
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap-->
        <link href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" rel="stylesheet"><!-- css bootstrap-->
        
        <style> 
        /* Estilos de cargando de la barra respectiva*/
        .ui-autocomplete-loading {
        background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style><!-- estilo loading -->
        <style type="text/css">
        
       body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: white;
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
            
            
            background-color: white;
            
        }
        
        
         .modal{
          
           border: 5px solid #efdcc8;
      }
     .modal-header, .modal-footer{
           
           background-color: whitesmoke;
      }
      .modal-body{
          background-color: white;
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
        <script src="http://code.jquery.com/jquery-latest.js"></script><!-- CDN jquery-->
        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script></script><!-- CDN jquery tools-->
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script><!-- CDN jquery UI-->
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script></script><!-- CDN bootstrap-->
        <!-- fin script js externos -->
        <script> $(document).ready(function(){$('.datepicker').datepicker();});</script>   
    </head>
    <body>
        
        <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-color: whitesmoke"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: whitesmoke"> <!-- div de la informacion del medico -->
                    <img class="img-rounded pull-left" src="<?php echo $medico['Foto']; ?>" style="width: 140px; height: 140px;">
                    <blockquote></blockquote><center>
                    <strong>Informacion Medico:<br></strong> 
                   <?php echo "Dr.<br> ".$medico['Nombre']." ".$medico['Apellido_Paterno'];?>
                    </center></blockquote>
                </div> <!-- div de la informacion del medico -->
                
                <div class="img-rounded span6" style=" background-color:white"> <!-- informacion de la institucion  -->
                    <center><h2><?php 
					$lugar=$_SESSION['logLugar']; 
					echo $lugar['nombreLugar'].", ".$lugar['nombreSucursal'];					
					
                    // esto se puede eliminar si es que no van a utilizar el span para agregar algo
                     echo   ' <span id="consulta" style="VISIBILITY:hidden;display:none">'.$_SESSION['idConsulta'].'</span>'; 
                                         ?>
                            </h2>
                    </center>
                </div> <!-- informacion de la institucion  --> 
                
                <div class="span3 pull-right img-rounded" style=" background-color: whitesmoke"><!-- información del paciente -->
                    <img class="img-rounded pull-right" src="<?php echo $paciente['Foto']; ?>"  style="width: 140px; height: 140px;">
                    <blockquote><center>
                     <!-- validación del rut ingresado -->
                    <strong>Paciente:<br></strong><table>
                    <tr><td><?php 
					if($paciente['Sexo']=="1")
					{
					echo " Sr.<br>".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ";	
					}
					else
					{
						echo " Sra.<br>".$paciente['Nombre']." ".$paciente['Apellido_Paterno']."";
					}
				echo '</td></tr><tr><td>';
                                       $cadena=$_SESSION['RUTPaciente'];
                  include("Medico/AtencionPaciente/recomponerRUT.php");				
 
					$array_rut_sin_guion = explode('-',$valor); // separamos el la cadena del digito verificador.
					$rut_sin_guion = $array_rut_sin_guion[0]; // la primera cadena
					$digito_verificador = $array_rut_sin_guion[1];// el digito despues del guion.
					if ($digito_verificador==0)
					{
					$cantidad = strlen($rut_sin_guion); //8 o 7 elementos
					for ( $i = 0; $i < $cantidad; $i++)//pasamos el rut sin guion a un vector
   					 {
  					  $rut_array[$i] = $rut_sin_guion{$i};
					 }  
 
 
					$i = ($cantidad-1);
					$x=$i;
					for ($ib = 0; $ib < $cantidad; $ib++)
					// ingresamos los elementos del ventor rut_array en otro vector pero al reves.
  						{
   						 $rut_reverse[$ib]= $rut_array[$i];
    					 $rut_reverse[$ib];
 							$i=$i-1;
    					}
  
						$i=2;
						$ib=0;
						$acum=0; 
						   do
   						 {
						 if( $i > 7 )
  						 {
 						  $i=2;
  						 }
 						  $acum = $acum + ($rut_reverse[$ib]*$i);
 						 $i++;
 						 $ib++;
						 }
						 while ( $ib <= $x);
 
						$resto = $acum%11;
						$resultado = 11-$resto;
						if ($resultado == 11) { 
						$resultado=0; }
						if ($resultado == 10) { $resultado='k'; }
						if ($digito_verificador == 'k' or $digito_verificador =='K')
						 { $digito_verificador='k';}
 
						if ($resultado == $digito_verificador)
   						 {
 						return true;
						 }
						 else
						 {
								$cadena=$rut_sin_guion;
								$lugar=(strlen($cadena)-3);
								$insertar = ".";
								$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
								$cadena=$resultado;
								$lugar=(strlen($cadena)-7);
								$insertar = ".";
								$resultado = substr($cadena, 0, $lugar) . $insertar . substr($cadena, $lugar); 
						 echo "".$resultado."-K";
						 }

					}
					else
					{ 
					echo $valorfinal;
					}
					
					 ?></td></tr></table>

                    </center></blockquote>
                </div> <!-- información del paciente -->
            </div><!-- cierre div superior-->
            
            <div class="tabbable-fluid"><!-- div contenido --> 
                
                <ul class="nav nav-tabs img-rounded" style="background: rgb(242,245,246); /* Old browsers */
background: -moz-linear-gradient(45deg,  rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* IE10+ */
background: linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
"><!-- barra de navegacion -->
                    <li class="active img-rounded"><a href="#tabHistorial" data-toggle="tab">Historial del Paciente</a></li>
                    <li><a href="#tabConsulta" data-toggle="tab">Recetar</a></li>
                      <li><a href="#" id="toggleFav"><i class="icon-star"></i>Favoritos</a></li>
                      <li><a href="#" id="toggleArsenal"><i class="icon-list"></i>Arsenal</a></li>
                      <li><a href="#" data-toggle="tab">Imprimir Receta</a></li>
                    <li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Volver <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                        <li><a href="../doctorIndex.php">Volver al Menú</a></li>
                        <li><a href="../logout.php">Salir</a></li>
                        </ul>
                    </li>
                    
                </ul><!-- aquí termina lo que hay en la barra navegacion-->
