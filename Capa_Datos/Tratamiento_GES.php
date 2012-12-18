<?php
require_once 'Conexion.php';

class Tratamiento_GES {

    private $nombre_tratamiento_ges;
    private $descripcion_tratamiento_ges;

    public function Tratamiento_GES($nombre_tratamiento_ges, $descripcion_tratamiento_ges) {

        $this->nombre_tratamiento_ges = $nombre_tratamiento_ges;
        $this->descripcion_tratamiento_ges = $descripcion_tratamiento_ges;
    }

    public function Agregar_Tratamiento_GES() {

        $con = new ConexionDB();

        $con->conectar();

        $nombre_tratamiento_ges = mysql_real_escape_string($this->nombre_tratamiento_ges);
        $descripcion_tratamiento_ges = mysql_real_escape_string($this->descripcion_tratamiento_ges);


        $query = mysql_query("INSERT INTO Tratamiento_GES(Descripcion,Nombre)
                              VALUES ('$descripcion_tratamiento_ges','$nombre_tratamiento_ges')");

        if ($query) {

            echo "Tratamiento_GES $this->nombre_tratamiento_ges Agregado con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

    public function Eliminar_Tratamiento_GES() {
        $con = new ConexionDB();

        $con->conectar();
        //terminar despues con ajax
        $query = mysql_query("DELETE FROM Tratamiento_GES(Nombre,Descripcion) WHERE idTratamiento_GES = ''");

        if ($query) {

            echo "Tratamiento_GES $this->nombre_tratamiento_ges Agregado con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

    public function Modificar_Persona() {
        $con = new ConexionDB();

        $con->conectar();

        $query = mysql_query("UPDATE Tratamiento_GES 
                              SET Nombre = '$nombre_tratamiento_ges', Descrpicion = '$descripcion_tratamiento_ges'
                              WHERE idTratamiento_GES = ''");

        if ($query) {

            echo "Tratamiento_GES $this->nombre_tratamiento_ges Agregado con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

}
?>


?>
