/* 
 * archivo js que envía vía AJAX la tabla que se desea mostrar
 * y la muestra segun el formato correspondiente
 * incluir este script en la sección correspondiente a la muestra 
 */

$(document).ready(function(){
	/**
         * on click se muestra la tabla de la base de datos (via ajax)
         */
   $('#accordion a').click(function(evento){
        evento.preventDefault();
        tabla = $(this).attr('href'); // asigno la tabla al boton seleccionado
        accion = 0; //asigno la accion predeterminada de mostrar los elementos de la tabla
        $("#contenido").load("../Capa_Controladores/filtroJsControlador.php", {Tabla: tabla, Accion: accion, form: 0}, function(){
         
        });
   }); //end click   
   $('#accordion a').click(function(evento){
        evento.preventDefault(); //prevengo que el link funcione
        tabla = $(this).attr('href'); // asigno la tabla al boton seleccionado
        accion = 0; //asigno la accion predeterminada de mostrar los elementos de la tabla
        $('#myModalLabel').html('Agregar elemento a '+tabla);
        $("#modal-body").load("../Capa_Controladores/filtroJsControlador.php", {Tabla: tabla, Accion: accion, form: 1});
          // AQUI SE DEBE MANDAR LA INFORMACION VIA AJAX AL ARCHIVO CORRESPONDIENTE PARA QUE SEA PROCESADA
   }); //end click


});//end ready