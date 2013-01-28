<?php include_once '/../../Capa_Controladores/unidadDeConsumo.php';
include_once '/../../Capa_Controladores/unidadFrecuencia.php';
include_once '/../../Capa_Controladores/unidadPeriodo.php';
 $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
 $unidadFrecuencia = UnidadFrecuencia::Seleccionar('where 1=1');
 $unidadPeriodo = UnidadPeriodo::Seleccionar('where 1=1');
  
?>

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