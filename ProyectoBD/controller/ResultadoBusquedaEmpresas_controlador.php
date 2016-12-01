<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}

	require_once("../model/ResultadoBusquedaEmpresas_modelo.php");
	$inst = new Resultado_Empresas();
	if(isset($_POST['buscar']))
	{
		$la_busqueda = htmlentities(addslashes($_POST['busqueda-empresa2']));
		$object = $inst->busqueda($la_busqueda);
		require_once("../view/modules/ResultadoBusquedaEmpresas_vista.php");
	}


 ?>