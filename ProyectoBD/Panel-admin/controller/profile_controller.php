<?php 
        session_start();
        
        if (!isset($_SESSION['Usuario'])) {
            header(("Location:../index.php"));
        }
        require_once("../../Panel-admin/model/profile_model.php");
        $inst = new User();
        $user = $inst->getUsuarios($_SESSION['Usuario']);

        if(isset($_POST['guardar'])){
        	$id = $_POST['id'];
        	$pass = $_POST['password'];

        	$verificaInsertado = $inst->setPassword($id,$pass); 
        	if($verificaInsertado)
        	{
        		echo "<script>alert('Contraseña actualizada Correctamente..');";
        		echo "window.location.href='profile_controller.php'</script>";
        	}

        	else{
        		echo "<script>alert('No edito nada porque no asigno una nueva contraseña');";
        		echo "window.location.href='profile_controller.php'</script>";	
        	}
        }
		require_once("../../Panel-admin/pages/profile.php");

 ?>