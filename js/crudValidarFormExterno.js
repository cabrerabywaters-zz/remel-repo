/* 
 * Archivo js que envía vía ajax todos los campos de cualquier formulario externo
 *
 * 
 */  

$(document).ready(function(){
    $('#agregar-nuevo').click(function(){
        // get all the inputs into an array.
    var $inputs = $('#formulario :input');

    // not sure if you wanted this, but I thought I'd add it.
    // get an associative array of just the values.
    var values = {}; // definicion del arreglo values
    $inputs.each(function() { 
        values[this.name] = $(this).val();// agarra cada input y lo guarda en el arreglo
        });//end each

    });// end click
});//end ready
    