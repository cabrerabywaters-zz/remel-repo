<?php include_once '../../../Capa_Controladores/unidadDeConsumo.php';
include_once '../../../Capa_Controladores/unidadFrecuencia.php';
include_once '../../../Capa_Controladores/unidadPeriodo.php';
 $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
 $unidadFrecuencia = UnidadFrecuencia::Seleccionar('where 1=1');
 $unidadPeriodo = UnidadPeriodo::Seleccionar('where 1=1');
  
?>
<!-- modalDetalleMedicamento-->
<div id="detalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="detalleMedicamentoLabel" aria-hidden="true">
    
    <div class="modal-header"><!-- titulo del modal (nombre del medicamento) -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="detalleMedicamentoLabel">Paracetamol</h3>
        <span id="idMedicamento" style="display:none"></span>
        <span id="estadoMedicamento" style="display:none">0</span><!-- 0 creacion 1 edicion -->
    </div><!-- titulo del modal (nombre del medicamento) -->
    
    <div class="modal-body"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        <div id="warnings"></div>
        <div class="row-fluid"><!-- fila contenido -->
        <div class="row-fluid span11"><!-- div de la imagen -->
            <img class="img-rounded pull-left" src="../../../imgs/paracetamol.jpg" style="width:200px; height: 150px" >
        <p id="descripcionMedicamento">Observaciones de ejemplo</p>
        
        </div><!-- div de la imagen -->
        
        <div class="span10" id="detalleContenido">
        <table class="table table-hover">    
            <tr>
               <td>Cantidad:</td>
               <td><input class="span10" type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento" value="1"></td>
               <td><select name="unidadDeConsumo" class="span11"><?php foreach($unidadDeConsumo as $unidad){echo "<option value='".$unidad['idUnidad_de_Consumo']."'>".$unidad['tipo']."</option>";}?></select></td>
            </tr>
            <tr>
               <td>Cada :</td>
               <td><input class="span10" type="text" placeholder="frequencia" id="frecuenciaMedicamento" value="8"></td>
               <td><select name="unidadFrecuencia" class="span11"><?php foreach($unidadFrecuencia as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
            </tr>
            <tr>
                <td>Por :</td>
                <td><input class="span10" type="text" placeholder="periodo" id="periodoMedicamento"></td>
                <td><select name="unidadPeriodo" class="span11"><?php foreach($unidadPeriodo as $unidad){echo "<option value='".$unidad['ID']."'>".$unidad['Nombre']."</option>";}?></select></td>
            </tr>
            <tr>
                <td>Inicio</td>
                <td colspan="2"><input type="text" name="fechaInicio" placeholder="Seleccionar inicio" class="datepicker"></td>
            </tr>
            <tr>
                <td>Fin</td>
                <td colspan="2"><input type="text" name="fechaFin" class="datepicker"></td>
            </tr>
            <tr>
                <td colspan="3">Comentario:</td> 
            </tr>
            <tr>
                <td colspan="3"><textarea width="100%" id="comentarioMedicamento"></textarea></td>
            </tr>
        </table>
        </div>
        
        </div><!-- fila contenido -->
    </div><!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <div class="modal-footer"><!-- acciones del modal (cancerlar, agregar medicamento etc)-->
        <div class="pull-left">
            <select id="diagnosticoAsociado">
                <option label="Seleccionar Diagnostico">Seleccionar Diagnostico</option>
                <option value="0">Sin Diagnostico Asociado</option>
            </select>    
        </div>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="#" id="agregarMedicamento" role="button" class="btn btn-warning">Prescribir</a>
    </div>

</div><!-- fin popup informacion del medicamento -->

<script>
 function dayofyear(d) {   // d is a Date object
        var yn = d.getFullYear();
        var mn = d.getMonth();
        var dn = d.getDate();
        var d1 = new Date(yn,0,1,12,0,0); // noon on Jan. 1
        var d2 = new Date(yn,mn,dn,12,0,0); // noon on input date
        var ddiff = Math.round((d2-d1)/864e5);
        return ddiff+1; }   
$('input[name="fechaInicio"]').change(function(){
   var inicio = $(this).val();
   var fecha = new Date(inicio);
   fecha = parseInt(dayofyear(fecha))
   var unidadPeriodo = $('select[name="unidadPeriodo"]').val()
   var periodo = parseInt($('#periodoMedicamento').val());
   
   if(unidadPeriodo == 2){
       fecha = fecha+periodo     // se suman los días
       
    }
   else if(unidadPeriodo == 3){ // se suman las semanas *7 días
       fecha = fecha + periodo*7
       
   }
   else if(unidadPeriodo == 1){// se suman los meses por 30(30días por mes) ERROR!
       fecha = fecha + periodo*30
       
   }
   
   function dateFromDay(year, day){
   var date = new Date(year, 0); // initialize a date in `year-01-01`
   return new Date(date.setDate(day)); // add the number of days
   }
   
   fecha = dateFromDay(2013, fecha)
   alert(fecha)
   fecha = fecha.getMonth()+1+"/"+fecha.getDate()+"/"+fecha.getFullYear();   
   $('input[name="fechaFin"]').val(fecha);
})



</script>