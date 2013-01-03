/* 
 * archivo js que envía vía AJAX la tabla que se desea mostrar
 * y la muestra segun el formato correspondiente
 * incluir este script en la sección correspondiente a la muestra 
 */

$(document).ready(function(){
	
   $('#accordion a').click(function(evento){
        /**
         * on click se muestra la tabla de la base de datos (via ajax)
         */
        evento.preventDefault();
        ubicacion = $(this).attr('href'); // asigno la tabla al boton seleccionado
        accion = 0; //asigno la accion predeterminada de mostrar los elementos de la tabla
        $("#contenido").load("../Capa_Controladores/filtroJsControlador.php", {Tabla: ubicacion, Accion: accion, form: 0});
        $('#myModalLabel').html('Agregar elemento a '+tabla);
        $("#modal-body").load("../Capa_Controladores/filtroJsControlador.php", {Tabla: ubicacion, Accion: accion, form: 1});

}); //end click   



});//end ready