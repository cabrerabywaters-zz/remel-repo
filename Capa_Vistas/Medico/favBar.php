<div id="favBar" class="span3 pull-right img-rounded" style="background-color: #B0BED9"><!-- barra de favoritos -->
      <button class="btn btn-large btn-block btn-primary"><i class="icon-star icon-white"></i> Mis Favoritos</button>
      
      <!-- diagnosticos Favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
           <i class="icon-circle-arrow-up icon-white"></i> Diagnosticos
      </button>
      <div id="diagnosticosFav" class="collapse in span2">
          <span class="label label-info"><!-- pill diagnosticoFav 1 -->
              Diagnostico ej 
              <a href="#ejemplo"> <i class="icon-plus-sign icon-white"></i></a>
              <a href="#ejemplo"> <i class="icon-remove-sign icon-white"></i></a>
          </span><!-- end pill diagnosticoFav 1-->
          <span class="label label-info"><!-- pill diagnosticoFav 1 -->
              Diagnostico ej 
              <a href="#ejemplo"> <i class="icon-plus-sign icon-white"></i></a>
              <a href="#ejemplo"> <i class="icon-remove-sign icon-white"></i></a>
          </span><!-- end pill diagnosticoFav 1-->
      </div>
      <!-- fin diagnosticos favoritos-->
      
      <!-- medicamentos favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#medicamentosFav">
          <i class="icon-circle-arrow-up icon-white"></i> Medicamentos 
      </button>
      <div id="medicamentosFav" class="collapse in span2">
          <span class="label label-info"><!-- pill medicamentoFav 1 -->
              Medicamento ej 
              <a href="#ejemplo"> <i class="icon-plus-sign icon-white"></i></a>
              <a href="#ejemplo"> <i class="icon-remove-sign icon-white"></i></a>
          </span><!-- pill medicamentoFav 1 -->
           <span class="label label-info"><!-- pill medicamentoFav 1 -->
              Medicamento ej 
              <a href="#ejemplo"> <i class="icon-plus-sign icon-white"></i></a>
              <a href="#ejemplo"> <i class="icon-remove-sign icon-white"></i></a>
          </span><!-- pill medicamentoFav 1 -->
      </div>
      <!-- fin medicamentos favoritos -->






</div><!-- fin de la barra de favoritos -->

<script>
   /**
    * comportamiento de los paneles colapsables
    * @author: Cesar González
    */ 
   
   $('#diagnosticosFav').on('hide',function(){
       $('button[data-target="#diagnosticosFav"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");})
   $('#diagnosticosFav').on('show',function(){
       $('button[data-target="#diagnosticosFav"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");})
   $('#medicamentosFav').on('hide',function(){
       $('button[data-target="#medicamentosFav"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");})
   $('#medicamentosFav').on('show',function(){
       $('button[data-target="#medicamentosFav"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");})
     
       

</script>