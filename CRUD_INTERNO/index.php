<?php
include 'crudHeader.php'; // header del crud con la inclusion de css y jQuery
include 'crudNavBar.php';
?>
    
<div class="container-fluid"><!-- Contenedor MAIN-->
  <div class="row-fluid show-grid"><!-- Contenedor FILA-->
    
<?php
include 'crudSideBar.php';
?>
    
      
    <div class="row-fluid span8"><!--Body content-->
<?php
include 'crudContenido.php';
?>
    </div><!-- fin body content -->
   </div><!-- fin contenedor FILA -->
</div><!-- fin contenedor MAIN-->
<?php
include'crudFooter.php';
?>