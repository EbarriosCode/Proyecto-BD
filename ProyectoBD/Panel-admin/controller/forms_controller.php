<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../../index.php"));
		}

	require_once("../../Panel-admin/model/forms_model.php");
	$user = new Usuarios();
	
	if(isset($_POST['insertar']))
	{
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$pass = $_POST['password'];
		$tipo = $_POST['tipoUser'];
		$estado = $_POST['estado'];

		if($tipo == "1") $tipoUser = "admin";
		else  $tipoUser = "user";

		if($estado == "1")  $cadenaEstado = "Activo";
		else $cadenaEstado = "Inactivo";

		$inserta = $user->insertar($id,$nombre,$pass,$tipoUser,$tipo,$estado);
		if($inserta)
		{
			echo "<script>alert('Registro Guardado Correctamente...');";
			echo "window.location.href=forms_controller.php</script>";
		}
		else{
			echo "<script>alert('No se inserto ningún registro / complete el formulario porfavor');</script>";
		}
	}

	if(isset($_POST['actualizar']))
	{
		$idEdit = $_POST['idUser'];
		$nombreEdit = $_POST['nombre'];
		$passEdit = $_POST['password'];
		$tipoEdit = $_POST['tipoUserEdit'];
		$estadoEdit = $_POST['estadoEdit'];

		if($tipoEdit == "1") $tipoUser = "admin";
		else  $tipoUser = "user";

		if($estadoEdit == "1")  $cadenaEstado = "Activo";
		else $cadenaEstado = "Inactivo";

		$edita = $user->editar($idEdit,$nombreEdit,$passEdit,$tipoUser,$tipoEdit,$estadoEdit);

		if($edita)
		{
			echo "<script>alert('Registro Editado Correctamente...');";
			echo "window.location.href=forms_controller.php</script>";
		}
	}

	if(isset($_GET['accion']))
	{
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idUser = $_GET['id'];

			$bool = $user->eliminar($idUser);
			if ($bool) {
			echo "<script>alert('Registro Eliminado Correctamente...');";
			echo "window.location.href=forms_controller.php</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');</alert>";
			}
		}
	}

	// lista registros y paginacion 

	$cant_filas = new Usuarios();
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:forms_controller.php");
		}
		else{
			$inicio = $_GET['pagina'];
			//$nuevo_inicio = ($inicio-1)*$no_registros;
		}
	}
	else{
		$inicio = 0;
	}
		
	
	$nuevo_inicio = ($inicio-1)*$no_registros;

	$User = $user->getUsuarios($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_filas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);

	require_once("../../Panel-admin/pages/forms.php");
 ?>