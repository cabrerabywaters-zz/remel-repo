/* 
 * Archivo js que envía vía ajax todos los campos de cualquier formulario externo
 *
 * 
 */  

$(document).ready(function(){
    $('#agregar').click(function(){
        
        var datos = $('#formulario').serializeArray(); // se crea el arreglo datos con los elementos del formulario
   
        $(datos).each(function(){ // se itera para cada elemento del arreglo
            alert($(this));
        });// end each

    });// end click
});//end ready
