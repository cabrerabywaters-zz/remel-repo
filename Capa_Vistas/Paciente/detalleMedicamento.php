<?php include_once '../../Capa_Controladores/unidadDeConsumo.php';
include_once '../../Capa_Controladores/unidadFrecuencia.php';
include_once '../../Capa_Controladores/unidadPeriodo.php';
// se llaman a las tablas unidad de consumo , unidad de frecuencia, unidad de periodo y se despliegan todos los datos de ellas
 $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
 $unidadFrecuencia = UnidadFrecuencia::Seleccionar('where 1=1');
 $unidadPeriodo = UnidadPeriodo::Seleccionar('where 1=1');
  
?>    
       
<!-- modalDetalleMedicamento-->
<div class="popover-title"> <!-- titulo del modal (nombre del medicamento) -->
        
        <h4 id="detalleMedicamentoLabel">Paracetamol</h4>
        <span id="idMedicamento" style="display:none"></span>
        <span id="estadoMedicamento" style="display:none">0</span> <!-- 0 creacion 1 edicion--> 
    </div> <!--titulo del modal (nombre del medicamento) -->
    
    <div class="popover-content"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        
        <div class="row-fluid"><!-- fila contenido --> 
               
                  <div class="span12 img-rounded">
                   
                   
                       
                   </table>
               </div> 
        
        </div> <!-- fila contenido --> 
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

$('#periodoMedicamento').change(function(){
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