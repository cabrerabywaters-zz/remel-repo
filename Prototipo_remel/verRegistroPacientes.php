<?php
function verResgistroPacientes ($arreglo)
{
	/* texto que despliega la informacion del faciente
	*/
	echo"<div class='demo'>";
 echo'<table id="datatables" class="display">';
echo"<thead>";
echo "<tr>";
// se iguala solo el arreglo primario para obtener los nombres de las tablas
$encabezado=$arreglo[0];
// se ordena los nombres en un foreach
foreach ($encabezado as $dato=> $valor)
{
// se muestra el encabezado de la tabla
echo"<th><center>".$dato."</center></th>";

}
//cierra la fila 
echo "</tr>";
echo"</thead>";
echo"<tbody>";
   
		// se vuelve a crear ordenar los arreglos nuevamente
$contador=0;
foreach ($arreglo as $datos)
{
	// crea la filas de la tabla 
	echo"<tr id='$contador' class='gradeA'>";
	$contador++;

// se ordenan los arreglos internos
	foreach ($datos as $dato=>$valor)
	{// se mientra el valor de cada arreglo interno en una fila
		echo "<td><center>$valor</center></td>";

	} 

		echo"</tr>";
       
}


	echo"</tbody>";
echo"<tfoot>";
echo "<tr>";
// se iguala solo el arreglo primario para obtener los nombres de las tablas
$encabezado=$arreglo[0];
// se ordena los nombres en un foreach
foreach ($encabezado as $dato=> $valor)
{
// se muestra el encabezado de la tabla
echo"<th><center>".$dato."</center></th>";

}
//cierra la fila 
echo "</tr>";
echo"</tfoot>";
 echo"</table>";
 echo"</div>";


 }
 ?>