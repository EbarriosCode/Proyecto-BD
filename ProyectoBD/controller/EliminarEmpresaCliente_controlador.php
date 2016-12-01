<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}

		require_once('../model/EmpresaClienteCRUD_modelo.php');
		
		$inst = new AgregarEmpresaCliente();
		$idEmpresa = $_GET['idEmpresa'];
		$borrar = $inst->borrar($idEmpresa);

			if ($borrar) {
				
				echo "Registro Eliminado Correctamente";
			}

			else{
				echo "No se elimino ningún Registro";
			}
 ?>