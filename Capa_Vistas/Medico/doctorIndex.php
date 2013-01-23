<!DOCTYPE html>
<?php
include '../../ajax/sessionCheck.php';

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
      
        <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
            
           
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
        border: 3px solid #efdcc8;
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
          
           border: 5px solid #efdcc8;
      }
     .modal-header, .modal-footer{
           
           background-color: white;
      }
      .modal-body{#fafaf0;
          background-color: whitesmoke;
          border: 3px solid #efdcc8;
      }
      
      

    </style>

      
  </head>

  <body>

    <div class="container-fluid">
      
        <form class="form-signin" action="atendiendo_paciente.php">
            
            <div class="row-fluid">
                <center><h5 class="form-signin-heading">Atendiendo en:</h5>
                <div class="alert alert-info"><strong><?php echo $_SESSION['logLugar']['nombreLugar'];?></strong></div>
                <div class='alert alert-info'><strong><?php echo $_SESSION['logLugar']['nombreSucursal'];?></strong></div>
                </center>
            </div>    
            <div class="row-fluid">
                <h3 class="form-signin-heading"><center>Opciones</center>   </h3>
                <h5 class="form-signin-heading"><center>Seleccione que desea hacer</center>   </h5>
                <!-- Button to trigger modal -->
                <a href="#myModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Recetar</a>
                <button class="btn btn-large btn-block" type="button">Ver Pacientes Atendidos</button>
                <button class="btn btn-large btn-block " type="button">Consultar medicamentos</button>
                <button class="btn btn-large btn-block" type="button">Consultar Diagnósticos</button>
                        <a href="../decisionDoctor.php" class="btn btn-large btn-block" role="button">Cambiar insitucion</a>
                <a href="logout.php" role="button" class="btn btn-large btn-block btn-danger">Salir</a>
                </form>
             </div>
                
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
                <button class="btn btn" type="submit">Buscar</button>
                </div>
            </form>
            <div id="atender" class="atender">
                <!-- aqui se muestra el paciente obtenido -->
            </div>
            <div id="clave" class="collapse" >
            <form id="verificacionClave" action="javascript:verificarClave()" method="post">
                <br>
            <strong>Ingrese Clave :</strong> <center> 
            <input type="password" name="clave" required placeholder="Ingrese Clave Del Paciente"></center> 
            <div id="mensaje"></div>
            </div>
            <input type="hidden"  name="hID" value=""/>
            <input type="hidden" name="hRUN" value=""/>
  	</div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit"><strong>Ingresar</strong></button></form>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        </div>
    </div>
    


  </body>

  <script>
	$('busqueda').validator();
	$('verificacionClave').validator();
        $('#myModal').on('show',function(){
            $('input[name="RUN"]').focus();
        })
	function enviar(){
                        var postData = $('#busqueda').serialize();
                        $.ajax({ 
                        url: '../../ajax/jsonPaciente.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {
                                    var data = jQuery.parseJSON(output);
                                    nombre = data['Nombre'] + ' ' + data['Apellido_Paterno'] + ' ' + data['Apellido_Materno'];
                                    $("#atender").html("<a class='label label-info' id='"+data['Nombre']+"'>"+nombre+"</a>");
                                    $('input[name=hID]').val(data['idPaciente']);
                                    $('input[name=hRUN]').val(data['RUN']);
                                    $('#clave').collapse('show');
                                    $('input[name="clave"]').focus();
                            }

                  	});// end ajax
	} // end funcion enviar
	function verificarClave(){
        /**
         * función que verifica la clave del paciente
         */
                        var postData = $("#verificacionClave").serialize();
                        $.ajax({ url: '../../ajax/verificarClavePaciente.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {
                                        if(output == 1){// redireccion a atencionPaciente
                                            
						window.location.href = "AtencionPaciente/atencionPaciente.php#";
					}
					else if(output == 0){ //mensaje de error
                                            $("#mensaje").html("<div class='alert alert-error'>La Clave no es correcta</div>"); }
                                else
                                    {    
                                    
                                $("#mensaje").html(output);
                            }
                            
                        }
                        });
        }
       
       
       
</script>
</html>
