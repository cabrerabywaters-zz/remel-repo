
<?php
/*
este archivo esta echo para que se inserte dentro del crud
@author Leonardo Hidalgo
*/
// este es un arreglo de ejemplo
$arreglo=array(array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4),array("nombre"=>1,"id"=>2,"fecha"=>3,"dias"=>4));

// esto es lo que le da inicio a la tabla
echo "<table class='table table-hover'>";

// se genera la fila inicial de la tabla
echo"<tr>";
// se iguala solo el arreglo primario para obtener los nombres de las tablas
$encabezado=$arreglo[0];
// se ordena los nombres en un foreach
foreach ($encabezado as $dato=> $valor)
{
// se muestra el encabezado de la tabla
echo"<th>".$dato."</th>";

}
//cierra la fila 
echo"</tr>";



// se vuelve a crear ordenar los arreglos nuevamente
foreach ($arreglo as $datos)
{
	// va creando filas por cada arreglo que contenga la variable
	echo"<tr>";
	
// se ordenan los arreglos internos
	foreach ($datos as $dato=>$valor)
	{// se mientra el valor de cada arreglo interno en una fila
		echo "<td>$valor</td>";
		
	}
	// genera el lapiz
	echo"<td><i class='icon-pencil'></i></td>";
	// genera la x 
	echo"<td><i class='icon-remove'></i></td>";
	//cierra las fila
	echo "</tr>";
}
//se cierra la tabla
echo "</table>";
?>
