<?php 
	require_once("../view/section/header.php");
 ?>
 <body>

	<style>
		form{
			margin-top: 30px;
		}
		.btn-warning{
			display: none;
		}

	</style>
 	<div class="container">
 						<div class="pull-right"><a href="#modal-busqueda" data-toggle="modal"><button class="btn">Hacer una Busqueda <span class="icon-search"></span></button></a></div>
 		<div class="row">
 			<button class="btn btn-primary" data-target="#modal-nuevo" data-toggle="modal">Nuevo <span class="icon-plus"></span></button>
 			<a href="../view/modules/TrabajadoresCRUD_vista.php"><button class="btn btn-info">Regresar a consulta A</button></a>
 			<h2 class="text-center">Consulta Trabajadores <span class="icon-archive"></span></h2><hr>	
			
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover">
				<tr class="success">
					<td><strong>ID</strong></td>
					<td><strong>NOMBRE</strong></td>
					<td><strong>TELEFONO</strong></td>
					<td><strong>DIRECCION</strong></td>
					<td><strong>PUESTO</strong></td>
					<td colspan="2"><strong>OPCIONES</strong></td>
				</tr>
				<?php foreach ($inst as $trabajador2): ?>
				<tr>
					<td><?php echo $trabajador2['ID'];?></td>
					<td><?php echo $trabajador2['NOMBRE'];?></td>
					<td><?php echo $trabajador2['TELEFONO'];?></td>
					<td><?php echo $trabajador2['DIRECCION'];?></td>
					<td><?php echo $trabajador2['PUESTO'];?></td>
					<td><button class="btn btn-success" data-target="#modal-editar" data-toggle="modal" onclick="cargarDatosModal('<?php echo $trabajador2['ID'];?>','<?php echo $trabajador2['NOMBRE'];?>','<?php echo $trabajador2['TELEFONO'];?>','<?php echo $trabajador2['DIRECCION'];?>','<?php echo $trabajador2['PUESTO'];?>');">Editar<span class="icon-pencil"></span></button></td>
					<td><button onclick="confirmarDelete('borrar',<?php echo $trabajador2['ID'];?>);" class="btn btn-danger">Eliminar<span class="icon-trash"></span></button></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>

 		</div>
 	</div>
		<script>
        /*	$("#modal-editar").on("show.bs.modal", function(e){
        		var id = $(e.relatedTarget).data('data-id');
        		var servicio = $(e.relatedTarget).data('data-servicio');
        		var descripcion = $(e.relatedTarget).data('data-descripcion');

        		//alert(id);
        		$(e.currentTarget).find("input[name='id-servicio']").value(id);
        		$(e.currentTarget).find("input[name='nombre-servicio']").value(servicio);
        		$(e.currentTarget).find("input[name='descripcion-servicio']").val(descripcion);
        	});  */
        	</script>

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


    <!-- MODAL PARA BUSCAR -->

                <div class="modal fade" id="modal-busqueda">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Realizar una Búsqueda</strong><span class="icon-search"></span></h2>
                            </div>
                            <div class="modal-body">
                                <form action="ResultadoBusquedaTrabajadores_controlador.php" method="POST">
	
                                    <div class="form-group text-center">
                                        <label for="nombre">Trabajadores</label>	
                                        <input type="text" id="busqueda-trabajador2" name="busqueda-trabajador2"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Ingrese id, nombre o descripcion del registro" autofocus>
                                    </div>

                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-info" id="buscar" name="buscar" value="Buscar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>

 <!-- MODAL PARA INSERTAR NUEVO -->

                <div class="modal fade" id="modal-nuevo">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Nueva Trabajador </strong><span class="icon-archive"></span></h2>
                            </div>
                            <div class="modal-body">
                              	<form action="Consulta2Trabajadores_controlador.php" method="POST">
	
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>	
                                        <input type="text" id="nombre" name="nombre"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Nombre Trabajador" autofocus required>
                                    </div>


                                    <div class="form-group ">
                                        <label for="telefono">Teléfono:</label>	
                                        <input type="text" id="telefono" name="telefono"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Teléfono del Trabajador" required>
                                    </div>


                                    <div class="form-group ">
                                        <label for="direccion">Dirección:</label>	
                                        <input type="text" id="direccion" name="direccion"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Dirección del Trabajador" required>
                                    </div>


                                    <div class="form-group ">
                                        <label for="puesto">Puesto:</label>	
                                        <input type="text" id="puesto" name="puesto"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Puesto Trabajador"  required>
                                    </div>

                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" id="insertar" name="insertar" value="Guardar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>

	<!--PAGINACION --> 

    <div class="text-center">
        <nav aria-label="Page navigation">
              <ul class="pagination">
               <!-- <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li> -->
               <?php 
                

                    for($i=1;$i<=$total_paginas;$i++)
                    {
                    	if($i == $inicio ){
                    		 echo "<li class='active'><a>".$i." </a></li>";
                    	}	 
                    	else{
                    		 echo "<li><a href='?pagina=".$i."'>".$i." </a></li>";	
                    	}	 
                    
                    }   
                
               /* if($inicio < $total_paginas){
	                echo "<li>
	                  <a href='#' aria-label='Next'>
	                    <span aria-hidden='true'>&raquo;</span>
	                  </a>
	                </li>";
                }*/
                 ?>
              </ul>
        </nav> 
    </div>
     <div class="container">
   		<h5 class="text-left">
   			<strong>
   					<?php 
   						if($inicio == 0) $inicioPag = 1;
   						else $inicioPag = $inicio;
   						echo "Página ".$inicioPag." de ".$total_paginas;
   						echo " (Total de registros ".$total_registros.")"; 
   						
   					?>
   			</strong>
   		</h5>

      <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
   	</div> 
        <!--FIN PAGINACION--> 
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


				function validateInput(e){
					key = e.keyCode || e.which;
					teclado = String.fromCharCode(key);
					caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ´áéíóúÁÉÍÓÚ0123456789-,.";
					especiales = "8-37-38-46-164";
					teclado_especial = false;

						for(var i in especiales)
						{
							if(key==especiales[i])
							{
								teclado_especial = true;
								break;
							}
						}

						if(caracteres.indexOf(teclado) == -1 && !teclado_especial)
						{
							return false;
						}
				}
			</script>
        
</body>