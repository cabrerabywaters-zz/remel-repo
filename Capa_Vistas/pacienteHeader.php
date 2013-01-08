<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>

        <?php
        // donde estan ubicadas las variables que se despliegan en la base del proyecto
        include(dirname(__FILE__) . "/informacionVistaPaciente.php");
        ?>


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
    
    
    <!--de aqui en adelante es pura prueba-->
    
    <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-color: whitesmoke"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: whitesmoke">
                    <img class="img-rounded pull-left" src="<?php echo $paciente['Foto']; ?>" style="width: 140px; height: 140px;">
                </div>
                
                <div class="img-rounded span6" style=" background-color:white">
                    <center><h2><?php echo $paciente['Nombre']." ".$paciente['Apellido_Paterno'];?>
                            </h2>
                    </center>
                </div>
            </div>
    </div>
    <? echo 'semen';?>





