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
                   
                   <table class="table table-hover table-condensed">
                       <tr>
                           <td>Cantidad</td>
                           <td><input class="span11" type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento" value="1"></td>
                           <td><select class="span11" name="unidadDeConsumo"><?php foreach($unidadDeConsumo as $unidad){echo "<option value='".$unidad['idUnidad_de_Consumo']."'>".$unidad['tipo']."</option>";}?></select></td>
                       </tr>
                       <tr>
                           <td>Frecuencia</td>
                           <td><input class="span11" type="text" placeholder="frequencia" id="frecuenciaMedicamento" value="8"></td>
                           <td><select class="span11" name="unidadFrecuencia"><?php foreach($unidadFrecuencia as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
                       </tr>
                       <tr>
                            <td>Duración</td>
                            <td><input class="span11" type="text" placeholder="periodo" id="periodoMedicamento"></td>
                            <td><select class="span11" name="unidadPeriodo"><?php foreach($unidadPeriodo as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
                        </tr>
                        <tr>
                            <td>Inicio</td>
                            <td colspan="2"><input class="span11 datepicker" type="text" name="fechaInicio" value="<?php 
                            //despliega la fehca del dia de hoy     
                            $hoy = getdate();
                                                   $hoy = $hoy['mon']."/".$hoy['mday']."/".$hoy['year'];
                                                   echo $hoy;?>"></td>
                        </tr>
                        <tr>
                            <td>Fin</td>
                            <td colspan="2"><input class="span11 datepicker" type="text" name="fechaFin" ></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td colspan="2"><textarea width="100%" id="comentarioMedicamento"></textarea></td>
                        </tr>
                       
                   </table>
               </div> 
        
        </div> <!-- fila contenido --> 
    </div> <!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <!--acciones del modal (cancerlar, agregar medicamento etc)-->
    <div class="modal-footer">
  
            
        <div class="control-group pull-left">
            <div class="controls">
            <select id="diagnosticoAsociado">
                <option value="-1" label="Seleccionar Diagnostico">Seleccionar Diagnostico</option>
                <option value="0">Sin Diagnostico Asociado</option>
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
 function dayofyear(d) {   // d is a Date object
        var yn = d.getFullYear();
        var mn = d.getMonth();
        var dn = d.getDate();
        var d1 = new Date(yn,0,1,12,0,0); // noon on Jan. 1
        var d2 = new Date(yn,mn,dn,12,0,0); // noon on input date
        var ddiff = Math.round((d2-d1)/864e5);
        return ddiff+1; }   // funcion que calcula el día del año con la fecha
 function dateFromDay(year, day){
   var date = new Date(year, 0); // initialize a date in `year-01-01`
   return new Date(date.setDate(day)); // add the number of days
 } // funcion que calcula la fecha con el día del año

$('#periodoMedicamento, input[name="fechaInicio"]').change(function(){
   var inicio = $('input[name="fechaInicio"]').val();
   var fecha = new Date(inicio);
   fecha = parseInt(dayofyear(fecha));
   var unidadPeriodo = $('select[name="unidadPeriodo"]').val();
   var periodo = parseInt($('#periodoMedicamento').val());
   
   if(unidadPeriodo == 1){
       fecha = fecha+periodo     // se suman los días
    }
   else if(unidadPeriodo == 2){ // se suman las semanas *7 días
       fecha = fecha + periodo*7
   }
   else if(unidadPeriodo == 3){// se suman los meses por 30(30días por mes) ERROR!
       fecha = fecha + periodo*30
   }

   fecha = dateFromDay(<?php $hoy=getdate(); echo $hoy['year'];?>, fecha)
   fecha = fecha.getMonth()+1+"/"+fecha.getDate()+"/"+fecha.getFullYear();   
   $('input[name="fechaFin"]').val(fecha);
})




</script>