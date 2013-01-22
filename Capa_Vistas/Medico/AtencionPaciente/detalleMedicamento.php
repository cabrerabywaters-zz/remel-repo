<?php include_once '../../../Capa_Controladores/unidadDeConsumo.php';
 $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
?>
<!-- modalDetalleMedicamento-->
<div id="detalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="detalleMedicamentoLabel" aria-hidden="true">
    
    <div class="modal-header"><!-- titulo del modal (nombre del medicamento) -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="detalleMedicamentoLabel">Paracetamol</h3>
        <span id="idMedicamento" style="display:none"></span>
        <span id="estadoMedicamento" style="display:none">0</span><!-- 0 creacion 1 edicion -->
    </div><!-- titulo del modal (nombre del medicamento) -->
    
    <div class="modal-body"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        <div id="warnings"></div>
        <div class="row-fluid"><!-- fila contenido -->
        <div class="row-fluid span11"><!-- div de la imagen -->
            <img class="img-rounded pull-left" src="../../../imgs/paracetamol.jpg" style="width:200px; height: 150px" >
        <p id="descripcionMedicamento">Observaciones de ejemplo</p>
        
        </div><!-- div de la imagen -->
        
        <div class="row-fluid span11" id="detalleContenido">
        <table>    
            <tr>
               <td>Cantidad:</td>
               <td><input type="text" placeholder="Indique Cantidad"  id="cantidadMedicamento"></td>
               <td><?php foreach($unidadDeConsumo as $unidad){echo "<option value='$unidad[ti]";?></td>
            </tr>
            <tr>
               <td>Cada :</td>
               <td><input type="text" placeholder="frequencia" id="frecuenciaMedicamento"></td>
               <td>Horas (hrs)</td>
            </tr>
            <tr>
                <td>Por :</td>
                <td><input type="text" placeholder="periodo" id="periodoMedicamento"></td>
                <td>Dias</td>
            </tr>
            <tr>
                <td>Comentario:</td> 
            </tr>
            <tr><td colspan="3"><textarea rows="2" style="width:90%"  id="comentarioMedicamento"></textarea></td></tr>
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