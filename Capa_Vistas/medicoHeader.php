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
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <?php
        // donde estan ubicadas las variables que se despliegan en la base del proyecto
      include(dirname(__FILE__)."/informacionPaciente.php");
?>

        
<script>
    $(function() {
		
        var Alergias = [ <?php
		foreach ($alergias1 as $cantidad)
		{
			foreach($cantidad as $dato)
			{
			echo'"'; echo $dato; echo'"'; echo",";
			}
		}
		?>
        ];
		var Condiciones = [
		<?php foreach ($condiciones1 as $cantidad)
		{
			foreach($cantidad as $dato)
			{
			echo'"'; echo $dato; echo'"'; echo",";
			}
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
        padding-top: 10px;
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
            
            
            background-color: whitesmoke;
            
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
  
    
    
    </head>
    <body>
        
        <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-color: whitesmoke"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: whitesmoke">
                    <img class="img-rounded pull-left" src="<?php echo $medico['Foto']; ?>" style="width: 140px; height: 140px;">
                    <blockquote>
                    <strong>Informacion Medico:<br></strong> 
                   <?php echo "Dr.<br> ".$medico['Nombre']." ".$medico['Apellido_Paterno'];?>
                    </blockquote>
                </div>
                
                <div class="img-rounded span6" style=" background-color:white">
                    <center><h2><?php 
					$institucion=$_SESSION['institucionLog']; 
					echo $institucion[1];					
					
                    
                     echo   '<br> Consulta N° <span id="consulta">'.$_SESSION['idConsulta'].'</span>'; 
                                         ?>
                            </h2>
                    </center>
                </div>
                
                <div class="span3 pull-right img-rounded" style=" background-color: whitesmoke">
                    <img class="img-rounded pull-right" src="<?php echo $paciente['Foto']; ?>"  style="width: 140px; height: 140px;">
                    <blockquote>
                     <script type="text/javascript">
                //validacion del rut ingresado
                function verificarRut( Objeto )
                {
                    var tmpstr = "";
                     $('#mensaje').html("");
                    var intlargo = Objeto.value
                    if (intlargo.length> 0)
                    {
                        crut = Objeto.value
                        largo = crut.length;
                        for ( i=0; i <crut.length ; i++ )
                        if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
                        {
                            tmpstr = tmpstr + crut.charAt(i);
                        }
                        rut = tmpstr;
                        crut=tmpstr;
                        largo = crut.length;
	
                        if ( largo> 2 )
                            rut = crut.substring(0, largo - 1);
                        else
                            rut = crut.charAt(0);
	
                        dv = crut.charAt(largo-1);
	
                        if ( rut == null || dv == null )
                            return 0;
	
                        var dvr = '0';
                        suma = 0;
                        mul  = 2;
	
                        for (i= rut.length-1 ; i>= 0; i--)
                        {
                            suma = suma + rut.charAt(i) * mul;
                            if (mul == 7)
                                mul = 2;
                            else
                                mul++;
                        }
	
                        res = suma % 11;
                        if (res==1)
                            dvr = 'k';
                        else if (res==0)
                            dvr = '0';
                        else
                        {
                            dvi = 11-res;
                            dvr = dvi + "";
                        }
                        if ( dvr != dv.toLowerCase() )
                        {
                            $('#mensaje').html("<span style='color: red'>El rut ingresado no es válido</span>");
                            Objeto.focus();
                            return false;
                        }
                        //alert('El Rut Ingresado es Correcto!')
                        return true;
                    }
                }                       
                $("usuario").validator();
		
		
		    
            </script>
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
                     echo $resultado; ?></td></tr></table>

                    </blockquote>
                </div>
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
