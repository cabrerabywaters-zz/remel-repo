<!-- barra de favoritos -->
<div class="row-fluid show-grid img-rounded" id="favBar" style="background-color: #B0BED9">
    <button class="btn btn-block" disabled>
        <a class="btn pull-left" href="#" id="refreshFav" title="Actualizar Favoritos"><i class="icon-refresh"></i></a>
        <strong><i class="icon-star"></i> Mis Favoritos</strong>
        <a href="#" class="closeBar"><i class="icon-remove pull-right"></i></a>
    </button>

    <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
        <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Diagnósticos Frecuentes
    </button>

    <div id="diagnosticosFav" class="collapse">
        <div class="span10 offset1">
		<center><input type="text" placeholder="Filtrar Diagnosticos Favoritos" id="filtrarDiagnosticosFav"></center>
                    <?php
                       /**
     * Include_once(Diagnosticos)
     * 
     * Esta funcion incluye los archivos de los controladores 
	 * que despliegan la informacion de un diagnostico 
	 *
     */
		include_once(dirname(__FILE__)."/../../Capa_Controladores/diagnosticoComun.php");	
		include_once(dirname(__FILE__)."/../../Capa_Controladores/diagnostico.php");
	
		$idMedico = $_SESSION['idMedicoLog'][0];
		$diagnosticosComunes = DiagnosticoComun::Seleccionar($idMedico);
		// despliega los datos de medicamentos favoritos Segun el id del medico dede la base de datos
		foreach($diagnosticosComunes as $diagnosticoComun){
		?>
            <div class="alert alert-info diagFav" idDiagnosticoFav="<?php echo $diagnosticoComun['Diagnosticos_idDiagnostico']; ?>"><!-- pill diagnosticoFav 1 -->
                <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos -->
                <a href="#" rel="tooltip" title="Agregar a Receta" class="addFavReceta"> <i class="icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
            	<strong><?php
				 /**
     * BuscarNombreDiagnosticoPorId(Diagnosticos_idDiagnostico)
     * 
     * Esta funcion llama a el controlador y despliega los
	 * datos del medico segun su diagnostico favorito
	 *
     */
				 $nombre = Diagnostico::BuscarNombreDiagnosticoPorId($diagnosticoComun['Diagnosticos_idDiagnostico']); echo $nombre['Text']; ?></strong>
	    </div><!-- end pill diagnosticoFav 1-->
		<?php
		}
		?>
            
        </div>
    </div>
    <!-- fin diagnosticos favoritos-->

    <!-- medicamentos favoritos -->
    <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#medicamentosFav">
        <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos Favoritos
    </button>

    <div id="medicamentosFav" class="collapse in">

        <div class="span10 offset1">
            <center><input type="text" placeholder="Filtrar Medicamentos Favoritos" id="filtrarMedicamentosFav"></center>
            <?php
            //session_start();
 /**
     * Include_once(Diagnosticos)
     * 
     * Esta funcion incluye los archivos de los controladores 
	 * que despliegan la informacion de un diagnostico 
	 * y la agrupa por id del medicamento
	 *
     */
            include_once(dirname(__FILE__) . "/../../Capa_Datos/llamarQuery.php");
            include_once(dirname(__FILE__)."/../../Capa_Controladores/favoritosRp.php");
            $idMedico = $_SESSION['idMedicoLog'][0];
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
                            $unidadConsumo = $favRP['unidadConsumo'];
                            $idUnidadConsumo = $favRP['idUnidadConsumo'];
                            $frecuencia = $favRP['Frecuencia'];
                            $unidadFrecuencia = $favRP['unidadFrecuencia'];
                            $idUnidadFrecuencia = $favRP['idUnidadFrecuencia'];
                            $periodo = $favRP['Periodo'];
                            $unidadPeriodo = $favRP['unidadPeriodo'];
                            $idUnidadPeriodo = $favRP['idUnidadPeriodo'];
                       echo "<li><a href='#' class='addFavRP' idFavRP='".$idFav."' cantidad='".$cantidad."' unidadConsumo='".$unidadConsumo."' idUnidadConsumo='".$idUnidadConsumo."'
                            frecuencia='".$frecuencia."' unidadFrecuencia='".$unidadFrecuencia."' idUnidadFrecuencia='".$idUnidadFrecuencia."' periodo='".$periodo."' unidadPeriodo='".$unidadPeriodo."' idUnidadPeriodo='".$idUnidadPeriodo."'>".$nombreCorto."</a></li>";
                            
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

		$('#filtrarDiagnosticosFav').keydown(function(){
                            var filtroDiag = $(this).val().toUpperCase();
                            if( filtroDiag == ''){
                                    $('#diagnosticosFav').children('div').children('div.diagFav').each(function(index, domEle){
                                            $(domEle).show();
                                    });
                            }
                            else {
                                    $('#diagnosticosFav').children('div').children('div.diagFav').each(function(index, domEle){
                                            if( $(domEle).children('strong').text().indexOf(filtroDiag) !== -1){
                                                    $(domEle).show();
                                            } 
                                            else {
                                                    $(domEle).hide();
                                            }
                                    });
                            }
        });

	
		    $('#filtrarMedicamentosFav').keydown(function(){
			    var filtroMed = $(this).val().toUpperCase();
			    if( filtroMed == ''){
				    $('#medicamentosFav').children('div').children('div.favRP').each(function(index, domEle){
					    $(domEle).show();
				    });
			    }
			    else {
				    $('#medicamentosFav').children('div').children('div.favRP').each(function(index, domEle){
					    if( $(domEle).children('strong').text().indexOf(filtroMed) !== -1){
						    $(domEle).show();
					    } 
					    else {
						    $(domEle).hide();
					    }
				    });
			    }
	});

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
        * funcionalidad de los botones de agregar un medicamento desde favoritos
        * a la receta
        */
     $(document).ready(function(){ 
      $('.addFavRP').unbind('click').on("click",function(){
          var divPadre = $(this).parent().parent().parent().parent('div');
           var idMedicamento = divPadre.attr('identificador');
           var nombreComercial = divPadre.children('strong').text();
           var cantidad = $(this).attr('cantidad');
           var unidadConsumo = $(this).attr('idUnidadConsumo');
           var frecuencia = $(this).attr('frecuencia');
           var unidadFrecuencia = $(this).attr('idUnidadFrecuencia');
           var periodo = $(this).attr('periodo');
           var unidadPeriodo = $(this).attr('idUnidadPeriodo');
           var fechaInicio = "<?php echo date("d-m-Y") ;?>";
           
           var cuanto = $(this).attr('unidadConsumo'); // nombre de la unidad de consumo
           var cadaCuanto = $(this).attr('unidadFrecuencia'); //nombre de la unidad de frecuencia
           var porCuanto = $(this).attr('unidadPeriodo');
           
           var pill = '\
            <div class="alert alert-success medicamentoRecetado" idMedicamento="'+idMedicamento+'"\n\
            cantidadMedicamento="'+cantidad+'" unidadDeConsumo="'+unidadConsumo+'" frecuenciaMedicamento="'+frecuencia+'" unidadFrecuencia="'+unidadFrecuencia+'" periodoMedicamento="'+periodo+'" unidadPeriodo="'+unidadPeriodo+'"\n\
            comentarioMedicamento=" " diagnosticoAsociado="0" fechaInicio="'+fechaInicio+'" fechaFin=" ">\n\
            <button type="button" class="close" data-dismiss="alert">×</button><a href=# class="editMedicamento pull-right" data-target="#detalleMedicamento" id="editarMedicamento" rel="tooltip" title="Editar Diagnostico"><i class="icon-pencil"></i> </a>\n\
            <div class="infoMedicamento"><strong class="nombreComercial">'+nombreComercial+'</strong><br><strong>Cantidad: </strong>'+cantidad+' <span class="unidadConsumo">'+cuanto+'</span><br><strong>Frecuencia: </strong>'+frecuencia+' <span class="unidadFrecuencia">'+cadaCuanto+'</span><br><strong>Periodo: </strong>'+periodo+' <span class="unidadPeriodo">'+porCuanto+'</span>\n\
            </div></div>';
                
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
           

           $('.editMedicamento').click(function(){
            //BOTON EDITAR
        //AUTOR: MAX SILVA mit master oviedo
            
            var idRecetaEdit = $(this).parent().attr('idMedicamento');
            
            $('#Medicamentos').val(
            $(this).parent().attr('medicamentos')
        );
           
            //$('#warnings').html('')
            
            $('#detalleMedicamentoLabel').text(
            $(this).parent().children('strong').text()
        );
            
            /*$('#idMedicamento').text(
            $(this).parent().attr('idmedicamento')
                );
            
            $('#descripcionMedicamento').text(
            $(this).parent().attr('descripcionmedicamento').text()
        ); */
            
            $('#cantidadMedicamento').val(
            $(this).parent().attr('cantidadmedicamento')
        );
            
            $('#frecuenciaMedicamento').val(
            $(this).parent().attr('frecuenciamedicamento')
        );
            
            $('#periodoMedicamento').val(
            $(this).parent().attr('periodomedicamento')
        );
            
            $('#comentarioMedicamento').val(
            $(this).parent().attr('comentariomedicamento')
        );
            
            $('#tipoReceta').text(
            $(this).parent().attr('tiporeceta')
        );
            
            $('#diagnosticoAsociado').val(
            $(this).parent().attr('diagnosticoasociado')
        );
            
            $('input[name="fechaInicio"]').val(
            $(this).parent().attr('fechainicio')
        );
               
            
            $('#guardar_cambios_receta').show().attr('disabled',false);
            $('#agregarMedicamento').hide();
            $('#detalleMedicamento').collapse('show');
               $('html, body').animate({
                     scrollTop: $("#detalleMedicamento").offset().top
                 }, 500);
            
            
            
            $('#guardar_cambios_receta').unbind('click').on('click',function(){
                
                var cantidad_medicamento = $('#cantidadMedicamento').val();
                var frecuencia_medicamento = $('#frecuenciaMedicamento').val();
                var periodo_medicamento = $('#periodoMedicamento').val();
                var comentario_medicamento = $('#comentarioMedicamento').val();
                var tipo_receta = $('#tipoReceta').text();
                var diagnostico_asociado = $('#diagnosticoAsociado').val();
                var id_medicamento = $('#idMedicamento').val();
                var fecha_inicio = $('input[name="fechaInicio"]').val();
             
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('cantidadmedicamento',cantidad_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('frecuenciamedicamento',frecuencia_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('periodomedicamento',periodo_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('comentariomedicamento',comentario_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('tiporeceta',tipo_receta);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('diagnosticoasociado',diagnostico_asociado);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('fechainicio',fecha_inicio);
                
                $('.infoMedicamento').html('');
                var cuanto = $('select[name="unidadDeConsumo"] :selected').text(); // nombre de la unidad de consumo
                var cadaCuanto = $('select[name="unidadFrecuencia"] :selected').text(); //nombre de la unidad de frecuencia
                var porCuanto = $('select[name="unidadPeriodo"] :selected').text();
                $('.infoMedicamento').html('<strong class="nombreComercial">'+nombreComercial+'</strong><br><strong>Cantidad: </strong>'+cantidad_medicamento+' <span class="unidadConsumo">'+cuanto+'</span><br><strong>Frecuencia: </strong>'+frecuencia_medicamento+' <span class="unidadFrecuencia">'+cadaCuanto+'</span><br><strong>Periodo: </strong>'+periodo_medicamento+' <span class="unidadPeriodo">'+porCuanto+'</span>')
        
              
                //se redirecciona la vista de la pantalla hacia receta.
                $('html, body').animate({
                    scrollTop: $("#tabConsulta").offset().top
                  }, 1000);
                //se limpian los campos y se esconde el modal 
                $('#detalleMedicamento').collapse('hide');
                $('#Medicamentos').val('');
                $('#warnings').html('');
                $('#boton_medicamentos').attr('disabled','disabled');
                $('#detalleMedicamentoLabel').text('');
                $('#idMedicamento').text('');
                $('#descripcionMedicamento').text('');
                $('#cantidadMedicamento').val('');
                $('#frecuenciaMedicamento').val('');
                $('#periodoMedicamento').val('');
                $('#comentarioMedicamento').val('');
                $('#tipoReceta').text('');
                $('#guardar_cambios_receta').hide();
                $('#agregarMedicamento').show();
                
            });
         
                    
        });//end click 
    

       });// end click 
      });// end ready
</script>
<script>
  $(document).ready(function(){ 
  /**
  * Ajax que agrega los diagnosticos favoritos del medico
  *
  * se envia el id diagnostico 
  * devuelve 1 si se agrego
  * y 0 si no se agrego
  * @retuns output
  *
  * @param idDiagnotico
   **/
   $('.addFav').click(function(){
      var idDiagnostico = $('#id_diagnostico').text();
      $.ajax({
          url:'../../../ajax/agregarDiagnosticoComun.php',
          type: "post",
          data: {"idDiagnostico":idDiagnostico},
          success: function(output){
              if(output== 1){
                  $('.addFav').attr('disabled','disabled');
              }
              else{
                  $('.addFav').attr('disabled','disabled');
              }
          }//end success
          
          
      }); // end ajax
      
      
       
       
       
   }); //end click      
    
}); // end ready
</script><!-- agregar un diagnostico A favoritos -->
<script>
   $('#modalDiagnostico').collapse({toggle:false});
   
   $(document).ready(function(){
        $('.addFavReceta').click(function(){
       
        var idDiagnostico= $(this).parent().attr('idDiagnosticoFav');
        
                    $.ajax({ 
                    url: '../../../ajax/informacionDiagnostico.php',
                    data: {"diagnostico":idDiagnostico},
                    type: 'post',
                    async: true,
                    success: function(output) {
                        var data = jQuery.parseJSON(output);
                      $('#modalDiagnosticoLabel').text(data['Nombre']) ; //nombre de la enfermedad
                      $('#id_diagnostico').html(data['idDiagnostico']);// id de la enfermedad

//                        if(data['Es_Ges'] != null){ // el diagnostico es ges se informa con un pill y un
//                            $('#modalDiagnosticoLabel').append('<span class="badge badge-success">Considerado GES por MINSAL</span>')
//                            $('#esGES').html('1');
//                        } // end if
                      //resto de la informacion que se busca desplegar en el popup
                      $('#guardar_cambios').hide();
                      $('#guardar_diagnostico').removeAttr('disabled');
                      $('.addFav').attr('disabled','disabled');
                      if($('#consultaToggle').is('.active')==false){
                        $('#consultaToggle').children().click();
                        $('html, body').animate({
                        scrollTop: $('a[href="#collapseOne1"]').offset().top}, 500);
                       }// end if
                      else{
                          if($('#collapseOne1').is('.in')==false){
                             $('#collapseOne1').click(); 
                          }// end if
                      
                      }//end else
                      
                      $('#modalDiagnostico').collapse('show');  
                    }//end success
                 });// end ajax
                 
       });//end click
   });//end ready    
</script><!-- agregar un diagnostico DESDE favoritos -->
<script>
   $(document).ready(function(){
       $('')
       
       
   }); // 
</script><!-- agregar un medicamento A favoritos -->
