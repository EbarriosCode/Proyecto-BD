<?php 
	require_once('../view/section/header.php');
 ?>
<body>
	 <div class="container">
 		<div class="row">

			<div class="pull-right"><a href="Proyectos_controlador.php"><button class="btn btn-warning">Regresar <span class="icon-hand-pointer-o"></span></button></a></div>
 			<h2 class="text-center">Resultado Búsqueda de Proyecto <span class="icon-plus"></span></h2><hr>
		<h4 class="text-center"><?php 
 										if(count($object) > 0)
 											echo "Se encontrarón ".count($object)." Coincidencias"; 
 										else
 											echo "No se Encontrarón Coincidencias";
 									?></h4><hr>
			<table class="table table-striped table-condensed table-hover">
				<tr class="success">
					<td><strong>ID</strong></td>
					<td><strong>PROYECTO</strong></td>
					<td><strong>DESCRIPCION PROYECTO</strong></td>
					<td colspan="2"><strong>OPCIONES</strong></td>
				</tr>
				<?php foreach ($object as $proyecto): ?>
				<tr>
					<td><?php echo $proyecto['ID'];?></td>
					<td><?php echo $proyecto['NOMBRE'];?></td>
					<td><?php echo $proyecto['DESCRIPCION'];?></td>
					<td><button class="btn btn-success" data-target="#modal-editar" data-toggle="modal" onclick="cargarDatosModal('<?php echo $proyecto['ID'];?>','<?php echo $proyecto['NOMBRE'];?>','<?php echo $proyecto['DESCRIPCION'];?>');">Editar<span class="icon-pencil"></span></button></td>
					<td><button onclick="confirmarDelete('borrar',<?php echo $proyecto['ID'];?>);" class="btn btn-danger">Eliminar<span class="icon-trash"></span></button></td>
				</tr>
			<?php endforeach; ?>
			</table>
<hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
 		</div>
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
			<script>
				function validar(e){
					tecla = (document.all) ? e.keyCode : e.which;
					if(tecla == 8) return true;
					if(tecla == 9) return true;
					if(tecla == 11) return true;

					patron = /[A-Za-z0-9áéíóúÁÉÍÓÚ`\s\t]/;

					tecla = String.fromCharCode(tecla);
					return patron.test(te);
				}
			</script>
</body>