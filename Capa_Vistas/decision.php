<!DOCTYPE html>
<?php
/*
 * Pagina de decision de un usuario a elegir su perfil de entrada. se ignora si el usuario es solo paciente
 * input: id de Medico o Funcionario en caso de existir
 * output: ninguno, se traslada a otra pagina
 */

include '../ajax/sessionCheck.php';
include_once(dirname(__FILE__) . '/../Capa_Controladores/sucursalesHasFuncionarios.php');
include_once(dirname(__FILE__) . '/../Capa_Controladores/funcionario.php');

iniciarCookie();
verificarIP();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ingresar-Remel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fafaf0;
                border: 3px solid #0b72b5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;

            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" rel="text/javascript"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <script>
            /**
             * funcion que al hacer click en el boton del acordeon cambia el icono
             * de la flecha
             */
            $(document).ready(function(){
                $('button[data-toggle="collapse"]').click(function(){
                    if($('button[data-toggle="collapse"] i').hasClass('icon-chevron-down icon-white'))
                    {
                        $('button[data-toggle="collapse"] i').removeClass();
                        $('button[data-toggle="collapse"] i').addClass('icon-chevron-up icon-white');}
                    else{
                        $('button[data-toggle="collapse"] i').removeClass();
                        $('button[data-toggle="collapse"] i').addClass('icon-chevron-down icon-white');}
            
                }); //end click
            }); // end ready
    
        </script>  
    </head>

    <body>
        <div class="container-fluid">

            <form class="form-signin" >
                <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
                <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>

        <?php
            if ($_SESSION['idMedicoLog'] != false){
                include_once(dirname(__FILE__) . '/opcionesMedico.php');
            }
            if ($_SESSION['idFuncionarioLog'] != false){
                include_once(dirname(__FILE__) . '/opcionesFuncionario.php');
            }
        ?>

                
                
                <button class="btn btn-large btn-block" onClick="redireccionar()" type="button">Perfil Paciente</button>

                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </form>



        </div> <!-- /container -->



    </body>
</html>
<script language="javascript">
    
    function redireccionar(){
        window.location.href = 'Paciente/paginaPaciente.php'; 
   }
    
</script>
