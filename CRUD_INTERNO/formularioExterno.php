<?php
/* el archivo sirve para poder agregar datos a las tablas de esten de manera suelta en la BBDD<br>
tablas de manera externa<br>
@author Leonardo Hidalgo */

//areglo de ejmplo para el archivo
$arreglo=array(array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4));
// funcion que agarra el arreglo y lo transforma en lo que se necesita
function creacionFormularios($arreglo)
{ // igualacion de el primer array a una variable para usarla mas adelante
	$array=$arreglo[0];
// se abre el bootstap para la creacion del formulario
	echo "<div class='form-horizontal'>";
  // se recorre el arreglo
	foreach ($array as $dato => $valor)
	{
    
	
	/************************************************
	 ************************************************
	 *******************terminar con ajax************
	 ************************************************
	 ************************************************/
	 
	 
	echo "<div class='control-group'>";
	// es el label que muestra datos
    echo"<label class='control-label'>".ucfirst($dato)."</label>";
	
    echo"<div class='controls'>";
	// es el input en donde se ingresan los datos
      echo"<input type='text'  placeholder='".ucfirst($dato)."'>";
	  
    echo"</div>";
  echo"</div>";	
	 }
	 // es la division que permite la cracion del boton
  echo"<div class='control-group'>";
  // es el tipo de boton que se asigna
    echo"<div class='controls'>";
      // es el boton en si con su respectivo formato
      echo"<button type='submit' class='btn'>Agregar</button>";
    echo"</div>";
  echo"</div>";
echo"</div>";

}
?>