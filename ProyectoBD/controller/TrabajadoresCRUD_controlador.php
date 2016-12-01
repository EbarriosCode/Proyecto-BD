<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
		require_once('../model/TrabajadoresCRUD_modelo.php');
		$inst = new TrabajadoresCRUD();

		$boton = $_POST['boton'];
		
		if($boton === 'buscar')
		{
			
       	 	$limite = 5;
		  		
		  		if(isset($_POST['pagina'])){
			  		$inicio=$_POST['pagina'];
			    	$nuevo_inicio = ($inicio-1) * $limite;
		    	} 

			$valor = $_POST['valor'];
			
			$trabajadores = new TrabajadoresCRUD();
			$matrizTrabajadores = $trabajadores->busquedaTrabajadores($valor);
			$contarRegistros = count($matrizTrabajadores);

			$matrizTrabajadoresPag = $trabajadores->busquedaTrabajadores($valor,$nuevo_inicio,$limite);
			//echo json_encode($matrizTrabajadores);
			echo json_encode($matrizTrabajadoresPag)."*".$contarRegistros;	
		}

		
		if (isset($_POST['insertar'])) 
		{
			$nombre = htmlentities(addslashes($_POST['nombre']));
			$telefono = htmlentities(addslashes($_POST['telefono']));
			$direccion = htmlentities(addslashes($_POST['direccion']));
			$puesto = htmlentities(addslashes($_POST['puesto']));

			$boll = $inst->insertar($nombre, $telefono, $direccion, $puesto);

				if ($boll) {
					header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}

				else{
					header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}
		}
		
		
		if (isset($_POST['actualizar'])) {
			
			$id = $_POST['idTrabajador'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$puesto = $_POST['puesto'];

			$res = $inst->editar($id, $nombre, $telefono, $direccion, $puesto);
			
				if($res){
					//echo "<script language='javascript'>alert('Registro Actualizado Correctamente')</script>";
					header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}

				else{
					header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}
		}

		
		if(isset($_GET['idTrabajador'])){	
				$idTrabajador = $_GET['idTrabajador'];
			
				$borrar = $inst->borrar($idTrabajador);

				if ($borrar) {
					header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}
					


				else{
					echo "No se elimino ningún Registro";
					//header("Location:../view/modules/TrabajadoresCRUD_vista.php");
				}
					
			}
					

		//require_once('../view/modules/EmpresasClientebuscar_vista.php');
		
 ?>