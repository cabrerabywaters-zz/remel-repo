<!DOCTYPE html>
<?php
include '../../sessionCheck.php';

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
      <link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../../js/jquery.tools.min.js"></script>
            <script src="../../bootstrap_js/js/bootstrap-modal.js"></script>
             <script src="../../bootstrap_js/js/bootstrap-collapse.js"></script>
            
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
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
    
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
    <link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

      
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
        <a href="../decisionDoctor.php" class="btn btn-large btn-block btn-warning" role="button">Cambiar insitucion</a>
	<a href="logout.php" role="button" class="btn btn-large btn-block btn-danger">Logout</a>
      </form>

    </div> <!-- /container -->

   

 

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Paciente</h3>
  </div>
  <div class="modal-body">
      <strong><p>Ingrese el Rut del Paciente</p></strong>
    <form class="form-search" id="busqueda" method="post" action="javascript:enviar()">
  <div class="input-append">
    <input type="text" class="span2 search-query" name="RUN" required  maxlength="15" pattern="^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$">
    <button class="btn btn" type="submit "data-toggle="collapse" data-target="#informacion">Buscar</button>  <br>
    
   
    <br><div id="informacion" class="collapse" ><span id="info" class="badge badge-info"><a  href="#collapseTwo" id="atenderPaciente"></a></span></div>
  </div>
    </form>
    
      <div id="clave" class="collapse" >
	<form id="verificacionClave" action="javascript:verificarClave()" method="post">
		<strong>Ingrese Clave :</strong> <center> 
		<input type="password" name="clave" required placeholder="Ingrese Clave Del Paciente"></center> </div>
		<input type="hidden" name="hID" value=""/>
		<input type="hidden" name="hRUN" value=""/>
  	</div>
  <div class="modal-footer">
	<button class="btn" type="submit"><strong>Ingresar</strong></button></form>
    <button class="btn"  data-dismiss="modal" aria-hidden="true" type="reset" >Cancelar</button>
  </div>


    
    
</div>
    


  </body>

  <script>
	$("busqueda").validator();
	$("verificacionClave").validator();

	function enviar(){
                        var postData = $("#busqueda").serialize();
                        $.ajax({ url: '../../ajax/jsonPaciente.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {
					var data = jQuery.parseJSON(output);
					nombre = data['Nombre'] + ' ' + data['Apellido_Paterno'] + ' ' + data['Apellido_Materno'];
					$("#atenderPaciente").text(nombre);
					$('input[name=hID]').val(data['idPaciente']);
					$('input[name=hRUN]').val(data['RUN']);
                                }

                  	});
	}
	function verificarClave(){
                        var postData = $("#verificacionClave").serialize();
                        $.ajax({ url: '../../ajax/verificarClavePaciente.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {
                                        if(output == 1){
						window.location.href = "AtencionPaciente/atencionPaciente.php";
					}
					else{ alert("Clave incorrecta"); }
                                }
                        });
        }	
		// funcion que se encarga de limpiar el formulario tras apretar el boton cancelar

</script>
</html>
