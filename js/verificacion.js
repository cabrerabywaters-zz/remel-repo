/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function registrar_region(){
    // Se crea el objeto XMLHttpRequest 
    var hr = new XMLHttpRequest();
    // Se crean las variables que serán enviadas
    
    // url de la página a la cual se enviarán las vairables
    var url = "registro_region.php";
    var nombre = document.getElementById("nombre_region").value;
    var numero = document.getElementById("numero_region").value;
    var vars = "nombre_region="+nombre+"&numero_region="+numero;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("respuesta_region").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("respuesta_region").innerHTML = "processing...";
}

