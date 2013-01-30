<?php

require_once 'dompdf/dompdf_config.inc.php';
$codigo="<html>
    <head>
        
    </head>
    
    <body>
        
        holaaaa
    </body>
    
</html>";

$codigo = utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
$dompdf->render();
$dompdf->stream(ejemplo.pdf);

?>


