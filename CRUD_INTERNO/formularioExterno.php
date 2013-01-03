<?php
/**
 *  el archivo sirve para poder agregar datos a las tablas de esten de manera suelta en la BBDD
 * tablas de manera externa
 * @author Leonardo Hidalgo 
 */

/**
 * Función para crear un formulario a partir de los n campos que tenga una tabla
 * se debe entregar el arreglo con los select
 * 
 */
function creacionFormularios($arreglo)
{ // igualacion de el primer array a una variable para usarla mas adelante
	$array= $arreglo[0];
// se abre el bootstap para la creacion del formulario
	echo "
            <form class='form-horizontal' id='formulario'>";
  // se recorre el arreglo
	foreach ($array as $dato => $valor)
	{ 
         if($dato[0].$dato[1] == 'id'){
          
	 }
         elseif($dato == 'fecha'){
            echo "
                 <div class='control-group' id='$dato'>
                <label name='$dato' class='control-label'>".ucfirst($dato)."</label>
                    <div class='controls' id='$dato-control'>
                        <input type='text'  name ='$dato' placeholder='".ucfirst($dato)."' id='datepicker'>
                    </div>
                </div>";    
         }
         else{
             echo "
                <div class='control-group' id='$dato'>
                <label name='$dato' class='control-label'>".ucfirst($dato)."</label>
                    <div class='controls' id='$dato-control'>
                        <input type='text' name='$dato' placeholder='".ucfirst($dato)."'>
                    </div>
                </div>";
             
         }
         }
	 // es la division que permite la cracion del boton
  echo "
      </form><!-- cierre div horizontal-group-->";
}
?>