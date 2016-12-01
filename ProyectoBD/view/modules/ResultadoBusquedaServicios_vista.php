<?php 
	require_once('../view/section/header.php');
 ?>

 <body>
 	<div class="container">
 			<div class="pull-right"><a href="Servicios_controlador.php"><button class="btn btn-warning">Regresar <span class="icon-hand-pointer-o"></span></button></a></div>
 			<h2 class="text-center">Resultado Búsqueda de Servicios <span class="icon-search"></span></h2><hr>
 		<div class="row">
		<h4 class="text-center"><?php 
 										if(count($object) > 0)
 											echo "Se encontrarón ".count($object)." Coincidencias"; 
 										else
 											echo "No se Encontrarón Coincidencias";
 									?></h4><hr> 		
 			<div class="table-responsive">
				<table class="table table-striped table-condensed table-hover">
					<tr class="info">
						<td><strong>ID</strong></td>
						<td><strong>SERVICIO</strong></td>
						<td><strong>DESCRIPCION SERVICIO</strong></td>
						<td colspan="2"><strong>OPCIONES</strong></td>
					</tr>
					<?php foreach ($object as $servicio): ?>
					<tr>
						<td><?php echo $servicio['ID'];?></td>
						<td><?php echo $servicio['NOMBRE'];?></td>
						<td><?php echo $servicio['DESCRIPCION'];?></td>
						<td><button class="btn btn-success" data-target="#modal-editar" data-toggle="modal" onclick="cargarDatosModal('<?php echo $servicio['ID'];?>','<?php echo $servicio['NOMBRE'];?>','<?php echo $servicio['DESCRIPCION'];?>');">Editar<span class="icon-pencil"></span></button></td>
						<td><button onclick="confirmarDelete('borrar',<?php echo $servicio['ID'];?>);" class="btn btn-danger">Eliminar<span class="icon-trash"></span></button></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>

			 <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>EditarServicios</strong><span class="icon-pencil"></span></h2>
                            </div>
                            <div class="modal-body">
                                <form action="Servicios_controlador.php" method="POST">
                                    <!--<div class="form-group"> 
                                    	<label for="id-servicio">Id:</label>
                                    	<input type="number" name="id-servicio" id="id-servicio" class="form-control" disabled>
                                    </div>-->
									<input type="hidden" id="id-servicio" name="id-servicio">	
                                    <div class="form-group">
                                        <label for="nombre">Nombre Servicio:</label>	
                                        <input type="text" id="nombre-servicio" name="nombre-servicio" class="form-control" value="<?php //echo $getServicio; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripción Servicio:</label>
                                        <input type="text" id="descripcion-servicio" name="descripcion-servicio" class="form-control" required>
                                    </div>

                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" id="actualizar" name="actualizar" value="Actualizar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>
<hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>

 		</div>
 	</div>
 	<script>
        		function confirmarDelete(accion,idDelete)
				{	
				   if (window.confirm("Esta seguro que desea eliminar este registro? ") == true)
				      {
				         window.location = "Servicios_controlador.php?accion="+accion+"&id="+idDelete;
				      }
				}
        	</script>  
			<script>
				function cargarDatosModal(id,nombre,descripcion){
					var idServicio = id;
					var nombreServicio = nombre;
					var descripcionServicio = descripcion;
					//alert(id+nombre+descripcion);

					$("#id-servicio").val(id);
					$("#nombre-servicio").val(nombreServicio);
					$("#descripcion-servicio").val(descripcionServicio);
				}

				$('#actualizar').click(function()
				{
					alert('Registro Actualizado Correctamente');
				});

			</script>
 </body>