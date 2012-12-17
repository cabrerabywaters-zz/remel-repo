
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      
      }
      #contenido{
          
          background-color: red;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

  
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
    
    
 <script src="http://code.jquery.com/jquery-latest.js"></script>
     <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
     <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
     <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
     
     <script type="text/javascript">                                         
   $(document).ready(function() {
   $('#demo, #demo2, #demo3').collapse({
  toggle: true
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
 
           <div id="demo" class="collapse in" style="colapse: true"> <li class="active"><a href="#">Nueva Región</a></li> </div>
            
              
            
             <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo2">
  Provincia
</button>
             <div id="demo2" class="collapse in"> <li class="active"><a href="#">Nueva Provincia</a></li> </div>
             
    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#demo3">
  Comuna
</button>
             <div id="demo3" class="collapse in"> <li class="active"><a href="#">Nueva Comuna</a></li> </div>
             
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="row-fluid offset3" style="">
      <!--/Contenido cuerpo principal comienza aquí-->
     
      <div class="row">
          
      <form class="form-horizontal">
          <br>
  <div class="control-group">
    
    <div class="controls">
      <input type="text" id="nombre_region" placeholder="Región">
    </div>
      <br>
       <div class="controls">
      <input type="text" id="numero_region" placeholder="N° Región">
    </div>
      <br>
        <button id="agregar_region" class="btn btn-large btn-primary offset3" type="button"> Agregar Nueva Región</button>
  </div>

 
       </form>
         
      </div>
           
      </div>
       
          </div><!--/row-->
        
          
        </div><!--/span-->
          
  

      <hr>

      <footer>
        <p>&copy; Remel 2012</p>
      </footer>

    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>