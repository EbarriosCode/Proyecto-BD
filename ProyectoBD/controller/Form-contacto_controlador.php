<?php 
	require_once("../model/Form-contacto_modelo.php");
	$inst = new Correo();

	if(isset($_POST['sendCorreo'])){
		$para = $inst->getDestino();
		$de = $_POST['nombre'];
		$asunto = $_POST['asunto'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$mensaje = $_POST['mensaje'];

		$send = $inst->enviarCorreo($para,$asunto,$mensaje,$de);

			if($send){
				echo "<script>alert('Mensaje Enviado con Éxito');";
				echo "window.location.href='Form-contacto_controlador.php';</script>";
			}
			else{
				echo "<script>alert('No se envío el mensaje');";
				echo "window.location.href='Form-contacto_controlador.php';</script>";
			}

	}


	
	require_once("../view/modules/Form-contacto_vista.php");

 ?>			}
