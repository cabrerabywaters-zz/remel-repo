<?php
require_once 'Conexion.php';

class Alergias {

    private $descripcion_alergias;

    public function Alergias($descripcion_alergias) {

        $this->descripcion_alergias = $descripcion_alergias;
    }

    public function Agregar_Alergias() {

        $con = new ConexionDB();

        $con->conectar();

        $descripcion_alergias = mysql_real_escape_string($this->descripcion_alergias);


        $query = mysql_query("INSERT INTO Alergias(Descripcion)
                              VALUES ('$descripcion_alergias')");

        if ($query) {

            echo "Alergia $this->descripcion_alergias Agregada con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

    public function Eliminar_Alergias() {
        $con = new ConexionDB();

        $con->conectar();
        //terminar despues con ajax
        $query = mysql_query("DELETE FROM Alergias(Descripcion) WHERE idAlergias = ''");

        if ($query) {

            echo "Alergia eliminada con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

    public function Modificar_Alergias() {
        $con = new ConexionDB();

        $con->conectar();

        //terminar despues con ajax
        $query = mysql_query("UPDATE Tratamiento_GES 
                              SET Descrpicion = '$descripcion_alergias'
                              WHERE idAlergias = ''");

        if ($query) {

            echo "Alergia $this->descripcion_alergias Agregada con exito";
        } else {
            die('Error: ' . mysql_error());
        }

        $con->desconectar();
    }

}
?>