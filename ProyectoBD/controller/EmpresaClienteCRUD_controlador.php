	<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
	
	require_once('../model/EmpresaClienteCRUD_modelo.php');
	$inst = new EmpresaClienteCRUD();

	if (isset($_POST['insertar'])) 
	{
		$nombre = htmlentities(addslashes($_POST['nombre']));
		$descripcion = htmlentities(addslashes($_POST['descripcion']));
		$direccion = htmlentities(addslashes($_POST['direccion']));
		$responsable = htmlentities(addslashes($_POST['responsable']));

		$boll = $inst->insertar($nombre,$descripcion,$direccion,$responsable);

			if ($boll) {
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}

			else{
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
	}
	
	
	if (isset($_POST['actualizar'])) {
		
		$id = $_POST['idEmpresa'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$direccion = $_POST['direccion'];
		$responsable = $_POST['responsable'];

		$res = $inst->editar($id, $nombre, $descripcion, $direccion, $responsable);
		
			if($res){
				//echo "<script language='javascript'>alert('Registro Actualizado Correctamente')</script>";
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}

			else{
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
	}

/*
	$boton = $_POST['boton'];
	if($boton == 'eliminar')
	{
		$obj = new AgregarEmpresaCliente();
		$id = $_POST['idEmpresa'];
		if ($obj->borrar($id)) {
			echo "Registro Eliminado Correctamente";
		}

		else
		{
			echo "No se elimino ningún Registro";
		}
	}
}*/	
	else{	
			$idEmpresa = $_GET['idEmpresa'];
		
			$borrar = $inst->borrar($idEmpresa);

			if ($borrar) {
				//echo "Registro Eliminado Correctamente";
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
				


			else{
				echo "No se elimino ningún Registro";
				//header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
				
		}
				

 ?>