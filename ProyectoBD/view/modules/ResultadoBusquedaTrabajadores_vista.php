<?php 
	require_once('../view/section/header.php');
 ?>

 <body>
 	<div class="container">
 			<div class="pull-right"><a href="Consulta2Trabajadores_controlador.php"><button class="btn btn-warning">Regresar <span class="icon-hand-pointer-o"></span></button></a></div>
 			<h2 class="text-center">Resultado Búsqueda Trabajadores <span class="icon-search"></span></h2> <hr>
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
						<td><strong>NOMBRE</strong></td>
						<td><strong>TELEFONO</strong></td>
						<td><strong>DIRECCION</strong></td>
						<td><strong>PUESTO</strong></td>
						<td colspan="2"><strong>OPCIONES</strong></td>
					</tr>
					<?php foreach ($object as $respuesta): ?>
					<tr>
						<td><?php echo $respuesta['ID'];?></td>
						<td><?php echo $respuesta['NOMBRE'];?></td>
						<td><?php echo $respuesta['TELEFONO'];?></td>
						<td><?php echo $respuesta['DIRECCION'];?></td>
						<td><?php echo $respuesta['PUESTO'];?></td>

						<td><button class="btn btn-success" data-target="#modal-editar" data-toggle="modal" onclick="cargarDatosModal('<?php echo $respuesta['ID'];?>','<?php echo $respuesta['NOMBRE'];?>','<?php echo $respuesta['TELEFONO'];?>','<?php echo $respuesta['DIRECCION'];?>','<?php echo $respuesta['PUESTO'];?>');">Editar<span class="icon-pencil"></span></button></td>
						<td><button onclick="confirmarDelete('borrar',<?php echo $respuesta['ID'];?>);" class="btn btn-danger">Eliminar<span class="icon-trash"></span></button></td>
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
                                 <h2 class="text-center "><strong>Editar Trabajador</strong><span class="icon-pencil"></span></h2><hr>
                            </div>
                            <div class="modal-body">
                                <form action="Consulta2Trabajadores_controlador.php" method="POST">
                                    <!--<div class="form-group"> 
                                    	<label for="id-servicio">Id:</label>
                                    	<input type="number" name="id-servicio" id="id-servicio" class="form-control" disabled>
                                    </div>-->
									<input type="hidden" id="id-trabajador2" name="id-trabajador2">	
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Trabajador:</label>	
                                        <input type="text" id="nombre-trabajador2" name="nombre-trabajador2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Teléfono del Trabajador:</label>
                                        <input type="text" id="telefono-trabajador2" name="telefono-trabajador2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Dirección del Trabajador:</label>
                                        <input type="text" id="direccion-trabajador2" name="direccion-trabajador2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                     <div class="form-group">
                                        <label for="descripcion">Puesto del Trabajador:</label>
                                        <input type="text" id="puesto-trabajador2" name="puesto-trabajador2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
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
				         window.location = "Consulta2Trabajadores_controlador.php?accion="+accion+"&id="+idDelete;
				      }
				}
        	</script>  
			<script>
				function cargarDatosModal(id,nombre,descripcion,direccion,responsable){
					var idEmpresa2 = id;
					var nombreEmpresa2 = nombre;
					var descripcionEmpresa2 = descripcion;
					var direccionEmpresa2 = direccion;
					var responsableEmpresa2 = responsable
					//alert(id+nombre+descripcion);

					$("#id-trabajador2").val(idEmpresa2);
					$("#nombre-trabajador2").val(nombreEmpresa2);
					$("#telefono-trabajador2").val(descripcionEmpresa2);
					$("#direccion-trabajador2").val(direccionEmpresa2);
					$("#puesto-trabajador2").val(responsableEmpresa2);
				}

			</script>
 </body>