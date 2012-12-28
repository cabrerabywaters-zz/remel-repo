<?php
include '../Capa_Vistas/medicoHeader.php';
?>

  <div class="tab-content"><!-- Contenido-->
    <div class="tab-pane active" id="tabHistorial"><!-- tab Historial-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
        
        <div class="accordion-group"><!-- infoPaciente -->
            <div class="accordion-heading">
            <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            Información Personal
            </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse">
                <div class="accordion-inner"><!-- aqui infoPaciente.php -->
                Aqui irá el contenido con la infor del paciente
                </div><!-- aqui infoPaciente.php -->
            </div>
        </div><!-- info paciente -->
        
        <div class="accordion-group"><!-- infoMedicaPaciente -->
            <div class="accordion-heading">
            <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
            Información Médica
            </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner"><!-- aqui infoMedicaPaciente.php -->
                Aquí irá la información Médica
                </div><!-- aqui infoMedicaPaciente.php -->
            </div>
        </div><!-- infoMedicaPaciente -->
        
        </div><!-- accordion historial -->
    </div><!-- Fin tab historial-->
    
    <div class="tab-pane" id="tabConsulta"><!-- tab consulta -->
      
    <div class="accordion" id="accordion3"><!-- accordion consulta -->
        <div class="accordion-group"><!-- seccion diagnostico -->
            <div class="accordion-heading">
            <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
            Diagnóstico
            </a>
            </div>
            <div id="collapseOne1" class="accordion-body collapse">
                <div class="accordion-inner"><!-- aqui diagnosticoPaciente.php -->
        
                    <strong><p>Ingrese nombre del diagnóstico</p></strong>
                    <form class="form-search">
                    <div class="input-append">
                    <input type="text" class="span2 search-query">
                    <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion">Buscar</button>  <br>
                    <div id="informacion" class="collapse" > <span id="info" class="badge badge-info">  <a  href="#myModal" role="button"   data-toggle="modal"> Resfrio común </a></span></div>
                    </div>
                    </form>
                </div><!-- aqui diagnosticoPaciente.php -->
            </div>
        </div><!-- seccion diagnostico -->
        
        <div class="accordion-group"><!-- seccion receta -->
            <div class="accordion-heading">
            <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
            Receta
            </a>
            </div>
            <div id="collapseTwo2" class="accordion-body collapse">
                <div class="accordion-inner"><!-- aquí va creacionReceta.php -->
         
                    <strong><p>Ingrese nombre del medicamento</p></strong>
                    <form class="form-search">
                    <div class="input-append">
                    <input type="text" class="span2 search-query">
                    <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion2">Buscar</button>  <br>
                    <div id="informacion2" class="collapse" > <span id="info2" class="badge badge-info">  <a  href="#myModal2" role="button"   data-toggle="modal"> Paracetamol </a></span></div>
                    </div>
                    </form>
                </div><!-- aquí va creacionReceta.php -->
            </div>
        </div>
    </div><!-- Fin accordion consulta -->
</div><!-- Fin del tab diagnostico-->
    
  </div><!-- Fin del contenido -->
  </div>
</div>
        
        
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Diagnostico</h3>
  </div><!-- fin modal-header -->
  <div class="modal-body">
      <strong><p>Resfrio Común</p></strong>
      <div class="span3"> <img src="imgs/resfriado.jpg" style="width:30%" ></div>
      <p>El resfriado común, catarro, resfrío o romadizo es una enfermedad infecciosa viral leve del sistema respiratorio superior que afecta a personas de todas las edades, altamente contagiosa, causada fundamentalmente por rinovirus y coronavirus.</p>
      <p>Comentario: </p>
     <center> <textarea rows="2" style="width:90%"></textarea></center>
  </div><!-- fin modal-body -->
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Diagnosticar</a>
  </div><!-- end footer modal -->
</div> <!-- fin popup diagnostico-->
        
        
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header"><!-- modal header -->
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Información del Medicamento</h3>
  </div><!-- fin modal header -->
  <div class="modal-body"><!-- modal body -->
      <strong><p>Paracetamol</p></strong>
      <div class="span3"> <img src="imgs/paracetamol.jpg" style="width:60%" ></div>
      <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
      <p>Cantidad: </p>
      <input type="text" placeholder="Indique Cantidad">
      <p>Comentario: </p>
      <center> <textarea rows="2" style="width:90%"></textarea></center>
  </div><!-- fin modal body -->
  <div class="modal-footer"><!-- modal footer -->
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Recetar</a>
  </div><!-- fin modal footer -->
</div><!-- fin popup diagnostico-->
        
        
        
        
    </body>
</html>
