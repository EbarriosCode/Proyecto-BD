<?php 

	class Usuarios_sistema{

		private $db, $conn;
		private $existeUsuario;

		public function __construct()
		{
			require_once('Conexion.php');
		 	$this->db = new Conexion();
		 	$this->conn = $this->db->Conectar();

		 	$this->existeUsuario = false;
		}
 
		public function entrarSystem($usu,$pass)
		{
			$sql = "SELECT * FROM USUARIOS_SISTEMA WHERE NOMBRE='$usu' AND PASSWORD='$pass' ";  

			$resultado = $this->conn->prepare($sql);
			//$resultado->bindValue(":login",$this->usuario);
			//$resultado->bindValue(":pass",$this->password);
			
			$resultado->execute();
			
			$filas = $resultado->fetchAll();
			$numFilas = count($filas);

				if($numFilas)
				{
					$this->existeUsuario = true;
					return $this->existeUsuario;
				}
			
				else
				{
					$this->existeUsuario = false;
					return $this->existeUsuario;
				}	

		}

		public function autenticar($user)
		{
			$sql = "SELECT TIPO_USUARIO,ESTADO FROM USUARIOS_SISTEMA WHERE NOMBRE='$user'";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->resultado[] = $row;
			return $this->resultado;
		}

	}
 ?>