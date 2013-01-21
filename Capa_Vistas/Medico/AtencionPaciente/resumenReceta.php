 
<!-- Modal de resumen de la receta-->
<div id="resumenReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="resumenRecetaLabel" aria-hidden="true">
  
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="resumenRecetaLabel">Resumen de la Receta <strong>Folio: #12345 </strong></h3>
  </div>
  
  <div class="modal-body">
      <h4><center><?php echo $_SESSION['logLugar']['nombreSucursal'] ?></center></h4>
      <div class="row-fluid datosResumen">
          <p>Doctor: <strong><?php echo $medico['Nombre']." ".$medico['Apellido_Paterno'];?> </strong></p>
          <p>Paciente: <strong><?php echo $paciente['Nombre']." ".$paciente['Apellido_Paterno'];?> </strong></p>
          <hr>
      </div><!-- en este div van los datos del doctor y del paciente que está siendo -->
      <div class="row-fluid" id="resumen">
          
      </div>
  </div>
   
  <div class="modal-footer">
    <button class="btn pull-left" data-dismiss="modal" aria-hidden="true"><br><strong>Volver</strong><br><br></button>
    <button class="btn btn-primary confirmarEmision"><br><strong><i class="icon-check icon-white"></i>Confirmar Emisión<br><br></strong></button>
  </div>

</div><!-- modal de resumen de la receta -->

<script>
    /*
     * Función que al hacer click en el boton "emitir receta" hace el resumen completo de la 
     * receta. es necesario mostrar los diagnosticos con sus medicamentos asociados 
     * como listado
     */
    $('#verResumen').click(function(){
        if($('.medicamentoRecetado').length != 0){ // si hay medicamentos recetados
        $('.diagnostico').each(function(){// para cada diagnostico
            var nombreDiagnostico = $(this).children('strong').text()
            $('#resumen').append('<h4>'+nombreDiagnostico+'</h4>'); //agrego el nombre del diagnostico
            
            var idDiagnostico = $(this).attr('iddiagnostico');
            //busco todos los medicamentos asociados
            $('div[diagnosticoAsociado="'+idDiagnostico+'"]').each(function(){//para cada medicamento
               var nombreComercial = $(this).text()
               var idMedicamento = $(this).attr('idMedicamento');
               var cantidadMedicamento = $(this).attr('cantidadMedicamento');
               var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
               var periodoMedicamento = $(this).attr('periodoMedicamento');
               
               $('#resumen').append('<h5>'+nombreComercial+'--'+cantidadMedicamento+' cada '+frecuenciaMedicamento+' hrs, por '+periodoMedicamento+' días.</h5>'); 
            })// end each medicamento
          $('#resumen').append('<hr>'); //linea  
            
        });// end each Diagnostico
        
        $('#resumen').append('<h4>Sin Diagnostico Asociado</h4>');
        $('div[diagnosticoAsociado="0"]').each(function(){
               var nombreComercial = $(this).text()
               var idMedicamento = $(this).attr('idMedicamento');
               var cantidadMedicamento = $(this).attr('cantidadMedicamento');
               var frecuenciaMedicamento = $(this).attr('frecuenciaMedicamento');
               var periodoMedicamento = $(this).attr('periodoMedicamento');
               $('#resumen').append('<h5>'+nombreComercial+'--'+cantidadMedicamento+' cada '+frecuenciaMedicamento+' hrs, por '+periodoMedicamento+' días.</h5>');
        }); // end each medicamento
        
        $('#resumen').append('<hr>'); //linea
        $('.confirmarEmision').removeAttr('disabled');
    
       }// end if
       else{// si no hay medicamentos recetados
           $('#resumen').html('<div class="alert alert-error"><strong>No se ha agregado ningún medicamento a la receta</strong></div>');
           $('.confirmarEmision').attr('disabled','disabled');
       }
       
   }); // end click
    
    
</script><!-- script que genera el listado del resumen de la receta-->