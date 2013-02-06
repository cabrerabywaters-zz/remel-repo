<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title><!-- styles -->
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">

        <style> 
            /* Estilos de cargando de la barra respectiva*/
            .ui-autocomplete-loading {
                background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style>
        <!-- estilo de la pagina -->
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
        <script type="text/javascript" charset="utf8" src="../../js/jquery.dataTables.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <!-- script de google charts -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <?php
        // donde estan ubicadas las variables que se despliegan en la base del proyecto
        include(dirname(__FILE__) . "/informacionVistaPaciente.php");
        ?>
			<!-- scripts de google con php -->
			<?php include(dirname(__FILE__)."/Paciente/scriptTorta.php"); 
	 			  include(dirname(__FILE__)."/Paciente/scriptLinea.php");
				  include(dirname(__FILE__)."/Paciente/scriptBarra.php");
			?>
    	</head>
    
    
    <!--de aqui en adelante es pura prueba-->
    
    <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-color: whitesmoke"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: whitesmoke"><!-- despliega la foto del paciente -->
                    <img class="img-rounded pull-left" src="<?php echo $paciente['Foto']; ?>" style="width: 140px; height: 140px;">
                </div><!-- cierre del despliege de la foto -->
                
                <div class="img-rounded span6" style=" background-color:white"><!-- despliega el nombre del usuario -->
                    <center><h2><?php echo $paciente['Nombre']." ".$paciente['Apellido_Paterno']." ". $paciente['Apellido_Materno'];?>
                            </h2>
                    </center>
                </div><!-- cierre despliege del nombre del usuario -->
            </div><!-- cierre div superior -->
 
    <!-- stilos de diseño de la bara de navegacion y la pagina -->
    <ul class="nav nav-tabs img-rounded" id="navegador" style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><!-- barra de navegacion -->
<!-- Acá se redirige a distintos tabs colapsables, de los cuales solo historial está listo 
                         Los href hacen referencia a los tabs en paginaPaciente.php -->
                    <li class="active img-rounded"><a href="#tabInfoPersonal" data-toggle="tab">Información Personal</a></li>
                     <li><a href="#tabRecetas" data-toggle="tab">Mis Recetas Históricas</a></li>
                      <li><a href="#tabHistorialMedico" data-toggle="tab">Mis Médicos</a></li>
                      	<li><a href="#infoRelevante" data-toggle="tab">Mis Estadisticas</a></li>
                      	<li><a href="#calendario" data-toggle="tab">Calendario</a></li>
                      	<li><a href="#medicamentos" data-toggle="tab">Medicamentos</a></li>
			<li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Volver <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                        <li><a href="../decision.php">Volver al Menú</a></li>
                        <li><a href="../Medico/logout.php">Salir</a></li>
                        </ul>
                    </li> 
                      
                      </ul>
        





