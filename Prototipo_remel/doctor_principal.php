<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ingresar-Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="bootstrap_js/js/bootstrap-modal.js"></script>
             <script src="bootstrap_js/js/bootstrap-collapse.js"></script>
            
             <script>
               $(document).ready(function(){
  $("#info").click(function(){ 
       
       $('#info').removeClass('badge badge-info'); 
       $('#clave').collapse('show')
  $('#info').addClass('badge badge-important');
 

  }); 
  
  
  
 });
                 </script>
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    
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
      
      a:link {text-decoration: none;
      color:white}
a:visited {text-decoration: none;
color:white}
a:active {text-decoration: none;
color:white}

    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

      
  </head>

  <body>

    <div class="container-fluid">

      <form class="form-signin" action="atendiendo_paciente.php">
        <h2 class="form-signin-heading"><center>Opciones</center>   </h2>
         <h5 class="form-signin-heading"><center>Seleccione que desea hacer</center>   </h5>
        <!-- Button to trigger modal -->
        <a href="#myModal" role="button" class="btn btn-large btn-block btn-warning" data-toggle="modal">Atender a un Paciente</a>
        <button class="btn btn-large btn-block" type="button">Ver Pacientes Atendidos</button>
        <button class="btn btn-large btn-block " type="button">Consultar medicamentos</button>
        <button class="btn btn-large btn-block" type="button">Consultar Diagnósticos</button>
        <button class="btn btn-large btn-block " type="button">Ver historial de Atenciones</button>
        <button class="btn btn-large btn-block" type="button">Otros</button>
      </form>

    </div> <!-- /container -->

   

 

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Paciente</h3>
  </div>
  <div class="modal-body">
      <strong><p>Ingrese el Rut del Paciente</p></strong>
    <form class="form-search">
  <div class="input-append">
    <input type="text" class="span2 search-query">
    <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion">Buscar</button>  <br>
    
   
    <div id="informacion" class="collapse" > <span id="info" class="badge badge-info">  <a  href="#collapseTwo">Ignacio Cabrera Bywaters </a></span></div>
  </div>
    </form>
    
      <div id="clave" class="collapse" ><strong>Ingrese Clave :</strong> <center> <input type="text" placeholder="Ingrese Clave Del Paciente"></center> </div>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Atender Paciente</a>

  </div>
  
    
    
</div>
    


  </body>
</html>