<!-- barra de favoritos -->
<div class="row-fluid show-grid img-rounded" id="favBar" style="background-color: #B0BED9">
    <button class="btn btn-block" disabled>
        <a class="btn pull-left" href="#" id="refreshFav" title="Actualizar Favoritos"><i class="icon-refresh"></i></a>
        <strong><i class="icon-star"></i> Mis Favoritos</strong>
        <a href="#" class="closeBar"><i class="icon-remove pull-right"></i></a>
    </button>

    <!-- diagnosticos Favoritos -->
    <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
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
    <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#medicamentosFav">
        <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos Favoritos
    </button>

    <div id="medicamentosFav" class="collapse">

        <div class="span10 offset1">
            <br>
            <?php
            //session_start();
            include_once(dirname(__FILE__) . "/../../Capa_Datos/llamarQuery.php");
            include_once(dirname(__FILE__)."/../../Capa_Controladores/favoritosRp.php");
            $idMedico = $_SESSION['idMedicoLog'];
            $queryString = "SELECT Nombre_Comercial, idMedicamento, Laboratorios.Nombre
                FROM Laboratorios, Medicamentos, Favoritos_RP
                WHERE Medicamentos_idMedicamento = idMedicamento
                AND Laboratorio_idLaboratorio = Laboratorios.ID
                AND Medicos_idMedico = '$idMedico' GROUP BY idMedicamento";
            $res = CallQuery($queryString);
            while ($row = $res->fetch_assoc()) {
                $nombre = $row['Nombre_Comercial'] . "-" . $row['Nombre'];
                $idMedicamento = $row['idMedicamento'];
                

                echo "<div class='alert alert-warning favRP' identificador='$idMedicamento'>\r\n";
                echo "<div class='btn-group pull-right'>
                                <a class='btn btn-mini btn-success dropdown-toggle' data-toggle='dropdown' href='#'>
                                    Añadir <i class='icon-star icon-white'></i>
                                <span class='caret'></span>
                                </a>
                                <ul class='dropdown-menu'>";
                echo "<!-- nombres cortos	-->";
                
                $favoritos = FavoritosRp::R_obtenerFavoritoRP($idMedicamento, $idMedico);
                
                     foreach($favoritos as $favRP){
                            $idFav = $favRP['ID'];
                            $nombreCorto = $favRP['Nombre_Corto'];
                            $cantidad = $favRP['Cantidad'];
                            $unidadConsumo = $favRP['Unidad_de_Consumo_idUnidad_de_consumo'];
                            $frecuencia = $favRP['Frecuencia'];
                            $unidadFrecuencia = $favRP['Unidad_Frecuencia_ID'];
                            $periodo = $favRP['Periodo'];
                            $unidadPeriodo = $favRP['Unidad_Periodo_ID'];
                       echo "<li><a href='#' class='addFavRP' idFavRP='".$idFav."' cantidad='".$cantidad."' unidadConsumo='".$unidadConsumo."'
                            frecuencia='".$frecuencia."' unidadFrecuencia='".$unidadFrecuencia."' periodo='".$periodo."' unidadPeriodo='".$unidadPeriodo."'>".$nombreCorto."</a></li>";
                            
                    }
                
                echo "          </ul>
                                </div><strong><small id='nombreComercial'>$nombre</small></strong>\r\n</div>\r\n";
            }?> <br><br>
        </div>

    </div>
    <!-- fin medicamentos favoritos -->
