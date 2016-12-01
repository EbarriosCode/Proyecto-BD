<?php 
	require_once('../view/section/header.php');
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
                        <div class="pull-left"><a href="#modal-insertar" data-toggle="modal"><button class="btn btn-primary">Nuevo registro <span class="icon-plus"></span></button></a></div>
 		<div class="row">
 			<h2 class="text-center">Mantenimiento de Servicios <span class="icon-flag"></span></h2><hr>
		
		
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover">
				<tr class="info">
					<td><strong>ID</strong></td>
					<td><strong>SERVICIO</strong></td>
					<td><strong>DESCRIPCION SERVICIO</strong></td>
					<td colspan="2"><strong>OPCIONES</strong></td>
				</tr>
				<?php foreach ($inst as $servicio): ?>
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
                                        <input type="text" id="nombre-servicio" name="nombre-servicio" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripción Servicio:</label>
                                        <input type="text" id="descripcion-servicio" name="descripcion-servicio" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
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


<!-- MODAL PARA INSERTAR NUEVO -->

                <div class="modal fade" id="modal-insertar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Nuevo Servicio</strong><span class="icon-plus"></span></h2>
                            </div>
                            <div class="modal-body">
                                <form action="Servicios_controlador.php" method="POST">
                    
                        
                                    <div class="form-group"><label for="nombre">Nombre Servicio:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" onblur="this.className ='form-control campo';" placeholder="Nombre del Servicio" required onkeypress="return validateInput(event)" onpaste="return false">
                                    <span></span></div>

                                    <div class="form-group"><label for="descripcion">Descripción Servicio:</label>
                                    <input type="text" id="descripcion" name="descripcion" class="form-control"  onblur="this.className ='form-control campo';" placeholder="Descripción del Servicio" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    <span></span></div>
                            </div>

                            <div class="modal-footer">
                                    <input type="submit" id="insertar" name="insertar" class="btn btn-primary" value="Registrar!">
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
                                <form action="ResultadoBusquedaServicios_controlador.php" method="POST">
	
                                    <div class="form-group text-center">
                                        <label for="nombre">Servicio</label>	
                                        <input type="text" id="busqueda-servicio" name="busqueda-servicio"onkeypress="return validateInput(event)"  onpaste="return false" class="form-control" placeholder="Ingrese id, nombre o descripcion del servicio" autofocus required>
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
   	</div> 
        <!--FIN PAGINACION--> 
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


				function validateInput(e){
					key = e.keyCode || e.which;
					teclado = String.fromCharCode(key);
					caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ´áéíóúÁÉÍÓÚ0123456789-";
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
<div class="container">
        <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
</div>        
</body>