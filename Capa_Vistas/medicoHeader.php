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
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">     
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
        padding-top: 0px;
        padding-bottom: 40px;
       background: rgb(255,255,255); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */

    }
    .dropdown-menu{
        z-index: 1040;
    }
    .dropdown{
        z-index: 1040;
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
            background-color: white;}
        
        
    .modal{
           border: 5px solid #0b72b5;
      }
    .modal-header, .modal-footer{
          background-color: whitesmoke;
      }
    .modal-body{
          background-color: white;
          border: 3px solid #0b72b5;
          max-height: 600px;
          overflow-y: scroll;
      }
        
    .modal-body a:link {text-decoration: none;
      color:white}
    .modal-body a:visited {text-decoration: none;
      color:white}
    .modal-body a:active {text-decoration: none;
      color:white}
    
    #navegador a{
        
      color: white;
      
 background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */

   
    }
     #navegador a:hover{
        
         background: #414040;
      
         
    }
    #navegador a{
   
        border-color: white;
        border-style: solid;
    } 
   
</style><!-- fin estilo de la pagina -->
  
        <!-- scripts js externos --> 
<script src="http://code.jquery.com/jquery-latest.js"></script><!-- CDN jquery-->
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script><!-- CDN jquery tools-->
<script type="text/javascript" charset="utf8" src="../../../js/jquery.dataTables.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script><!-- CDN jquery UI-->
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script><!-- CDN bootstrap-->
	<!-- script para el despliege de los datatables -->
        
		
        <!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->
        <!-- fin script js externos -->
        <script> $(document).ready(function(){$('.datepicker').datepicker({ dateFormat: "mm/dd/yy" });});</script>   
    </head>
    <body>
        
        <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-image: linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -o-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -moz-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -webkit-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -ms-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.94, rgb(28,117,189)),
	color-stop(0.74, rgb(28,117,189)),
	color-stop(0.87, rgb(28,117,189))
);
"> <!--div superior-->
                <div class="span3 img-rounded" style=" color: white;background-image: linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -o-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -moz-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -webkit-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -ms-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.94, rgb(28,117,189)),
	color-stop(0.74, rgb(28,117,189)),
	color-stop(0.87, rgb(28,117,189))
);
"> <!-- div de la informacion del medico -->
                    <img class="img-rounded pull-left" src="<?php echo $medico['Foto']; ?>" style="width: 180px; height: 180px;">
                    <blockquote><center>
                    <strong>Información Médico<br></strong> 
                   <?php echo "Dr.<br> ".$medico['Nombre']." ".$medico['Apellido_Paterno'];?>
                    </center></blockquote>
                </div> <!-- div de la informacion del medico -->
                
                <div class="img-rounded span6" style="color: white;"> <!-- informacion de la institucion  -->
                     <center> <img class="img-rounded " src="../../../imgs/logo-remel.png" style="width: 200px; height: 120px;"></center>
                    <center><h2><?php 
					$lugar=$_SESSION['logLugar']; 
					echo "</center><h2>"."<center>".$lugar['nombreSucursal']."</h2></center>";					
					
                    // esto se puede eliminar si es que no van a utilizar el span para agregar algo
                                        
                     echo   ' <span id="consulta" style="VISIBILITY:hidden;display:none">'.$_SESSION['idConsulta'].'</span>'; 
                                         ?>
                           
                            </h2>
                    </center>
                </div> <!-- informacion de la institucion  --> 
                
                <div class="span3 pull-right img-rounded" style=" color: white;background-image: linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -o-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -moz-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -webkit-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -ms-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.94, rgb(28,117,189)),
	color-stop(0.74, rgb(28,117,189)),
	color-stop(0.87, rgb(28,117,189))
);
"><!-- información del paciente -->
                    <img class="img-rounded pull-right" src="<?php echo $paciente['Foto']; ?>"  style="width: 180px; height: 180px; background-color: #26abe0;">
                   <center>
                     <!-- validación del rut ingresado -->
                    <strong>Información Paciente<br></strong><table>
                    <tr><td><?php 
					if($paciente['Sexo']=="1")
					{
					echo " <center>Sr.</center>".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ";	
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
					echo "<center>".$valorfinal."</center>";
					}
					
					 ?></td></tr></table>

                    </center>
                </div> <!-- información del paciente -->
            </div><!-- cierre div superior-->
            
            <div class="tabbable-fluid"><!-- div contenido --> 
                
                <ul class="nav nav-tabs img-rounded"  id="navegador" style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><!-- barra de navegacion -->
                    <li class="active img-rounded"><a id="historial" href="#tabHistorial" data-toggle="tab"><strong>Historial del Paciente</strong></a></li>
                    <li id="consultaToggle"><a id="recetar" href="#tabConsulta" data-toggle="tab"><strong>Recetar</strong></a></li>
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
                    <li class="pull-right"><a href="#tabCalculadora"  id="calculadoras" data-toggle="tab"><strong>Calculadoras</strong></a></li>
                    <li class="pull-right"><a href="#" id="toggleFav"  id="favoritos"><i class="icon-star"></i> <strong>Favoritos</strong></a></li>
                   
                    <li class="pull-right">  <?php
                        $lugar=$_SESSION['logLugar']; 
					echo "<center><h5> Lugar de Atención: ".$lugar['nombreLugar']." &nbsp &nbsp &nbsp ";
                        ?></li>
                </ul><!-- aquí termina lo que hay en la barra navegacion-->
                <script>
                    //redefinir fondo al hacer click en historial
                    $("#historial").click(function() {
                            $(this).css("background", "#414040");
                            $('#recetar').css("background", "");
                             $('#calculadoras').css("background", "");
                              });
                     //redefinir fondo al hacer click en receta
                                 $("#recetar").click(function() {
                            $(this).css("background", "#414040");
                            $('#historial').css("background", "");
                             $('#calculadoras').css("background", "");
                              });
                              
                                 //redefinir fondo al hacer click en favoritos
                           $("#favoritos").click(function() {
                            $(this).css("background", "#414040");
                            
                              });
                              
                              $(document).ready(function() {
 $('#historial').css("background", "#414040");
});
                    </script>
                    
                