
<?php 
	require_once('../view/section/header.php');
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			//peticion.open("GET","ControlService_vista.php?parametro="+str,true);
			peticion.send();
		}


	</script>
	
	
	<?php 
		if(isset($_GET['parametro'])){
			$parametro = $_GET['parametro'];

			$responsableCliente = $inst->recuperaResponsable($parametro);
		}
	 ?>
</head>
<body>
		<div class="container ">
		<?php //session_start(); ?>
		<h5><strong>Conectado como: <?php echo $_SESSION['Usuario']; ?></strong></h5>
		<h2 class="text-center margen">Control de Servicios</h2><hr>

			<div class="row"> 
			<form action="" class="form" method="POST">
				<div class="form-group col-md-6">
					<label for="empresa-cliente">Empresa Cliente:</label>
					<select name="empresa-cliente" id="empresa-cliente" class="form-control" onchange="ajaxResponsableCliente(this.value)" required>
						<option value="">Selecciona:</option>
						<?php
							/*	// recuperando los datos de la bd
							while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value='$fila[NOMBRE]'>".$fila['NOMBRE']."</option>";
							}*/
							foreach ($cliente as $registro) {
								echo "<option value='$registro[NOMBRE]'>".$registro['NOMBRE']."</option>";
							}
						 ?>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="responsable-cliente">Responsable - Empresa Cliente:</label>
					<div id="txtHint">
						<input type="text" class="form-control" name="responsable-cliente" id="responsable-cliente" placeholder="Este campo se completará automáticamente" required onkeypress="return validateInput(event)"  onpaste="return false">
					</div>
					<!--<select name="responsable-cliente" id="responsable-cliente" class="form-control" disabled required>
						<option value="">Selecciona:</option>
						<?php
							//foreach ($responsableCliente as $registro) {
							//	echo "<option value='$registro[RESPONSABLE]'>".$registro['RESPONSABLE']."</option>";
							//}
						 ?>
					</select> -->
				</div>

				<div class="form-group col-md-12">
					<label for="proyecto">Proyecto:</label>
					<select name="proyecto" id="proyecto" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							
							foreach($proyecto as $var) {
								echo "<option value='$var[NOMBRE]'>".$var['NOMBRE']."</option>";
							}
						 ?>
					</select>
				</div>
				

				<div class="form-group col-md-6">
					<label for="servicio">Servicio:</label>
					<select name="servicio" id="servicio" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							foreach($servicio as $row) {
								echo "<option value='$row[NOMBRE]'>".$row['NOMBRE']."</option>";
							}
						 ?>
					</select>
				</div>

	
				<div class="form-group col-md-6">
					<label for="encargado">Trabajador Encargado a prestar Servicio:</label>
					<select id="encargado" name="encargado" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							foreach ($trabajador as $valor) {
								echo "<option value='$valor[NOMBRE]'>".$valor['NOMBRE']."</option>";
							}
						 ?>
					</select>
				</div>	

				<div class="form-group col-md-3">
						<label for="fecha1">Fecha de inicio:</label>
						<input type="date" id="fecha1" name="fecha1" class="form-control" placeholder="ejemplo: 01/08/2016" required>					
				</div>

				<div class="form-group col-md-3">
					<label for="hora1">Hora de inicio:</label>
					<input type="time" id="hora1" name="hora1" class="form-control" required>
				</div>	
				

				<div class="form-group col-md-3">
						<label for="fecha2">Fecha de finalización servicio:</label>
						<input type="date" id="fecha2" name="fecha2" class="form-control" placeholder="ejemplo: 01/08/2016" required>					
				</div>

				<div class="form-group col-md-3">
					<label for="hora2">Hora de finalización servicio:</label>
					<input type="time" id="hora2" name="hora2" class="form-control" required>
				</div>	
				

				<div class="form-group col-md-6">
					<label for="duracion">Duración del servicio en horas:</label>
					<select name="duracion" id="duracion" class="form-control" required>
						<option value="">Selecciona:</option>
						<?php 
							$num = 1;
							while ($num <= 100) {
								echo "<option>".$num."</option>";
								$num++;
							}
						 ?>
					</select>
				</div>	

				<div class="form-group col-md-6">
					<label for="descripcion">Descripción:</label>
					<textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required></textarea>
				</div>

				<div class="form-group col-md-12"><center> 
					<input type="submit" class="btn btn-info" id="guarda" name="guarda" value="Guardar Servicio">
					<a href="../controller/listaControlService_controlador.php"><button type="button" class="btn btn-success">Ir a Consulta</button></a>
				</center>
				</div>
			</form>
			</div>
		</div>

		<script>
            function validateInput(e){
                    key = e.keyCode || e.which;
                    teclado = String.fromCharCode(key);
                    caracteres = "";
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
</html>
