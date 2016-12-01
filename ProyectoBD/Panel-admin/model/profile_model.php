<?php 
	
	class User{
		private $conn,$db,$usuarios;

		public function __construct()
		{
			require_once('../../../ProyectoBD/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->usuarios = array();
		}

		public function getUsuarios($nombre)
		{
			$sql = "SELECT * FROM USUARIOS_SISTEMA WHERE NOMBRE='$nombre'";


			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[] = $row;
			}

			return $this->usuarios;
		}

		public function setPassword($id,$pass)
		{
			if(strcmp($pass,'') == 0){
				return false;
			}

			else{
				$sql = "UPDATE USUARIOS_SISTEMA SET PASSWORD='$pass' WHERE ID='$id'";
				$stmt = $this->db->prepare($sql);
				$result = $stmt->execute();

				if($result)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}

//$r = new User();
//echo$r->setPassword(16,'password');
 ?>