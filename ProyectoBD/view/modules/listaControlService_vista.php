<?php 
	require_once('../view/section/header.php');
 ?>
<body>
	<div class="container">
		<div class="row">
		<div class="pull-right"><a href="#modal-busqueda" data-toggle="modal"><button class="btn">Hacer una Busqueda <span class="icon-search"></span></button></a></div>
					<a href="ControlService_controlador.php" class="text-left"><button class="btn btn-primary">Nuevo<span class="icon-plus"></span></button></a>
					<h2 class="text-center">Consulta Control de Servicios <span class="icon-database"></span></h2><hr>
					<br>
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
					<?php foreach($obj as $registro): ?>
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
                                <form action="ResultadoBusquedaControl-Servicios_controlador.php" method="POST">
	
                                    <div class="form-group text-center">
                                        <label for="nombre">Control de Servicios</label>	
                                        <input type="text" id="busqueda-control-servicio" name="busqueda-control-servicio" class="form-control" placeholder="Ingrese cualquier dato del Registro" autofocus required onkeypress="return validateInput(event)"  onpaste="return false">
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
                <!--<li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>-->
                </li>
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
				         window.location = "ControlServiceCRUD_controlador.php?accion="+accion+"&id="+idDelete;
				      }
				}
        	</script>
        	<script>
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
