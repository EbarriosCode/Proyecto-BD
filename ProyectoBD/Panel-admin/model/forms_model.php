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

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM USUARIOS_SISTEMA";
			$resultado = $this->db->query($sql);
			$num = $resultado->fetchColumn();
			
			return $num;
		}

		public function insertar($id,$nombre,$password,$tipo,$tipo_num,$estado)
		{
			$sql = "INSERT INTO USUARIOS_SISTEMA(ID,NOMBRE,PASSWORD,TIPO_USUARIO,TIPO_USUARIO_NUM,ESTADO)
					VALUES('".$id."','".$nombre."','".$password."','".$tipo."','".$tipo_num."','".$estado."')";

			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return 1;
			}

			else{
				return 0;
			}
		}

		public function eliminar($id)
		{
			$sql = "DELETE FROM USUARIOS_SISTEMA WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

		public function editar($id,$nombre,$pass,$tipo,$tipo_num,$estado)
		{
			$sql = "UPDATE USUARIOS_SISTEMA SET NOMBRE='$nombre', PASSWORD='$pass', TIPO_USUARIO='$tipo', TIPO_USUARIO_NUM='$tipo_num', ESTADO='$estado' WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

	}

	/*$r = new Usuarios();
	echo $r->editar(2,'user','pdo','admin',1,0);*/

 ?>