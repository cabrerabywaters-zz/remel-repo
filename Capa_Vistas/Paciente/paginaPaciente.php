<?php
include '/../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();
include('/../pacienteHeader.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head> 
    <body>
  <a href="../Medico/logout.php" role="button" class="btn btn-large btn-block btn-danger">Salir</a>
  <? echo $Paciente['Foto'];?>
    </body>
</html>
