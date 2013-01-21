<!-- modalDetalleMedicamento-->
<div id="detalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="detalleMedicamentoLabel" aria-hidden="true">
    
    <div class="modal-header"><!-- titulo del modal (nombre del medicamento) -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="detalleMedicamentoLabel">Paracetamol</h3>
        <span id="idMedicamento" style="display:none"></span>
    </div><!-- titulo del modal (nombre del medicamento) -->
    
    <div class="modal-body"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        <div class="row-fluid"><!-- fila contenido -->
        <div class="row-fluid span11" style="background-color: #08c"><!-- div de la imagen -->
            <img class="img-rounded" src="../../../imgs/paracetamol.jpg" style="width:200px; height: 150px" >
        <p id="descripcionMedicamento">El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        
        </div><!-- div de la imagen -->
        
        <div class="row-fluid span11" style="background-color: #08c">
        <p>Cantidad: <input type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento"></p>
        <p>Cada :<input type="text" placeholder="frequencia" id="frecuenciaMedicamento">Horas (hrs)</p>
        <p>Por :<input type="text" placeholder="periodo" id="periodoMedicamento">Dias</p>
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"  id="comentarioMedicamento"></textarea></center>
        </div>
        
        </div><!-- fila contenido -->
    </div><!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <div class="modal-footer"><!-- acciones del modal (cancerlar, agregar medicamento etc)-->
        <div class="pull-left">
            <select id="diagnosticoAsociado">
                <option value="0">Sin Diagnostico Asociado</option>
            </select>    
        </div>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="#" id="agregarMedicamento" role="button" class="btn btn-warning">Prescribir</a>
    </div>

</div><!-- fin popup informacion del medicamento -->