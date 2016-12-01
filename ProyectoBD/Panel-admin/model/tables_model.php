<?php 

	class Usuarios{
		private $conn,$db,$usuarios;

		public function __construct()
		{
			require_once('../../../ProyectoBD/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->usuarios = array();
		}

		public function getUsuarios($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,PASSWORD,TIPO_USUARIO,TIPO_USUARIO_NUM,ESTADO,ROW_NUMBER() OVER(ORDER BY ID ASC) RN FROM USUARIOS_SISTEMA) WHERE RN>'$inicio' AND ROWNUM <='$no_registros'";
			}

			else
			{
				$sql = "SELECT * FROM USUARIOS_SISTEMA ORDER BY ID ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[] = $row;
			}

			return $this->usuarios;
		}
	}

	/*$r = new Usuarios();
	echo json_encode($r->getUsuarios());*/

 ?>