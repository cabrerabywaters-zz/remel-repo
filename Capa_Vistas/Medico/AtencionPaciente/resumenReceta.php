 <?php 
 require_once(dirname(__FILE__)."/../../../convertToPDF.php");
 //esta es la funcion que es llamada con el Submit del Boton Imprimir 
 //Del modal del Firmar Receta
 if(isset($_POST['content'])){
//traermos el contenido del html para hacer el pdf desde el textarea del modal
     $html= $_POST['content'];
     $html = utf8_decode($html);
// usamos la función doPDF para crear el pdf
     doPDF('RecetaMedica_REMEL',$html,true,'../../../css/formatoReceta.css'); 
     
     echo '<scrip>
            window.location = "../doctorIndex.php" 
           </script>';
 }
 // el archivo que genera el pdf del mpaciente al emitir su receta 
 ?>
<!-- Modal de resumen de la receta-->
<div id="resumenReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="resumenRecetaLabel" aria-hidden="true">
  
  <div class="modal-header">
    <center> <h3 id="resumenRecetaLabel">Resumen de la Receta</h3></center>
  </div>
  
  <div class="modal-body" id="contenidoReceta">
      <table class="recetaHeader">
      <tr>
      <td colspan="3"> <h4><center><?php echo $_SESSION['logLugar']['nombreSucursal'] ?></center></h4></td>
      </tr>
      <tr>
      
          <td  style="width:37%"><div class="datosDoctor">Doctor: <br><strong><?php echo $medico['Nombre']." ".$medico['Apellido_Paterno'];?> </strong></div></td>
          <td  style="width:26%"><div class="logoRed"><center><img src="../../../imgs/clip_image002.jpg" width="130px" height="110px"></center></div></td>
          <td  style="width:37%"><div class="datosPaciente">Paciente: <br><strong><?php echo $paciente['Nombre']." ".$paciente['Apellido_Paterno'];?> </strong></div></td>
          
      <!-- en este div van los datos del doctor y del paciente que está siendo -->
      </tr>
      </table>
      <table class="recetaContenido">
      <tr><td colspan="3"><hr></td></tr>
      <tr><td colspan="3">
      <strong>Receta Médica Electrónica:</strong><br>
      <div class="row-fluid" id="resumen">
          
      
      </div>
      </td>        
      </tr>
      </table>
      <table class="recetaFooter">
      <tr><td colspan="3"><hr></td></tr>    
      <tr>
         <td><div class="logoRemel pull-left"><img src="../../../imgs/logo-remel-principal.png" height="90px" width="150px"></div></td>
         <td colspan="2"><div class="infoRemel"><strong>www.remel.cl</strong><br><strong>Dirección:</strong> Arzobispo Larraín Gandarillas 119, Providencia, Santiago. <br><strong>Telefonos:</strong> 562-23282153</div></td>
      </tr><!-- footer receta fisica -->
      </table>
</div>
  <div class="modal-footer">
    <form method="post" action="resumenReceta.php">
    <textarea name="content" id="content" style="display:none"> </textarea>
    <center><button type="submit" id="submit" class="btn imprimir" style="display:none"><strong>Imprimir Receta</strong> <i class="icon-print"></i></button>
    
    </form>
    <a class="btn btn-success terminar" style="display:none"><strong>Volver al Menú</strong></a></center>
    <a class="btn btn-danger pull-left cancelarEmision" data-dismiss="modal" aria-hidden="true" ><strong>Cancelar Emisión</strong></a>
    <a class="btn btn-primary confirmarEmision" data-loading-text="Cargando..."><strong><i class="icon-check icon-white"></i>Firmar Emisión</strong></a>
    
    </div><!-- modal footer -->

</div><!-- modal de resumen de la receta -->

