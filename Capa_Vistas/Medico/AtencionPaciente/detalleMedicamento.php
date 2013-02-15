<?php include_once '../../../Capa_Controladores/unidadDeConsumo.php';
include_once '../../../Capa_Controladores/unidadFrecuencia.php';
include_once '../../../Capa_Controladores/unidadPeriodo.php';
 $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
 $unidadFrecuencia = UnidadFrecuencia::Seleccionar('where 1=1');
 $unidadPeriodo = UnidadPeriodo::Seleccionar('where 1=1');
  // variable s ausar para elmodel del medicamento
 // una trae las cantidad de pastillas,comprimidos,etc
 //trae la cantidad de veces al dia 
 // trae durante cuanto tiempo se consumira
?>
<!-- modalDetalleMedicamento-->
<div class="popover-title"> <!-- titulo del modal (nombre del medicamento) -->
        
        <h4 id="detalleMedicamentoLabel">Paracetamol</h4>
        <span id="idMedicamento" style="display:none"></span>
        <span id="estadoMedicamento" style="display:none">0</span> <!-- 0 creacion 1 edicion--> 
        <span id="tipoReceta" style="display:none"></span>
</div> <!--titulo del modal (nombre del medicamento) -->
    
    <div class="popover-content"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        
        <div class="row-fluid"><!-- fila contenido --> 
               
                  <div class="span12 img-rounded">
                   
                   <table class="table table-hover table-condensed table-bordered">
                      <thead>
                           
                      </thead>
                      <tbody> 
                       <tr>
                           <td>Cantidad</td>
                           <td><div class="controls"><input class="span12" type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento" value="1"></div></td>
                           <td><select name="unidadDeConsumo" class="span12"><?php foreach($unidadDeConsumo as $unidad){echo "<option value='".$unidad['idUnidad_de_Consumo']."'>".$unidad['tipo']."</option>";}?></select></td>
                       </tr>
                       <tr>
                           <td>Frecuencia</td>
                           <td><div class="controls"><input class="span12" type="text" placeholder="frequencia" id="frecuenciaMedicamento" value="8"></div></td>
                           <td><select class="span12" name="unidadFrecuencia"><?php foreach($unidadFrecuencia as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
                       </tr>
                       <tr>
                            <td>Duración</td>
                            <td><div class="controls"><input class="span12" type="text" placeholder="periodo" id="periodoMedicamento"></div></td>
                            <td><select class="span12" name="unidadPeriodo"><?php foreach($unidadPeriodo as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
                        </tr>
                        <tr>
                            <td>Inicio</td>
                            <td colspan="2"><input class="span12 datepicker" type="text" name="fechaInicio" value="<?php 
                            //despliega la fehca del dia de hoy     
                            $hoy = date("d-m-Y");   
                                                  
                                                   echo $hoy;?>"></td>
                        </tr>
                        <tr>
                            <td>Fin</td>
                            <td colspan="2"><input class="span12 datepicker" type="text" name="fechaFin" ></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td colspan="2"><textarea class="span12" id="comentarioMedicamento"></textarea></td>
                        </tr>
                      </tbody> 
                   </table>
               </div> 
        
        </div> <!-- fila contenido --> 
    </div> <!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <!--acciones del modal (cancerlar, agregar medicamento etc)-->
    <div class="modal-footer">
  
            
        <div class="control-group pull-left">
            <div class="controls">
            <select id="diagnosticoAsociado">
                <option value="-1" label="Seleccionar Diagnostico">Seleccionar Diagnóstico</option>
                <option value="2">Sin Diagnóstico Asociado</option>
            </select>
            </div>
        </div>
        <div class="pull-right">
            <button class="btn" data-dismiss="collapse" id="cancelar_cambios_receta" aria-hidden="true">Cancelar</button>
            <button class="btn btn-info" id="guardar_cambios_receta" disabled="disabled">Guardar <i class="icon-ok"></i></button>
            <a href="#" id="agregarMedicamento" role="button" class="btn btn-warning">Prescribir</a>
        </div>
    </div>   
<script>
  
 $('#periodoMedicamento, select[name="unidadPeriodo"]').change(function(){
     var inicio = $('input[name="fechaInicio"]').val();
   
     var dd= inicio.substring(0, 2);
 
     var mm=inicio.substring(3,5);
    
     var yy=inicio.substring(6,10);
    
   
     inicio= yy+"-"+mm+"-"+dd;
 
     
    var unidadPeriodo = $('select[name="unidadPeriodo"]').val();
   var periodo = parseInt($('#periodoMedicamento').val());
   
   if(unidadPeriodo == 1){
       dias = periodo     // se suman los días
    }
   else if(unidadPeriodo == 2){ // se suman las semanas *7 días
       dias =  periodo*7
   }
   else if(unidadPeriodo == 3){// se suman los meses por 30(30días por mes) ERROR!
       dias = periodo*30
   }
      
    var sumarDias=parseInt(dias);
 
  var fecha= inicio;
 
  fecha=fecha.replace("-", "/").replace("-", "/");    
 
  fecha= new Date(fecha);
  fecha.setDate(fecha.getDate()+sumarDias);
 
  var anio=fecha.getFullYear();
  var mes= fecha.getMonth()+1;
  var dia= fecha.getDate();
 
  if(mes.toString().length<2){
    mes="0".concat(mes);        
  }    
 
  if(dia.toString().length<2){
    dia="0".concat(dia);        
  }
 
  fecha = dia+"-"+mes+"-"+anio; 
   
   $('input[name="fechaFin"]').val(fecha);
     
     
 })

$('#periodoMedicamento, input[name="fechaInicio"]').change(function(){
   var inicio = $('input[name="fechaInicio"]').val();
   
     var dd= inicio.substring(0, 2);
 
     var mm=inicio.substring(3,5);
    
     var yy=inicio.substring(6,10);
    
   
     inicio= yy+"-"+mm+"-"+dd;
 
     
    var unidadPeriodo = $('select[name="unidadPeriodo"]').val();
   var periodo = parseInt($('#periodoMedicamento').val());
   
   if(unidadPeriodo == 1){
       dias = periodo     // se suman los días
    }
   else if(unidadPeriodo == 2){ // se suman las semanas *7 días
       dias =  periodo*7
   }
   else if(unidadPeriodo == 3){// se suman los meses por 30(30días por mes) ERROR!
       dias = periodo*30
   }
      
    var sumarDias=parseInt(dias);
 
  var fecha= inicio;
 
  fecha=fecha.replace("-", "/").replace("-", "/");    
 
  fecha= new Date(fecha);
  fecha.setDate(fecha.getDate()+sumarDias);
 
  var anio=fecha.getFullYear();
  var mes= fecha.getMonth()+1;
  var dia= fecha.getDate();
 
  if(mes.toString().length<2){
    mes="0".concat(mes);        
  }    
 
  if(dia.toString().length<2){
    dia="0".concat(dia);        
  }
 
  fecha = dia+"-"+mes+"-"+anio; 
   
   $('input[name="fechaFin"]').val(fecha);
})




</script>