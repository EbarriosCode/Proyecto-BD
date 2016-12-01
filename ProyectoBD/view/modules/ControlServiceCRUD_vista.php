<?php 
	require_once('../view/section/header.php');
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="../view/css/bootstrap.min.css">-->
	<title>Control de Servicios</title>
	
	<script type="text/javascript">
		function ajaxResponsableCliente(str){
			var peticion;

			if(str=="")
			{
				document.getElementById("txtHint").innerHTML = "";
				return;
			}	

			else
			{
				if(window.XMLHttpRequest){
				peticion = new XMLHttpRequest();
				
				}else{
					peticion = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}

			peticion.onreadystatechange = function(){
				if ( peticion.readyState == 4 && peticion.status == 200 )
				{
					document.getElementById("txtHint").innerHTML = peticion.responseText;
				}
			};
			
			peticion.open("GET","../view/modules/resources/recuperaControlService.php?parametro="+str,true);
			peticion.send();
		}


	</script>

</head>
<body>
		<div class="container ">
		<fieldset>
		<h2 class="text-center margen">Control de Servicios (EDITAR)<span class="icon-pencil"></span></h2><hr>
		</fieldset>
			<div class="row"> 
			<form action="" class="form" method="POST">
				<div class="form-group col-md-6">
					<input type="hidden" id="id-edit" name="id-edit" value="<?php echo $id ?>">
					<label for="empresa-cliente-edit">Empresa Cliente:</label>
					<select name="empresa-cliente-edit" id="empresa-cliente-edit" class="form-control" onchange="ajaxResponsableCliente(this.value)" required>
						<option value="">Selecciona:</option>
						<!--<option value='<?php //echo $_GET['empresa_cliente']; ?>' selected><?php //echo $_GET['empresa_cliente'];?></option>-->
						<?php

							/*	// recuperando los datos de la bd*/
							//echo "<option value='$empresaCliente' selected>$empresaCliente</option>";
							foreach ($getRegistrosControlService as $registro) {
								echo "<option value='$registro[EMPRESA_CLIENTE]'";
										if ($registro['EMPRESA_CLIENTE'] == $empresaCliente){
											echo "selected";
										}										
								echo ">$registro[EMPRESA_CLIENTE]</option>";
							}
						 ?>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="responsable-cliente-edit">Responsable - Empresa Cliente:</label>
					<!--<div id="txtHint">
						<input type="text" class="form-control" name="responsable-cliente" id="responsable-cliente" placeholder="Este campo se completará automáticamente" disabled>
					</div>-->
					<select name="responsable-cliente-edit" id="responsable-cliente-edit" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php
							//echo "<option value='$responsable' selected>$responsable</option>";
							foreach ($getRegistrosControlService as $registro) {
								echo "<option value='$registro[RESPONSABLE_EMPRESA_CLIENTE]'";
								 		if ($registro['RESPONSABLE_EMPRESA_CLIENTE'] == $responsable){
											echo "selected";
										}										
								echo ">$registro[RESPONSABLE_EMPRESA_CLIENTE]</option>";

							}
						 ?>
					</select> 
				</div>

				<div class="form-group col-md-12">
					<label for="proyecto-edit">Proyecto:</label>
					<select name="proyecto-edit" id="proyecto-edit" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							//echo "<option value='$proyecto' selected>$proyecto</option>";
							foreach($getRegistrosControlService as $registro) {
								echo "<option value='$registro[PROYECTO]'";

									if($registro['PROYECTO'] == $proyecto){
										echo " selected ";	
									}
								echo ">$registro[PROYECTO]</option>";

							}

						 ?>
					</select>
				</div>
				

				<div class="form-group col-md-6">
					<label for="servicio-edit">Servicio:</label>
					<select name="servicio-edit" id="servicio-edit" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							//echo "<option value='$servicio' selected>$servicio</option>";
							foreach($getRegistrosControlService as $row) {
								echo "<option value='$row[SERVICIO]'";
									if ($row['SERVICIO'] == $servicio){
											echo "selected";
										}										
								echo ">$row[SERVICIO]</option>";
							}
						 ?>
					</select>
				</div>

	
				<div class="form-group col-md-6">
					<label for="encargado-edit">Trabajador Encargado a prestar Servicio:</label>
					<select id="encargado-edit" name="encargado-edit" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							foreach ($getRegistrosControlService as $valor) {
								echo "<option value='$valor[ENCARGADO_PRESTAR_SERVICIO]'";
										if ($valor['ENCARGADO_PRESTAR_SERVICIO'] == $encargadoServicio){
											echo "selected";
										}										
								echo ">$valor[ENCARGADO_PRESTAR_SERVICIO]</option>";
							}
						 ?>
					</select>
				</div>	

				<div class="form-group col-md-3">
						<label for="fecha1-edit">Fecha de inicio:</label>
						<input type="datepicker" id="fecha1-edit" name="fecha1-edit" value="<?php echo $_GET['fechaInicio'] ?>" class="form-control" placeholder="ejemplo: 01/08/2016" required>					
				</div>

				<div class="form-group col-md-3">
					<label for="hora1-edit">Hora de inicio:</label>
					<input type="time" id="hora1-edit" name="hora1-edit" value="<?php echo $_GET['horaInicio'] ?>" class="form-control" required>
				</div>	
				

				<div class="form-group col-md-3">
						<label for="fecha2-edit">Fecha de finalización servicio:</label>
						<input type="datepicker" id="fecha2-edit" name="fecha2-edit" value="<?php echo $_GET['fechaFin'] ?>" class="form-control" placeholder="ejemplo: 01/08/2016" required>					
				</div>

				<div class="form-group col-md-3">
					<label for="hora2-edit">Hora de finalización servicio:</label>
					<input type="time" id="hora2-edit" name="hora2-edit" value="<?php echo $_GET['horaFin'] ?>" class="form-control" required>
				</div>	
				

				<div class="form-group col-md-6">
					<label for="duracion-edit">Duración del servicio en horas:</label>
					<select name="duracion-edit" id="duracion-edit" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							//echo "<option value='$duracionServicio' selected>$duracionServicio</option>";
							$num = 1;
							while ($num <= 100) {
								echo "<option value='$num'";
										if($num == $duracionServicio)
										{
											echo "selected";
										}
								echo ">".$num."</option>";
								$num++;
							}
						 ?>
					</select>
				</div>	

				<div class="form-group col-md-6">
					<label for="descripcion-edit">Descripción:</label>
					<textarea name="descripcion-edit" id="descripcion-edit" cols="30" rows="5" class="form-control" required><?php echo $_GET['descripcion']; ?></textarea>
				</div>

				<div class="form-group col-md-12"><center> 
					<input type="submit" class="btn btn-info" id="guarda" name="guarda" value="Editar y Guardar Servicio">
					<a href="../controller/listaControlService_controlador.php"><button type="button" class="btn btn-success">Ir a Consulta</button></a>
				</center>
				</div>
			</form>
			</div>
		<hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>	
		</div>
		
</body>
</html>