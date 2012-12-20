<!DOCTYPE html>
<!-- header del CRUD-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php
include 'estilosBootstrap.php';
?>
  </head>
    
    <script type="text/javascript" src="/js/verificacion.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
     <script type="text/javascript">                                         
   $(document).ready(function() {
   // para que los acordiones inicien colapsados
   $('#demo, #demo2, #demo3').collapse({
   
  toggle: true
      })
      
      
      $('#agregar_region').on('click', function (e) {

      // Se crea el objeto XMLHttpRequest 
    var hr = new XMLHttpRequest();
    // Se crean las variables que serán enviadas
    
    // url de la página a la cual se enviarán las vairables
    var url = "registro_region.php";
    var nombre = document.getElementById("nombre_region").value;
    var numero = document.getElementById("numero_region").value;
    var vars = "nombre_region="+nombre+"&numero_region="+numero;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("respuesta_region").innerHTML = return_data;
                        document.getElementById("nombre_region").value="";
                        document.getElementById("numero_region").value="";
          
                             
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("respuesta_region").innerHTML = "processing...";

})
      
      
      
 });                                     
 </script>
     
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            
            
          <a class="brand" href="#">REMEL EDICION</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Registrado como: <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">ACERCA DE </a></li>
              <li><a href="#contact">Contacto</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      <div class="container-fluid">
      <div class="row-fluid"style="">
        <div class="span3" style="">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo">
                Regiones
                </button>
 
           <div id="demo" class="collapse in" style="colapse: true"> <li class="active offset1"><a href="#">Nueva Región</a></li> </div>
            
              
            
             <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo2">
  Provincia
</button>
             <div id="demo2" class="collapse in"> <li class="active offset1"><a href="#"> Nueva Provincia</a></li> </div>
             
    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo3">
  Comuna
</button>
             <div id="demo3" class="collapse in"> <li class="active offset1"><a href="#">Nueva Comuna</a></li> </div>
             
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="row-fluid offset2" style="">