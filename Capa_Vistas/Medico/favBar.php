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
           
         <div class="alert alert-success" identificador="1"><!-- pill medicamentoFav 1 -->
              <strong>Medicamento ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i> </a><!-- eliminar de favoritos --> 
              <a href="#" rel="tooltip" title="Agregar a Receta" class="detalleMedicamento"> <i class="icon-plus pull-right"></i> </a><!-- agregar favorito seleccionado -->
         </div><!-- end pill diagnosticoFav 1-->
         <div class="alert alert-success" identificador="2"><!-- pill medicamentoFav 1 -->
              <strong>Medicamento ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#" rel="tooltip" title="Agregar a Receta" class="detalleMedicamento"> <i class="icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
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

  <!-- Modal detalleMedicamento -->
  <?php include('detalleMedicamento.php'); ?>
  <!-- Modal detalleMedicamento -->

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
     
 
</script>

<script>
$('a[href="#borrarFav"]').unbind('click').on('click',function() {
    var idFavoritoRP = $(this).parent().attr('idFavorito');
    $('a[href="#borrarFav"]').remove();
    alert('¿Seguro que desea eliminar este favorito?')
    $.ajax({
    url: "../../ajax/borrarFavorito.php", 
              type: "POST",
              data: {idFavoritoRP:idFavorito},
              success: function(output){
                  alert('Favorito eliminado correctamente!');
                  if(output == 1){// se eliminó correctamente de favoritos
                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
                        
                  }
              }//end success
              
                
            });//end ajax
        }); // click
        
       
        
        
        
$('a[href="#borrarFav"]').unbind('click').on('click',function() {
    var idFavoritoRP = $(this).parent().attr('idFavorito');
    $('a[href="#borrarFav"]').remove();
    alert('¿Seguro que desea eliminar este favorito?')
    $.ajax({
    url: "../../ajax/borrarFavorito.php", 
              type: "POST",
              data: {idFavoritoRP:idFavorito},
              success: function(output){
                  alert('Favorito eliminado correctamente!');
                  if(output == 1){// se eliminó correctamente de favoritos
                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
                        
                  }
              }//end success
              
                
            });//end ajax
        }); // click
        
        $('idFavoritoRP').remove();
        

</script>