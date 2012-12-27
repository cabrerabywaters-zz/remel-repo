<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>DataTables</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "../css/demo_table_jui.css";
            @import "../css/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
        
    </head>
    <?php $arreglo=array(array("Rut Paciente" => "14659205-8","Nombre Pacinte" =>"Cesar","Apellido Paciente" =>"Gonzalez","Diagnostico" => "<a href='http://www.facebook.com/cagzb'>Diagnostico</a>","receta"=>'<a href="http://www.farmaciasdesimilares.cl/">Receta</a>'),array("Rut Paciente" => "18541556-2","Nombre Pacinte" =>"Leonardo","Apellido Paciente" =>"Hidalgo","Diagnostico" => "<a href='http://www.facebook.com/leontuna'>Diagnostico</a>","receta"=>'<a href="http://www.farmaciasdesimilares.cl/">Receta</a>'),array("Rut Paciente" => "17700487-1","Nombre Pacinte" =>"German","Apellido Paciente" =>"Oviedo","Diagnostico" => "<a href='http://www.facebook.com/MrBungie'>Diagnostico</a>","Receta"=>'<a href="http://www.farmaciasdesimilares.cl/">Receta</a>'),array("Rut Paciente" => "17266170-k","Nombre Pacinte" =>"Ignacio","Apellido Paciente" =>"Cabrera","Diagnostico" => "<a href='http://www.facebook.com/cabrerabywaters'>Diagnostico</a>","receta"=>'<a href="http://www.farmaciasdesimilares.cl/">Receta</a>'));//arreglo de ejemploo
	include ("verREgistroPacientes.php");
	verResgistroPacientes ($arreglo);
	?>
	</html>

