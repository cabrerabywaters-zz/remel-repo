<?php

$arreglo=array(array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4),array('nombre'=>1,'id'=>2,'fecha'=>3,'dias'=>4));

function creacionFormularios($arreglo)
{ 
	$array=$arreglo[0];

	echo "<form class='form-horizontal'>";
  
	foreach ($array as $dato => $valor)
	{
    
	echo "<div class='control-group'>";
    echo"<label class='control-label'>".ucfirst($dato)."</label>";
    echo"<div class='controls'>";
      echo"<input type='text'  placeholder='".ucfirst($dato)."'>";
    echo"</div>";
  echo"</div>";	
	 }
  echo"<div class='control-group'>";
    echo"<div class='controls'>";
      
      echo"<button type='submit' class='btn'>Agregar</button>";
    echo"</div>";
  echo"</div>";
echo"</form>";

}
?>