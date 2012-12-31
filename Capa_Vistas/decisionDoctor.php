<!DOCTYPE html>
<?php

include '../sessionCheck.php';

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
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #CDD9AE;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #B6DEDB;
        border: 3px solid #DCF1EF;
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
    <script src="../js/bootstrap.js"></script>
    <script>
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

      <form class="form-signin" action="Medico/doctorIndex.php" method="post">
        <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
        <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>
        
        <button type="button" class="btn btn-warning btn-block btn-large" data-toggle="collapse" data-target="#demo"><i class="icon-chevron-down icon-white"></i> Ingresar como Médico</button>
            <div id="demo" class="collapse" data-parent="#ingresoMedico">
                <button class="btn btn-block" type="submit">Institucion 1</button>
                <button class="btn btn-block" type="submit">Institucion 2</button>
            </div>
        <button class="btn btn-large btn-block" type="button">Ingresar como Paciente</button>
      </form>
        

 
        
    </div> <!-- /container -->



  </body>
</html>
