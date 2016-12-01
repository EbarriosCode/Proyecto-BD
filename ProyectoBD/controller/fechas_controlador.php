<?php 
	require_once('../model/fechas_modelo.php');

	if (isset($_POST['enviar'])) {
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];

		// objeto fecha para la inserccion
		$date = new DateTime($fecha);
		$fecha_formateada = $date->format('d-m-Y');


		$inst = new fechas();
		$comprueba = $inst->insertarFecha($fecha_formateada,$hora);
		//echo $inst->insertarFecha('01/01/0101 15:50:01');  //fecha y hora
		 if($comprueba){
		 	echo "1";
		 }  
		
		 else
		 {
		 	echo "0";
		 }

	}
	
	require_once('../view/modules/fechas_vista.php');	 
 ?>