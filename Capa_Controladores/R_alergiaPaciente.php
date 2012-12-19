<html>
    <form action="R_alergiaPaciente.php" method="post">
    <input type="text" name="id_Alergia">
    <input type="text" name="id_Paciente">
    <input type="submit">
    </form>
</html>

<?php

require_once '../Capa_Datos/R_alergiaPaciente.php';

function Creacion() {
    $datosCreacion = array(
        array('Alergia_idAlergia', $_POST['id_Alergia']),
        array('Paciente_idPaciente', $_POST['id_Paciente'])
    );
    if ($_POST['id_Alergia'] != '') {
        R_AlergiaPaciente::CrearRelacion($datosCreacion);
    }
    
}
function Eliminacion(){
	$relacionABorrar = new R_AlergiaPaciente($_POST['id_Alergia'],$_POST['id_Paciente']);
	$relacionABorrar->BorrarPorIdRelacion();
}
Eliminacion();
?>
