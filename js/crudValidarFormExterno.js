/* 
 * Archivo js que envía vía ajax todos los campos de cualquier formulario externo
 *
 * 
 */  

$(document).ready(function(){
    
    $('#agregar').click(function(){
    $('#status').html(""); //limpio el espacio de status    
    
            // get all the inputs into an array.
    var $inputs = $('#formulario :input');
        //creacion de la variable para enviar via post
    var envio = "";
    var errores = 0; // contador de errores
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
        errores ++;
        }
        else{ // se vuelve a la normalidad el campo
            
        $('input[name="'+indice+'"]').parent().parent().attr('class','control-group');
            if(indice == "fecha"){
                $('input[name="'+indice+'"]').attr('id',"datepicker");
            }
            else{
                 $('input[name="'+indice+'"]').attr('id',indice);
            }
        $('input[name="'+indice+'"]').attr('placeholder',indice);
        }    
 
    });//end each

    if(errores == 0 && envio !=""){ // si no hay errores en el formulario y el envio no está vacío
      

    //Se crea el objeto XMLHttpRequest 
    var hr = new XMLHttpRequest();
    // Se crean las variables que serán enviadas
    
    // url de la página a la cual se enviarán las vairables
    var url = "../Capa_Controladores/controladorPruebas.php"; 
    envio = envio+'var=dondeEstoy'; // SE DEBE AGREGAR UNA VARIABLE QUE INDIQUE EN QUE SECCION ESTOY
    //envio final por POST
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;//traspasar el elmento respuesta
                        $('#status').html(return_data);
                        $inputs.each(function() {// hay que borrar los campos
                        $(this).val(""); 
                        });//end each
              }
    }
    
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(envio); // Actually execute the request
    $('#status').html("<div class='progress progress-striped active'><div class='bar' style='width:100%;'>Procesando...</div></div>");
    
    
    }

    });//end click
    });//end ready
    