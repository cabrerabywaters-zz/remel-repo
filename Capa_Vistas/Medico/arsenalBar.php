
<!-- barra de arsenal -->
<div class="row-fluid show-grid img-rounded" id="arsenalBar" style="background-color: #7aba7b"> 
    <button class="btn btn-block" disabled>
        <i class="icon-list"></i> Arsenal
        <a href="#" class="closeBar"><i class="icon-remove pull-right"></i></a>
      </button>
    <div id="medicamentosArsenal">
       <div class="span10 offset1">
          <?php
		include_once(dirname(__FILE__).'/../../Capa_Datos/llamarQuery.php');
		$sucursalRUT = $lugar['idSucursal'];
		$queryString = "SELECT Nombre_Comercial, idMedicamento, Laboratorios.Nombre
FROM Laboratorios, Arsenal, Medicamentos, Expendedores, Sucursales
WHERE Medicamentos_idMedicamento = idMedicamento
AND Expendedores_idExpendedores = idExpendedores
AND RUT = Sucursales_RUT
AND Laboratorio_idLaboratorio = Laboratorios.ID
AND Sucursales_RUT =  '$sucursalRUT';";
		$res = CallQuery($queryString);
		while($row = $res->fetch_assoc()){
			$nombre = $row['Nombre_Comercial'] . "-" . $row['Nombre'];
			$id = $row['idMedicamento'];
			echo "<div class='alert alert-warning' identificador='$id'>\r\n";
			echo "<strong>$nombre</strong>\r\n";
			echo "<a href='#' rel='tooltip' title='Agregar a Favoritos'> <i class='icon-star pull-right'></i></a><!-- eliminar de favoritos -->\r\n
              			<a href='#' rel='tooltip' title='Agregar a Receta' class='detalleMedicamento'> <i class='icon-plus pull-right'></i></a><!-- agregar favorito seleccionado -->\r\n
			</div>\r\n";
		}
          
          ?>
       </div>
      </div>
    
</div><!-- fin de la barra de arsenal -->
