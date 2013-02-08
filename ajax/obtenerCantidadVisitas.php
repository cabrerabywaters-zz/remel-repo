<?php

/**
 * Descripcion: Entrega el TOP 5 de visitas a doctores segun un idPaciente
 * dado por sesion
 * Input (SESSION)
 *	int idPaciente
 * Output: json con nombres y cantidad de visitas del TOP 5
 */

include_once(dirname(__FILE__)."/../Capa_Datos/llamarQuery.php");

$idPaciente = $_SESSION['idPaciente'];
$queryString = "SELECT CONCAT(Nombre, ' ',Apellido_Paterno) as Nombre, Count(idReceta) FROM Consulta, Medicos, Personas, Recetas WHERE Pacientes_idPaciente = '$idPaciente' AND Medicos_idMedico = Medicos.idMedico AND Medicos.Personas_RUN = Personas.RUN AND Recetas.Consulta_Id_Consulta = Consulta.Id_Consulta GROUP BY Medicos_idMedico LIMIT 5;";
echo $queryString;
$query = CallQuery($queryString);
$doctores = array();
while($row = $query->fetch_array(MYSQLI_NUM)){
	$row[1] = intval($row[1]);
	$doctores[] = $row;
}
echo json_encode($doctores);

?>
