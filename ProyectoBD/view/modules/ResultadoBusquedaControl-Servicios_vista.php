<?php 
	require_once('../view/section/header.php');
 ?>
 <body>
 		<div class="container">
		<div class="row">
		<div class="pull-right"><a href="listaControlService_controlador.php"><button class="btn btn-warning">Regresar <span class="icon-hand-pointer-o"></span></button></a></div>
					<a href="ControlService_controlador.php" class="text-left"><button class="btn btn-primary">Nuevo<span class="icon-plus"></span></button></a>
					<h2 class="text-center">Resultado Búsqueda Control de Servicios <span class="icon-search"></span></h2><hr>
							<h4 class="text-center"><?php 
 										if(count($object) > 0)
 											echo "Se encontrarón ".count($object)." Coincidencias"; 
 										else
 											echo "No se Encontrarón Coincidencias";
 									?></h4><hr>
			<div class="table-responsive">
				<form action="" method="GET">
				<table class="table table-hover table-striped table-condensed">
					<thead>
						<tr class="active success">
							 <td><strong>ID</strong></td>
							 <td><strong>EMPRESA CLIENTE</strong></td>
							 <td><strong>RESPONSABLE</strong></td>
							 <td><strong>PROYECTO</strong></td>
							 <td><strong>SERVICIO</strong></td>
							 <td><strong>ENCARGADO SERVICIO</strong></td>						 
							 <td><strong>FECHA INICIO</strong></td>	
							 <td><strong>HORA INICIO</strong></td>
							 <td><strong>FECHA FIN</strong></td>
							 <td><strong>HORA FIN</strong></td>
							 <td><strong>DURACION EN HRS</strong></td>
							 <td><strong>DESCRIPCIÓN</strong></td>
							 <td colspan="2"><strong>OPCION</strong></td>
						 </tr>
					</thead>
					<tbody>
					<?php foreach($object as $registro): ?>
						<tr>
							<td><?php echo $registro['ID']; ?></td>
							<td><?php echo $registro['EMPRESA_CLIENTE']; ?></td>
							<td><?php echo $registro['RESPONSABLE_EMPRESA_CLIENTE']; ?></td>
							<td><?php echo $registro['PROYECTO']; ?></td>
							<td><?php echo $registro['SERVICIO']; ?></td>
							<td><?php echo $registro['ENCARGADO_PRESTAR_SERVICIO']; ?></td>
							<td><?php echo $registro['FECHA_INICIO']; ?></td>	
							<td><?php echo $registro['HORA_INICIO']; ?></td>
							<td><?php echo $registro['FECHA_FIN']; ?></td>
							<td><?php echo $registro['HORA_FIN']; ?></td>
							<td><?php echo $registro['DURACION_SERVICIO']; ?></td>
							<td><?php echo $registro['DESCRIPCION']; ?></td>
							<td><a href="ControlServiceCRUD_controlador.php? accion=editar
																			&id=<?php echo $registro['ID'];?> 
																			&empresa_cliente=<?php echo $registro['EMPRESA_CLIENTE'];?>
																			&responsable=<?php echo $registro['RESPONSABLE_EMPRESA_CLIENTE'];?>
																			&proyecto=<?php echo $registro['PROYECTO'];?>
																			&servicio=<?php echo $registro['SERVICIO'];?>
																			&encargado=<?php echo $registro['ENCARGADO_PRESTAR_SERVICIO'];?>
																			&fechaInicio=<?php echo $registro['FECHA_INICIO'];?>
																			&horaInicio=<?php echo $registro['HORA_INICIO'];?>
																			&fechaFin=<?php echo $registro['FECHA_FIN'];?>
																			&horaFin=<?php echo $registro['HORA_FIN'];?>
																			&duracion=<?php echo $registro['DURACION_SERVICIO'];?>
																			&descripcion=<?php echo $registro['DESCRIPCION'];?>">
																			<button type="button" id="btn-editar" class="btn btn-success">Editar<span class="icon-pencil"></span></button>
																				</a></td>
							<td><button type="button" onclick="confirmarDelete('borrar',<?php echo $registro['ID'];?>);" class="btn btn-danger">Borrar<span class="icon-trash"></span></button></td>
						</tr>	
					</tbody>
					 <?php endforeach;?>
				</table>
				</form>
			</div>				
		</div>
	<hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
	</div>

	<script>
			        		function confirmarDelete(accion,idDelete)
				{	
				   if (window.confirm("Esta seguro que desea eliminar este registro? ") == true)
				      {
				         window.location = "ControlServiceCRUD_controlador.php?accion="+accion+"&id="+idDelete;
				      }
				}
	</script>
 </body>