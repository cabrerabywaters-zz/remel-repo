<!-- barra de favoritos -->
    <div class="row-fluid show-grid img-rounded" id="favBar" style="background-color: #B0BED9">
        <button class="btn btn-block" disabled>
             <i class="icon-star"></i> Mis Favoritos
          <a href="#" class="closeBar"><i class="icon-remove pull-right"></i></a>
      </button>
      
      <!-- diagnosticos Favoritos -->
      <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
           <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Diagnosticos
      </button>
      
      <div id="diagnosticosFav" class="collapse">
          <div class="span10 offset1">
              
          <div class="alert alert-info"><!-- pill diagnosticoFav 1 -->
              <strong>Diagnostico ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar a Receta"> <i class="detalleDiagnostico icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
          </div><!-- end pill diagnosticoFav 1-->
          <div class="alert alert-info"><!-- pill diagnosticoFav 1 -->
              <strong>Diagnostico ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar de Receta"> <i class="detalleDiagnostico icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
          </div><!-- end pill diagnosticoFav 1-->
          
          </div>
      </div>
      <!-- fin diagnosticos favoritos-->
      
      <!-- medicamentos favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#medicamentosFav">
          <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos
      </button>
      
      <div id="medicamentosFav" class="collapse">
       <div class="span10 offset1">
           
         <div class="alert alert-success"><!-- pill medicamentoFav 1 -->
              <strong>Medicamento ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i> </a><!-- eliminar de favoritos --> 
              <a href="#" rel="tooltip" title="Agregar a Receta"> <i class="detalleMedicamento icon-plus pull-right"></i> </a><!-- agregar favorito seleccionado -->
         </div><!-- end pill diagnosticoFav 1-->
         <div class="alert alert-success"><!-- pill medicamentoFav 1 -->
              <strong>Medicamento ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#" rel="tooltip" title="Agregar a Receta"> <i class="detalleMedicamento icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
         </div><!-- end pill diagnosticoFav 1-->
       
       </div>
      </div>
      <!-- fin medicamentos favoritos -->
      
<!-- medicamentos RP favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#medicamentosRpFav">
          <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos RP
      </button>
      
      <div id="medicamentosRpFav" class="collapse">
       <div class="span10 offset1">
           
         <div class="alert alert-success"><!-- pill medicamentoRpFav 1 -->
              <strong>Medicamento RP ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i> </a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar a Receta"> <i class="medicamentoRp icon-plus pull-right"></i> </a><!-- agregar favorito seleccionado -->
         </div><!-- end pill diagnosticoFav 1-->
         <div class="alert alert-success"><!-- pill medicamentoRpFav 1 -->
              <strong>Medicamento RP ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar a Receta"> <i class="medicamentoRp icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
         </div><!-- end pill medicamentoRpFav 1-->
       
       </div>
      </div>
      <!-- fin medicamentos RP favoritos -->




    </div><!-- fin de la barra de favoritos -->

<div id="modalDetalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Paracetamol</h3>
    </div>
    <div class="modal-body">
        <div class="span3"><img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
        <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        <p>Cantidad: <input type="text" placeholder="Indique Cantidad">Miligramos (mg)</p>
        <p>Cada :<input type="text" placeholder="frequencia">Horas (hrs)</p>
        <p>Por :<input type="text" placeholder="periodo">Dias</p>
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"></textarea></center>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="#" role="button" class="btn btn-warning">Prescribir</a>
    </div>
</div><!-- fin popup informacion del medicamento -->  
    
    
    
    
    
    
    
    
<script>
   /**
    * comportamiento de los paneles colapsables (que cambien los iconos segun corresponda)
    * de favoritos
    * @author: Cesar González
    */ 
   
   $('#diagnosticosFav').on('hide',function(){
       $('button[data-target="#diagnosticosFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#diagnosticosFav').on('show',function(){
       $('button[data-target="#diagnosticosFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
   $('#medicamentosFav').on('hide',function(){
       $('button[data-target="#medicamentosFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#medicamentosFav').on('show',function(){
       $('button[data-target="#medicamentosFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
   $('#medicamentosRpFav').on('hide',function(){
       $('button[data-target="#medicamentosRpFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#medicamentosRpFav').on('show',function(){
       $('button[data-target="#medicamentosRpFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
     
   

   $('a[href="#borrarFav"]').click(function(){
       /**
        * funcion que elimina de favoritos
        * se debe primero eliminar de la bbdd vía ajax
        * luego se elimina del DOM
        */
       $(this).parent('span').remove();
   });  
</script>