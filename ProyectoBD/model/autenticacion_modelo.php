<?php 
	
	class Autenticar{

		private $conn,$db,$resultado;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->resultado = array();
		}

		public function autenticar($user,$pass)
		{
			$sql = "SELECT TIPO_USUARIO,ESTADO FROM USUARIOS_SISTEMA WHERE NOMBRE='$user' AND PASSWORD='$pass'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->resultado[] = $row;
			return $this->resultado;

		}
	}

	/*$r = new Autenticar();
	echo json_encode($r->autenticar('admin','root'));*/


 ?>