</div><!-- fin de la barra de favoritos -->

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

    $(document).ready(function(){
//        $('#refreshFav').click(function(){
//            /*
//             * Función que refresca los medicamentos favoritos
//             * al hacer click en actualizar favoritos
//             */
//            $('.favRP').each(function(){
//                var idMedicamento = $(this).attr('identificador');
//                var favPadre = $(this)
//                favPadre.children().children('ul').html('')
//                $.ajax({
//                    url: "../../../ajax/mostrarFavoritoRP.php",
//                    data: {"idMedicamento":idMedicamento},
//                    type: "post",
//                    success:function(output){
//                        var data = $.parseJSON(output);
//                        $.each(data,function(i,favRP){
//                            var idFav = favRP['ID'];
//                            var nombreCorto = favRP['Nombre_Corto'];
//                            var cantidad = favRP['Cantidad'];
//                            var unidadConsumo = favRP['Unidad_de_Consumo_idUnidad_de_consumo'];
//                            var frecuencia = favRP['Frecuencia'];
//                            var unidadFrecuencia = favRP['Unidad_Frecuencia_ID'];
//                            var periodo = favRP['Periodo'];
//                            var unidadPeriodo = favRP['Unidad_Periodo_ID'];
//                            
//                            var lista = "<li><a href='#' class='addFavRP' idFavRP='"+idFav+"' cantidad='"+cantidad+"' unidadConsumo='"+unidadConsumo+"'\n\
//                            frecuencia='//"+frecuencia+"' unidadFrecuencia='"+unidadFrecuencia+"' periodo='"+periodo+"' unidadPeriodo='"+unidadPeriodo+"'>"+nombreCorto+"</a></li>";
//                            favPadre.children().children('ul').append(lista);
//
//                        })//end each medicamento encontrado
//                    }//end success
//                })//end ajax
//            });//end each favRP
//
//
//        });//end click
}); // end ready
</script>

<script>
       /*
        * funcionalidad de los botones de agregar un medicamento desde favoritos o desde arsenal
        * a la receta
        */
     $(document).ready(function(){ 
      $('.addFavRP').unbind('click').on("click",function(){
          var divPadre = $(this).parent().parent().parent().parent('div');
           var idMedicamento = divPadre.attr('identificador');
           var nombreComercial = divPadre.children('strong').text();
           var cantidad = $(this).attr('cantidad');
           var unidadConsumo = $(this).attr('unidadConsmo');
           var frecuencia = $(this).attr('frecuencia');
           var unidadFrecuencia = $(this).attr('unidadFrecuencia');
           var periodo = $(this).attr('periodo');
           var unidadPeriodo = $(this).attr('unidadPeriodo');
           var fechaInicio = "<?php $hoy=getdate(); echo $hoy['month'].'/'.$hoy['mday'].'/'.$hoy['year'];?>";
           
           var pill = '\
            <div class="alert alert-success medicamentoRecetado" onClick="ClickPill()" idMedicamento="'+idMedicamento+'"\n\
            cantidadMedicamento="'+cantidad+'" unidadDeConsumo="'+unidadConsumo+'" frecuenciaMedicamento="'+frecuencia+'" unidadFrecuencia="'+unidadFrecuencia+'" periodoMedicamento="'+periodo+'" unidadPeriodo="'+unidadPeriodo+'"\n\
            comentarioMedicamento=" " diagnosticoAsociado="0" fechaInicio="'+fechaInicio+'" fechaFin=" ">\n\
            <button type="button" class="close" data-dismiss="alert">×</button><a href=# class="editMedicamento pull-right" data-target="#detalleMedicamento" id="editarMedicamento" rel="tooltip" title="Editar Diagnostico"><i class="icon-pencil"></i> </a>\n\
            <strong>'+nombreComercial+'</strong>\n\
            </div>';
                
           $('#medicamentosRecetados').prepend(pill); // se agrega el pill del medicamento
           
          /* si se agregó un favorito cuando el inicio es la información del paciente
           * se muestra la sección correspondiente del modulo
           */
           if($('#collapseTwo2').is('.in')== true){
           
           $('html, body').animate({
            scrollTop: $("#moduloReceta").offset().top
           }, 2000);
           }
           else{
               $('#consultaToggle').children().click();
               $('#moduloReceta').click();
           }

       });// end click 
      });// end ready
</script>
