/* 
 * archivo js que envía vía AJAX la tabla que se desea mostrar
 * y la muestra segun el formato correspondiente
 * incluir este script en la sección correspondiente a la muestra 
 */

$(document).ready(function(){
	
   $('#accordion a').click(function(evento){
        evento.preventDefault();
        tabla = $(this).attr('href'); // asigno la tabla al boton seleccionado
        accion = 0; //asigno la accion predeterminada de mostrar los elementos de la tabla
        $("#contenido").load("../Capa_Controladores/controladorPruebas.php", {Tabla: tabla, Accion: accion});
              
          
        
        
   }); //end click


});//end ready