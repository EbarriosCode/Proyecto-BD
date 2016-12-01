<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}

	require_once("../model/ResultadoBusquedaTrabajadores_modelo.php");
	$inst = new Resultado_Trabajador();

	if(isset($_POST['buscar']))
	{
		$la_busqueda = htmlentities(addslashes($_POST['busqueda-trabajador2']));
		$object = $inst->busqueda($la_busqueda);
		
		require_once("../view/modules/ResultadoBusquedaTrabajadores_vista.php");
	}


 ?>