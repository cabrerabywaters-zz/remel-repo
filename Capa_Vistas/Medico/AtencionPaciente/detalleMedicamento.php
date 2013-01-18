<!-- modalDetalleMedicamento-->
<div id="detalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="detalleMedicamentoLabel" aria-hidden="true">
    
    <div class="modal-header"><!-- titulo del modal (nombre del medicamento) -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="detalleMedicamentoLabel">Paracetamol</h3>
    </div><!-- titulo del modal (nombre del medicamento) -->
    
    <div class="modal-body"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        <div class="span3"><img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
        <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        <p>Cantidad: <input type="text" placeholder="Indique Cantidad">Miligramos (mg)</p>
        <p>Cada :<input type="text" placeholder="frequencia">Horas (hrs)</p>
        <p>Por :<input type="text" placeholder="periodo">Dias</p>
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"></textarea></center>
    </div><!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <div class="modal-footer"><!-- acciones del modal (cancerlar, agregar medicamento etc)-->
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="#" id="agregarMedicamento" role="button" class="btn btn-warning">Prescribir</a>
    </div>

</div><!-- fin popup informacion del medicamento -->