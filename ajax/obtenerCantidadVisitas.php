<?php

include_once(dirname(__FILE__)."/../Capa_Datos/llamarQuery.php");

$idPaciente = $_SESSION['idPaciente'];
$queryString = "SELECT CONCAT(Nombre, ' ',Apellido_Paterno) as Nombre, Count(Fecha) FROM Consulta, Medicos, Personas WHERE Pacientes_idPaciente = '$idPaciente' AND Medicos_idMedico = Medicos.idMedico AND Medicos.Personas_RUN = Personas.RUN GROUP BY Medicos_idMedico LIMIT 5;";
$query = CallQuery($queryString);
$doctores = array();
while($row = $query->fetch_array(MYSQLI_NUM)){
	$row[1] = intval($row[1]);
	$doctores[] = $row;
}
echo json_encode($doctores);

?>
