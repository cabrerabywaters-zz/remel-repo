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
        
        <ul class="nav nav-tabs img-rounded" style="background: rgb(242,245,246); /* Old browsers */
background: -moz-linear-gradient(45deg,  rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* IE10+ */
background: linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
"><!-- barra de navegacion -->
                    <li class="active img-rounded"><a href="#tabHistorial" data-toggle="tab">Información Personal</a></li>
                    <li><a href="#tabConsulta" data-toggle="tab">Mis Diagnósticos</a></li>
                      <li><a href="#" data-toggle="tab">Mis Recetas</a></li>
                      <li><a href="#" data-toggle="tab">Mis Médicos</a></li>
                      <li><a href="#" data-toggle="tab">Mis Instituciones</a>
                    <!--<li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Cuenta <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
               <!--         <li><a href="../doctorIndex.php">Editar Información Personal</a></li>
                        <li><a href="../logout.php">Salir</a></li>
                        </ul>
                    </li>-->
                      <li class="pull-right"><a href="../logout.php">Salir</a></li>

                    
                </ul>
  <!--<?php //echo $Paciente['Foto'];?>-->
    </body>
</html>