<script>
    /*
     *Funcion que maneja el modal Resumen Receta cuando está escondido. (se borran los elementos puestos
     */
    $('#resumenReceta').on('hide',function(){
        $('#resumen').html('');
    });
    /*
     * Función que al hacer click en el boton "emitir receta" hace el resumen completo de la 
     * receta. es necesario mostrar los diagnosticos con sus medicamentos asociados 
     * como listado
     */
    $('#verResumen').click(function(){
        if($('.medicamentoRecetado').length != 0){ // si hay medicamentos recetados
        $('.diagnostico').each(function(){// para cada diagnostico
            var nombreDiagnostico = $(this).children('strong').text()
            $('#resumen').append('<h4> Diagnóstico: '+nombreDiagnostico+'</h4>'); //agrego el nombre del diagnostico
            
            var idDiagnostico = $(this).attr('iddiagnostico');
            //busco todos los medicamentos asociados
            
            $('div[diagnosticoAsociado="'+idDiagnostico+'"]').each(function(){//para cada medicamento
               
               var nombreComercial = $(this).children('.infoMedicamento').children('.nombreComercial').text()
               var idMedicamento = $(this).attr('idMedicamento');
               var cantidadMedicamento = $(this).attr('cantidadMedicamento');
               var unidadConsumo = $(this).children('.infoMedicamento').children('.unidadConsumo').text()
               var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
               var unidadFrecuencia = $(this).children('.infoMedicamento').children('.unidadFrecuencia').text()
               var periodoMedicamento = $(this).attr('periodoMedicamento');
               var unidadPeriodo = $(this).children('.infoMedicamento').children('.unidadPeriodo').text()
               var comentario = $(this).attr('comentarioMedicamento');
               $('#resumen').append('<h5> -> '+nombreComercial+'<br> </h5>   - <b>'+cantidadMedicamento+' '+unidadConsumo+'</b> <small>cada</small> <b>'+frecuenciaMedicamento+' '+unidadFrecuencia+'</b><small>, por</small> <b>'+periodoMedicamento+' '+unidadPeriodo+'</b>.<br>Comentarios: <i>'+comentario+'</i>'); 
            })// end each medicamento
          $('#resumen').append('<hr>'); //linea  
            
        });// end each Diagnostico
        
        $('div[diagnosticoAsociado="2"]').each(function(){
                $('#resumen').append('<h4> Diagnóstico: Sin Diagnóstico Asociado</h4>'); //agrego el nombre del diagnostico
               var nombreComercial = $(this).children('.infoMedicamento').children('.nombreComercial').text()
               var idMedicamento = $(this).attr('idMedicamento');
               var cantidadMedicamento = $(this).attr('cantidadMedicamento');
               var unidadConsumo = $(this).children('.infoMedicamento').children('.unidadConsumo').text()
               var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
               var unidadFrecuencia = $(this).children('.infoMedicamento').children('.unidadFrecuencia').text()
               var periodoMedicamento = $(this).attr('periodoMedicamento');
               var unidadPeriodo = $(this).children('.infoMedicamento').children('.unidadPeriodo').text()
               var comentario = $(this).attr('comentarioMedicamento');
               $('#resumen').append('<h5> -> '+nombreComercial+'<br> </h5>   - <b>'+cantidadMedicamento+' '+unidadConsumo+'</b> <small>cada</small> <b>'+frecuenciaMedicamento+' '+unidadFrecuencia+'</b><small>, por</small> <b>'+periodoMedicamento+' '+unidadPeriodo+'</b>.<br>Comentarios: <i>'+comentario+'</i>');
        }); // end each medicamento
        
//        $('#resumen').append('<hr>'); //linea
        $('.confirmarEmision').removeAttr('disabled');
        $('#resumen').modal('show');
       }// end if
       else{// si no hay medicamentos recetados
           $('#resumen').html('<div class="alert alert-error"><strong>No se ha agregado ningún medicamento a la receta</strong></div>');
           $('.confirmarEmision').attr('disabled','disabled');
       }
       
   }); // end click ver resumen
   
   /*
    *Funcion que se ejecuta al hacer click en "Firmar Emisión"
    *se debe obtener todos los diagnosticos con sus medicamentos 
    *correspondientes y escribir el JSON que los contenga para ser enviados
    *[{diagnostico1: [{medicamento1:[{}], medicamento2:[{}]...}], diagnostico2:{medicamento3:{},medicamento4:{}} 
    */
    var contador = false;
   $('.confirmarEmision').click(function(){
        
        $(this).attr('disabled','disabled');
        var resumenPoder = [];
        
            $('.diagnostico').each(function(){// para cada diagnostico

                var idDiagnostico = $(this).attr('iddiagnostico');
                var tipoDiagnostico = $(this).attr('tipoDiagnostico')// tipoDiagnostico
                var comentarioDiagnostico = $(this).attr('comentarioDiagnostico'); //comentario del diagnostico
//                  alert("diagnostico n°: "+idDiagnostico+" tipo: "+tipoDiagnostico+" comentario: "+comentarioDiagnostico);
//                  diagnostico.push({"idDiagnostico":idDiagnostico}); // se agrega el idDiagnostico al arreglo de diagnostico
//                  alert("exito al pushear idDiagnostico!");

                var medicamentos = [];
                //busco todos los medicamentos asociados
                $('div[diagnosticoAsociado="'+idDiagnostico+'"]').each(function(){//para cada medicamento
                    
                    var idMedicamento = $(this).attr('idMedicamento');
                    var cantidadMedicamento = $(this).attr('cantidadMedicamento');
                    var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
                    var periodoMedicamento = $(this).attr('periodoMedicamento');
                    var comentarioMedicamento = $(this).attr('comentarioMedicamento');
                    var unidadDeConsumo = $(this).attr('unidaddeconsumo');
                    var unidadFrecuencia = $(this).attr('unidadFrecuencia');
                    var unidadPeriodo = $(this).attr('unidadPeriodo');
                    var fechaInicio = $(this).attr('fechaInicio');
                    var dd= fechaInicio.substring(0, 2);
                       var mm=fechaInicio.substring(3,5);
                             var yy=fechaInicio.substring(6,10);
                                fechaInicio= yy+"-"+mm+"-"+dd;
                    var fechaFin = $(this).attr('fechaFin');
                     var dd= fechaFin.substring(0, 2);
                       var mm=fechaFin.substring(3,5);
                             var yy=fechaFin.substring(6,10);
                                fechaFin= yy+"-"+mm+"-"+dd;

                    medicamentos
                    .push({
                        "idMedicamento": idMedicamento, 
                        "cantidadMedicamento" : cantidadMedicamento,
                        "frecuenciaMedicamento": frecuenciaMedicamento,
                        "periodoMedicamento": periodoMedicamento, 
                        "comentarioMedicamento": comentarioMedicamento, 
                        "unidadDeConsumo" : unidadDeConsumo,
                        "unidadFrecuencia" : unidadFrecuencia,
                        "unidadPeriodo" : unidadPeriodo,
                        "fechaInicio" : fechaInicio,
                        "fechaFin" : fechaFin
                    });

                });//end each medicamento
           
                resumenPoder.push({
                    "idDiagnostico" : idDiagnostico,
                    "tipoDiagnostico" : tipoDiagnostico,
                    "comentarioDiagnostico" : comentarioDiagnostico,
                    "medicamentos" : medicamentos
                    }); // se agrega el tipoDiagnostico al arreglo de diagnostico
        }); // end each diagnostico

                var sinDiagnostico = [];
        $('div[diagnosticoAsociado="2"]').each(function(){//para cada medicamento sin diagnostico asociado
                var idMedicamento = $(this).attr('idMedicamento');
                var cantidadMedicamento = $(this).attr('cantidadMedicamento');
                var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
                var periodoMedicamento = $(this).attr('periodoMedicamento');
                var comentarioMedicamento = $(this).attr('comentarioMedicamento');
                var unidadDeConsumo = $(this).attr('unidaddeconsumo');
                var unidadFrecuencia = $(this).attr('unidadFrecuencia');
                var unidadPeriodo = $(this).attr('unidadPeriodo');
                var fechaInicio = $(this).attr('fechaInicio');
                var dd= fechaInicio.substring(0, 2);
                       var mm=fechaInicio.substring(3,5);
                             var yy=fechaInicio.substring(6,10);
                                fechaInicio= yy+"-"+mm+"-"+dd;
                
                var fechaFin = $(this).attr('fechaFin');
                var dd= fechaFin.substring(0, 2);
                       var mm=fechaFin.substring(3,5);
                             var yy=fechaFin.substring(6,10);
                                fechaFin= yy+"-"+mm+"-"+dd;
                
                
                
            
            sinDiagnostico.push({
                "idMedicamento": idMedicamento,
                "cantidadMedicamento":cantidadMedicamento,
                "frecuenciaMedicamento":frecuenciaMedicamento, 
                "periodoMedicamento": periodoMedicamento,
                "comentarioMedicamento":comentarioMedicamento, 
                "unidadDeConsumo" : unidadDeConsumo,
                "unidadFrecuencia" : unidadFrecuencia,
                "unidadPeriodo" : unidadPeriodo,
                "fechaInicio" : fechaInicio,
                "fechaFin" : fechaFin
            }) // end push sinDiagnostico
        
        })//end each medicamento sin diagnostico asociado
        if(!contador){        
        $.ajax({
         data: {'resumenPoder' : resumenPoder, 'sinDiagnostico': sinDiagnostico},
         url: '../../../ajax/ingresarReceta.php',
         type: 'post',
         async: true,
         success: function(output){
		            
          //Si la funcion no ingresa los datos
                    if(output=='0')
                        {
                            alert('La receta no pudo ser generada');
                        }
                        //Cuando el ingreso de los datos de la receta es correcto
                    else if(!isNaN(parseInt(output))){
                            contador = true;
                             //Se Modifica el Label del encabezado de la receta para confirmar la emicion de la receta
                             $('#resumenRecetaLabel').html('Receta Folio# '+output+' Emitida Exitosamente');
                             $('#resumenRecetaLabel').addClass("alert alert-success");
                             
                             
                             
                            //Se esconde el boton de confirmar emision
                            $('.confirmarEmision').hide();
                            $('.cancelarEmision').hide();
                            
                            //Se muestran los botones de terminar e imprimir
                             $('.imprimir').show();
                             $('.terminar').show();
                             
                             //se carga todo el contenido del div de contenidoReceta en el campo de texto
                             //que se encuentra oculto 
                             //Se puede encontrar otra manera de hacerlo, ya que no es la mejor, pero funciona.
                             $('#content').html($('#contenidoReceta').html()) ;
                         }
                    else{
                        alert('La receta no pudo ser generada');
                        alert(output);
                    }    
                      
         }//end success
           
        });// end ajax 
        }//end contador breaker
      }); // end click
   
   //redireccion al hacer click en terminar
   $('.terminar').click(function(){
      window.location = '../doctorIndex.php';
      
   
   });
    
</script><!-- script que genera el listado del resumen de la receta-->
