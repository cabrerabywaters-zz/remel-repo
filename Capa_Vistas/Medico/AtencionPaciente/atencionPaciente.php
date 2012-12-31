<?php

include '../../../sessionCheck.php';

iniciarCookie();
verificarIP();


include('../../medicoHeader.php'); // elementos visuales, navegacion y encabezado

?>
  <div class="tab-content"><!-- contenido del panel 1-->
    <div class="tab-pane active" id="tabHistorial"><!-- tab Historial-->
      
        <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Información Personal
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
        Aqui irá el contenido con la infor del paciente
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Aquí irá la información Médica
      </div>
    </div>
  </div>
</div>
    </div><!-- Fin tab historial-->
    
    <div class="tab-pane" id="tabConsulta"><!-- tab Diagnostico-->
      
              <div class="accordion" id="accordion3">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
      </a>
    </div>
    <div id="collapseOne1" class="accordion-body collapse">
      <div class="accordion-inner">
        <div class="modal-body">
      <strong><p>Ingrese nombre del diagnóstico</p></strong>
    <form class="form-search">
  <div class="input-append">
    <input type="text" class="span2 search-query">
    <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion">Buscar</button>  <br>
    
   
    <div id="informacion" class="collapse" > <span id="info" class="badge badge-info">  <a  href="#myModal" role="button"   data-toggle="modal"> Resfrio común </a></span></div>
  </div>
    </form>
    
   
    
  </div>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
        Receta
      </a>
    </div>
    <div id="collapseTwo2" class="accordion-body collapse">
      <div class="accordion-inner">
         <div class="modal-body">
      <strong><p>Ingrese nombre del medicamento</p></strong>
    <form class="form-search">
  <div class="input-append">
    <input type="text" class="span2 search-query">
    <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion2">Buscar</button>  <br>
    
   
    <div id="informacion2" class="collapse" > <span id="info2" class="badge badge-info">  <a  href="#myModal2" role="button"   data-toggle="modal"> Paracetamol </a></span></div>
  </div>
    </form>
    
   
    
  </div>
      </div>
    </div>
  </div>
</div><!-- Fin del Acordeon-->
        
        
        
        
        
    </div><!-- Fin del tab diagnostico-->
    
  </div>
  </div>
</div>
        
        
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Paciente</h3>
  </div>
  <div class="modal-body">
      <strong><p>Resfrio Común</p></strong>
      <div class="span3"> <img src="../../../imgs/resfriado.jpg" style="width:30%" ></div>
      <p>El resfriado común, catarro, resfrío o romadizo es una enfermedad infecciosa viral leve del sistema respiratorio superior que afecta a personas de todas las edades, altamente contagiosa, causada fundamentalmente por rinovirus y coronavirus.</p>
      <p>Comentario: </p>
     <center> <textarea rows="2" style="width:90%"></textarea></center>
   
    
     
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Diagnosticar</a>

  </div>
  
    
    
</div>
        
        
           <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Medicamento</h3>
  </div>
  <div class="modal-body">
      <strong><p>Paracetamol</p></strong>
      <div class="span3"> <img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
      <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
     
      
            <p>Cantidad: </p>
       <input type="text" placeholder="Indique Cantidad">
      
      <p>Comentario: </p>
     <center> <textarea rows="2" style="width:90%"></textarea></center>
 
     
     
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Recetar</a>

  </div>
  
    
    
</div>
        
        
        
        
    </body>
</html>
