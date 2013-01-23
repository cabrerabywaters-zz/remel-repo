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
        
        <div class="row-fluid span11" id="detalleContenido">
        <table>    
            <tr>
               <td>Cantidad:</td>
               <td><input type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento"></td>
               <td><select name="unidadDeConsumo"><?php foreach($unidadDeConsumo as $unidad){echo "<option value='".$unidad['tipo']."'>".$unidad['tipo']."</option>";}?></select></td>
            </tr>
            <tr>
               <td>Cada :</td>
               <td><input type="text" placeholder="frequencia" id="frecuenciaMedicamento"></td>
               <td><select name="unidadFrecuencia"><?php foreach($unidadFrecuencia as $unidad){echo "<option value='".$unidad['Nombre']."'>".$unidad['Nombre']."</option>";}?></select></td>
            </tr>
            <tr>
                <td>Por :</td>
                <td><input type="text" placeholder="periodo" id="periodoMedicamento"></td>
                <td><select name="unidadPeriodo"><?php foreach($unidadPeriodo as $unidad){echo "<option value='".$unidad['Nombre']."'>".$unidad['Nombre']."</option>";}?></select></td>
            </tr>
            <tr><td>Inicio</td><td><input type="text" name="fechaInicio" placeholder="Seleccionar inicio" class="datepicker"></tr>
            <tr><td>Fin</td><td><input type="text" name="fechaFin" class="datepicker"></tr>
            <tr>
                <td>Comentario:</td> 
            </tr>
            <tr><td colspan="3"><textarea rows="2" style="width:95%" id="comentarioMedicamento"></textarea></td></tr>
        </table>
        </div>
        
        </div><!-- fila contenido -->
    </div><!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <div class="modal-footer"><!-- acciones del modal (cancerlar, agregar medicamento etc)-->
        <div class="pull-left">
            <select id="diagnosticoAsociado">
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
   fecha = dayofyear(fecha)
   var unidadPeriodo = $('select[name="unidadPeriodo"]').val()
   var periodo = $('#periodoMedicamento').val();
   if(unidadPeriodo == "Dias"){
       fecha = fecha + periodo // se suman los días
   }
   else if(unidadPeriodo == "Semanas"){ // se suman las semanas *7 días
       fecha = fecha + periodo*7
   }
   else{ // se suman los meses por 30(30días por mes) ERROR!
       fecha = fecha + periodo*30
   }
   alert('la fecha final es '+fecha)
})



</script>