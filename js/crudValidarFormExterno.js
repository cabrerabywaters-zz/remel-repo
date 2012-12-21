/* 
 * Archivo js que envía vía ajax todos los campos de cualquier formulario externo
 *
 * 
 */  

$(document).ready(function(){
    $('#agregar').click(function(){
            // get all the inputs into an array.
    var $inputs = $('#formulario :input');

    // Se crea el objeto XMLHttpRequest 
    var hr = new XMLHttpRequest();
    // Se crean las variables que serán enviadas
    
    // url de la página a la cual se enviarán las vairables
    var url = "../Capa_Controladores/region.php";
    
        //creacion de la variable para enviar via post
    var envio = "";
    $inputs.each(function() { // se toma cada input y se desglosa
        var indice = $(this).attr('name'); // indice del input
        var valor = $(this).val(); // valor del elemento
     
        envio = envio+indice+"="+valor+'&'; // se arma la direccion de envío de AJAX
        
        if(this.value == ""){ // se verifica que el input no esté vacío
        // se cambia las caracteristicas del div donde está el input
        $('input[name="'+indice+'"]').parent().parent().attr('class','control-group error'); // se cambia la clase del div donde está a c
        //error
        $('input[name="'+indice+'"]').attr('id','inputError');
        //se cambia el diseño del input a error
        $('input[name="'+indice+'"]').attr('placeholder','Campo no ingresado');
        }
        else{ // se vuelve a la normalidad el campo
            
        $('input[name="'+indice+'"]').parent().parent().attr('class','control-group');
        $('input[name="'+indice+'"]').attr('id',indice);
        $('input[name="'+indice+'"]').attr('placeholder','Campo no ingresado');
        }
            
        
            
            
            
       
        
    });//end each
    envio = envio+'var=dondeEstoy'; // SE DEBE AGREGAR UNA VARIABLE QUE INDIQUE EN QUE SECCION ESTOY
    //envio final por POST
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    
    
    
    


    });//end click
    });//end ready
    