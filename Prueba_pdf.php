<?php

require_once 'dompdf/dompdf_config.inc.php';

$var="Cesar";
$var2="variables";

$codigo="<html>
    <head>
        
    </head>
    
    <body>
        
        hola $var :<br>
____________________________________________________________________________
<br> asi puedes generar un PDF
con las $var2 que tengas en el modal</body>
    
</html>";

$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
$dompdf->render();
$dompdf->stream(ejemplo.pdf);

?>


