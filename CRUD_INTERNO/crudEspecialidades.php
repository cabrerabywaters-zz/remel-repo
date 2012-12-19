<?php 
/**
 * Crud de agregación, borrado y actualización de una especialidad
 * 
 * @author Cesar Gonzalez <cgonzb@gmail.com>
 */
require_once '../Capa_Datos/especialidadesMedicas.php'; // se trae la clase especialidadMedica

$nombre= mysql_real_escape_string(trim($_POST['nombreEspecialidad'])); //nombre limpio de la especialidad


if($nombre!="") // se verifica que el campo no esté vacío
{

 $especialidad= new EspecialidadMedica($nombre); // se instancia una nueva especialidad
$especialidad->AgregarEspecialidades(); // se agrega la especialidad a la db
}
 else { // si hay errores mensaje de error
 echo "<h5>* Faltan campos por completar</h5>"  ;
}
 

  
?>
