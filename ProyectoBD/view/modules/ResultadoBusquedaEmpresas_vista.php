
<?php 
	require_once('../view/section/header.php');
 ?>

 <body>
 	<div class="container">
 			<div class="pull-right"><a href="Consulta2Empresas_cliente_controlador.php"><button class="btn btn-warning">Regresar <span class="icon-hand-pointer-o"></span></button></a></div>
 			<h2 class="text-center">Resultado Búsqueda Empresas <span class="icon-search"></span></h2> <hr>
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
						<td><strong>EMPRESA</strong></td>
						<td><strong>DESCRIPCION</strong></td>
						<td><strong>DIRECCION</strong></td>
						<td><strong>RESPONSABLE</strong></td>
						<td colspan="2"><strong>OPCIONES</strong></td>
					</tr>
					<?php foreach ($object as $respuesta): ?>
					<tr>
						<td><?php echo $respuesta['ID'];?></td>
						<td><?php echo $respuesta['NOMBRE'];?></td>
						<td><?php echo $respuesta['DESCRIPCION'];?></td>
						<td><?php echo $respuesta['DIRECCION'];?></td>
						<td><?php echo $respuesta['RESPONSABLE'];?></td>

						<td><button class="btn btn-success" data-target="#modal-editar" data-toggle="modal" onclick="cargarDatosModal('<?php echo $respuesta['ID'];?>','<?php echo $respuesta['NOMBRE'];?>','<?php echo $respuesta['DESCRIPCION'];?>','<?php echo $respuesta['DIRECCION'];?>','<?php echo $respuesta['RESPONSABLE'];?>');">Editar<span class="icon-pencil"></span></button></td>
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
                                 <h2 class="text-center "><strong>EditarServicios</strong><span class="icon-pencil"></span></h2>
                            </div>
                            <div class="modal-body">
                               <form action="Consulta2Empresas_cliente_controlador.php" method="POST">
                                    <!--<div class="form-group"> 
                                    	<label for="id-servicio">Id:</label>
                                    	<input type="number" name="id-servicio" id="id-servicio" class="form-control" disabled>
                                    </div>-->
									<input type="hidden" id="id-empresa2" name="id-empresa2">	
                                    <div class="form-group">
                                        <label for="nombre">Nombre Empresa Cliente:</label>	
                                        <input type="text" id="nombre-empresa2" name="nombre-empresa2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripción Emrpesa Cliente:</label>
                                        <input type="text" id="descripcion-empresa2" name="descripcion-empresa2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Dirección Emrpesa Cliente:</label>
                                        <input type="text" id="direccion-empresa2" name="direccion-empresa2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                     <div class="form-group">
                                        <label for="descripcion">Responsable Emrpesa Cliente:</label>
                                        <input type="text" id="responsable-empresa2" name="responsable-empresa2" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
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
				         window.location = "Consulta2Empresas_cliente_controlador.php?accion="+accion+"&id="+idDelete;
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

					$("#id-empresa2").val(idEmpresa2);
					$("#nombre-empresa2").val(nombreEmpresa2);
					$("#descripcion-empresa2").val(descripcionEmpresa2);
					$("#direccion-empresa2").val(direccionEmpresa2);
					$("#responsable-empresa2").val(responsableEmpresa2);
				}

				$('#actualizar').click(function()
				{
					alert('Registro Actualizado Correctamente');
				});

			</script>
 </body>