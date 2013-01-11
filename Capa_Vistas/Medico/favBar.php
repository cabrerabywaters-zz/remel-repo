<div id="favBar" class="span3 pull-right img-rounded" style="background-color: #B0BED9"><!-- barra de favoritos -->
    <div class="row-fluid show-grid">
      <button class="btn btn-large btn-block btn-primary"><i class="icon-star icon-white"></i> Mis Favoritos</button>
      
      <!-- diagnosticos Favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
           <i class="icon-circle-arrow-up icon-white" rel="tooltip" title="Ocultar"></i> Diagnosticos
      </button>
      
      <div id="diagnosticosFav" class="collapse in">
          <div class="span9 offset1">
              
          <span class="label label-info"><!-- pill diagnosticoFav 1 -->
              Diagnostico ej 
              <a href="#agregarFav" rel="tooltip" title="Agregar"> <i class="icon-plus-sign icon-white"></i></a><!-- agregar favorito seleccionado -->
              <a href="#borrarFav" rel="tooltip" title="Eliminar"> <i class="icon-remove-sign icon-white"></i></a><!-- eliminar de favoritos -->
          </span><!-- end pill diagnosticoFav 1-->
          <span class="label label-info"><!-- pill diagnosticoFav 1 -->
              Diagnostico ej 
              <a href="#agregarFav" rel="tooltip" title="Agregar"> <i class="icon-plus-sign icon-white"></i></a><!-- agregar favorito seleccionado -->
              <a href="#borrarFav" rel="tooltip" title="Eliminar"> <i class="icon-remove-sign icon-white"></i></a><!-- eliminar de favoritos -->
          </span><!-- end pill diagnosticoFav 1-->
          
          </div>
      </div>
      <!-- fin diagnosticos favoritos-->
      
      <!-- medicamentos favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#medicamentosFav">
          <i class="icon-circle-arrow-up icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos
      </button>
      
      <div id="medicamentosFav" class="collapse in ">
       <div class="span9 offset1">
           
          <span class="label label-info"><!-- pill medicamentoFav 1 -->
              Medicamento ej 
              <a href="#agregarFav" rel="tooltip" title="Agregar"> <i class="icon-plus-sign icon-white"></i></a><!-- agregar favorito seleccionado -->
              <a href="#borrarFav" rel="tooltip" title="Eliminar"> <i class="icon-remove-sign icon-white"></i></a><!-- eliminar de favoritos -->
          </span><!-- pill medicamentoFav 1 -->
           <span class="label label-info"><!-- pill medicamentoFav 1 -->
              Medicamento ej 
              <a href="#agregarFav" rel="tooltip" title="Agregar"> <i class="icon-plus-sign icon-white"></i></a><!-- agregar favorito seleccionado -->
              <a href="#borrarFav" rel="tooltip" title="Eliminar"> <i class="icon-remove-sign icon-white"></i></a><!-- eliminar de favoritos -->
           </span><!-- pill medicamentoFav 1 -->
       
       </div>
      </div>
      <!-- fin medicamentos favoritos -->





    </div>
</div><!-- fin de la barra de favoritos -->

<script>
   /**
    * comportamiento de los paneles colapsables
    * @author: Cesar González
    */ 
   
   $('#diagnosticosFav').on('hide',function(){
       $('button[data-target="#diagnosticosFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#diagnosticosFav').on('show',function(){
        var diagnosticosFavNum = $('#diagnosticosFav').children().children('span').size();
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
     
   /*
    * eliminación de un elemento de la barra favoritos
    * haciendo click en el boton eliminar de favoritos
    *+tooltip correspondientes por boton
    */
   $('a[rel="tooltip"]').tooltip({placement:"right"});
   
   
   $('a[href="#borrarFav"]').click(function(){
       /**
        * funcion que elimina de favoritos
        * se debe primero eliminar de la bbdd vía ajax
        * luego se elimina del DOM
        */
       $(this).parent('span').remove();
   });

   
   /*
    * agregar un elemento a la receta al hacer click
    * desde la barra de favori
    */
</script>